<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\SaleItem;

class SaleController extends Controller
{
    
    public function index()
    {
        $data = DB::table('sales')
            ->join('customers', 'sales.customerId', '=', 'customers.id')
            ->select('sales.*', 'customers.name as customerName')
            ->get();
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = DB::table('sales')
            ->join('customers', 'sales.customerId', '=', 'customers.id')        
            ->select('sales.*', 'customers.name as customerName')
            ->where('sales.id', $id)
            ->first();
        $data->items = DB::table('saleItems')
            ->select('saleItems.*', 'librarySkus.name as ItemName', 'units.symbol')
            ->join('librarySkus', 'saleItems.itemId', '=', 'librarySkus.id')
            ->join('units', 'saleItems.unitId', '=', 'units.id')
            ->where('saleItems.saleId', $id)
            ->get();
        return response()->json($data, 200);
    }

    public function between($start, $end)
    {
        return DB::table('sales')
            ->join('customers', 'sales.customerId', '=', 'customers.id')        
            ->select('sales.*', 'customers.name as customerName')
            ->whereBetween('sales.created_at', [$start, $end])
            ->get();
    }

    public function store(Request $request)
    {
        $items = [];

        $customerId = $request->post('customerId');
        $note = $request->post('note');
        $sales = $request->post('sales');
        $status = $request->post('status');
        $itemId = $request->post('itemId');
        $unitId = $request->post('unitId');
        $count = $request->post('count');
        $price = $request->post('price');
        $saleItem = $request->post('saleItem');

        $data = Sale::create([
            'customerId' => $customerId,
            'note' => $note,
            'sales' => $sales,
            'status' => $status
        ]);

        for ($i = 0; $i < count($itemId); $i++) {
            $item = saleItem::create([
                'saleId' => $data->id,
                'itemId' => $itemId[$i],
                'unitId' => $unitId[$i],
                'count' => $count[$i],
                'price' => $price[$i],
                'saleItem' => $saleItem[$i]
            ]);
            $items[] = $item;
        } 

        $data['items'] = $items;

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Sale::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Sale::find($id);
        $data->delete();

        return response()->json(null, 204);
    }
}
