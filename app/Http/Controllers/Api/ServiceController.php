<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //  LIST
    public function index()
    {
        return Service::with('department')->latest()->get();
    }

    //  CREATE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string|unique:services,code',
            'capacity' => 'required|integer|min:1',
            'consultation_time' => 'required|integer|min:1',
            'department_id' => 'required|exists:departments,id',
        ]);

        $service = Service::create($request->all());

        return response()->json([
            'message' => 'Service créé',
            'service' => $service
        ]);
    }

    //  SHOW
    public function show($id)
    {
        return Service::with('department')->findOrFail($id);
    }

    //  UPDATE
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'code' => "required|string|unique:services,code,$id",
            'capacity' => 'required|integer|min:1',
            'consultation_time' => 'required|integer|min:1',
            'department_id' => 'required|exists:departments,id',
        ]);

        $service->update($request->all());

        return response()->json([
            'message' => 'Service mis à jour',
            'service' => $service
        ]);
    }

    //  DELETE
    public function destroy($id)
    {
        Service::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Service supprimé'
        ]);
    }
}
