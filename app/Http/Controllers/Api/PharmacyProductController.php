<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PharmacyProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PharmacyProductController extends Controller
{
    public function index()
    {
        return PharmacyProduct::latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image',
        ]);

        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('pharmacy/products', 'public');
        }

        $product = PharmacyProduct::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'barcode' => $request->barcode,
            'image' => $image,
        ]);

        return response()->json($product);
    }

    public function show($id)
    {
        return PharmacyProduct::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $product = PharmacyProduct::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $request->file('image')
                ->store('pharmacy/products', 'public');
        }

        $product->update($request->except('image'));

        $product->save();

        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = PharmacyProduct::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'message' => 'Produit supprimé'
        ]);
    }
}
