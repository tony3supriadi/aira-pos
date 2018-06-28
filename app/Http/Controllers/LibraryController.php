<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Library;
use App\Models\Sku;

class LibraryController extends Controller
{
    
    public function index()
    {
        return DB::table('libraryItems')
            ->select('libraryItems.*', 'categories.name as categoryName')
            ->join('categories', 'libraryItems.categoryId', '=', 'categories.id')
            ->get();
    }

    public function show($id)
    {
        $data = DB::table('libraryItems')
            ->select('libraryItems.*', 'categories.name as categoryName')
            ->join('categories', 'libraryItems.categoryId', '=', 'categories.id')
            ->where('libraryItems.id', '=', $id)
            ->first();
        $data->items = DB::table('libraryskus')
            ->select('librarySkus.*', 'libraryStocks.stockLast', 'libraryStocks.stockPurchase', 'libraryStocks.stockSales', 'libraryStocks.inStock')
            ->join('libraryStocks', 'librarySkus.id', '=', 'libraryStocks.id')
            ->where('itemId', $id)->get();

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $imgName = '';
        $sku = [];

        $image = $request->file('image');
        if (!empty($image)) {
            $destinationPath = public_path('/img/library/');
            $imgName = str_replace(' ', '-', strtolower($request->post('name'))) 
                                    . '-' . time().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);
        }
        
        $data = Library::create([
            'categoryId' => $request->post('categoryId'),
            'name' => $request->post('name'),
            'image' => $imgName,
            'description' => $request->post('description')
        ]);

        $variants = $request->post('variants');
        for ($i = 0; $i < count($variants); $i++) {
            $variants[$i]['itemId'] = $data->id;
            $sku[$i] = Sku::create($variants[$i]);
        }
        $data['variants'] = $sku;

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
