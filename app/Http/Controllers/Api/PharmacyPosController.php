<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PharmacyProduct;
use App\Models\PharmacySale;
use App\Models\PharmacySaleItem;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacyPosController extends Controller
{
    public function checkout(Request $request)
    {
        DB::beginTransaction();

        try {

            $request->validate([
                'items' => 'required|array|min:1',
            ]);

            $total = 0;

            $sale = PharmacySale::create([
                'prescription_id' => $request->prescription_id,
                'payment_method' => $request->payment_method ?? 'cash',
                'total_amount' => 0,
            ]);

            foreach ($request->items as $item) {

                $product = PharmacyProduct::findOrFail(
                    $item['product_id']
                );

                if ($product->stock < $item['quantity']) {

                    throw new \Exception(
                        'Stock insuffisant pour '.$product->name
                    );
                }

                $subtotal =
                    $product->price * $item['quantity'];

                $total += $subtotal;

                PharmacySaleItem::create([
                    'pharmacy_sale_id' => $sale->id,
                    'pharmacy_product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'subtotal' => $subtotal,
                ]);

                // déstockage
                $product->decrement(
                    'stock',
                    $item['quantity']
                );
            }

            $sale->update([
                'total_amount' => $total,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Vente validée',
                'sale' => $sale->load('items.product'),
            ]);

        } catch (\Throwable $e) {

            DB::rollBack();

            return response()->json([
                'message' => 'Erreur vente',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function sales()
    {
        return PharmacySale::with([
            'items.product',
            'prescription',
        ])
        ->latest()
        ->get();
    }
}
