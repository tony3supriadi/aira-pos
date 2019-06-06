<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    
    public function index()
    {
        return Supplier::all();
    }
    
    public function show($id)
    {
        return Supplier::find($id);
    }

    public function store(Request $request)
    {
        $data = Supplier::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Supplier::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Supplier::find($id);
        $data->delete();

        return response()->json(null, 204);
    }
}
