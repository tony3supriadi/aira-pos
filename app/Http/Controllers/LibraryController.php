<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Sku;

class LibraryController extends Controller
{
    
    public function index()
    {
        return Library::all();
    }

    public function show($id)
    {
        return Library::find($id);
    }

    public function store(Request $request)
    {
        $imgName = '';
        $itemSkus = [];
        $data = array([
            'categoryId' => "",
            'name' => "",
            'image' => "",
            'description' => "",
            'itemSku' => []
        ]);

        $categoryId = $request->post('categoryId');
        $name = $request->post('name');
        $description = $request->post('description');
        $unitId = $request->post('unitId');
        $sku = $request->post('sku');
        $nameVariant = $request->post('nameVariant');
        $price = $request->post('price');
        $discount = $request->post('discount');

        $image = $request->file('image');
        if (!empty($image)) {
            $destinationPath = public_path('/img/library/');
            $imgName = str_replace(' ', '-', strtolower($request->post('name'))) 
                                    . '-' . time().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);
        }
        
        $data = Library::create([
            'categoryId' => $categoryId,
            'name' => $name,
            'image' => $imgName,
            'description' => $description
        ]);

        for ($i = 0; $i < count($sku); $i++) {
            $itemSku = Sku::create([
                'itemId' => $data->id,
                'unitId' => $unitId[$i],
                'sku' => $sku[$i],
                'name' => $nameVariant[$i],
                'price' => $price[$i],
                'discount' => $discount[$i],
            ]);
            $itemSkus[] = $itemSku;
        }
        $data['itemSku'] = $itemSkus;

        return response()->json($data, 200);
    }
    
    public function update(Request $request, $id)
    {
        $data = Library::find($id);

        $categoryId = $request->post('categoryId');
        $name = $request->post('name');
        $description = $request->post('description');

        $image = $request->file('image');
        if (!empty($image)) {
            $destinationPath = public_path('/img/library/');
            $imgName = str_replace(' ', '-', strtolower($request->post('name'))) 
                                    . '-' . time().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);

            $data->categoryId = $categoryId;
            $data->name = $name;
            $data->image = $imgName;
            $data->description = $description;
        } else {
            $data->categoryId = $categoryId;
            $data->name = $name;
            $data->description = $description;
        }
        
        $data->save();

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Library::find($id);
        $data->delete();

        return response()->json(null, 204);
    }
}
