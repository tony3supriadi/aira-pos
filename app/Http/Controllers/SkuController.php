<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sku;

class SkuController extends Controller
{
    public function index()
    {
        return Sku::all();
    }

    public function show($id)
    {
        return Sku::find($id);
    }

    public function search($src)
    {
        return DB::table('libraryskus')
            ->where('sku', 'like', '%'.$src.'%')
            ->orwhere('name', 'like', '%'.$src.'%')
            ->orwhere('price', 'like', '%'.$src.'%')
            ->get();
    }

    public function update(Request $request, $id)
    {
        $data = Sku::find($id);
        $data->update($request->all());

        return response()->json($data, 201);
    }

    public function destroy($id)
    {
        $data = Sku::find($id);
        $data->delete();

        return response()->json(null, 204);
    }
}
