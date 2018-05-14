<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitsController extends Controller
{
    
    public function index()
    {
        return Unit::all();
    }

    public function show($id)
    {
        return Unit::find($id);
    }
    
    public function store(Request $request)
    {
        $data = Unit::create($request->all());
        return response()->json($data, 201);
    }
    
    public function update(Request $request, $id)
    {
        $data = Unit::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }
    
    public function destroy($id)
    {
        $data = Unit::find($id);
        $data->delete();
        return response()->json(null, 204);
    }
    
}
