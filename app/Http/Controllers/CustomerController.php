<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function show($id)
    {
        return Customer::find($id);
    }
    
    public function store(Request $request)
    {
        $data = Customer::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Customer::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Customer::find($id);
        $data->delete();
        return response()->json(null, 204);
    }
}
