<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\PurchaseItem;

class PurchaseController extends Controller
{
    
    public function index()
    {
        $data = DB::table('purchaseOrders')
            ->join('suppliers', 'purchaseOrders.supplierId', '=', 'suppliers.id')
            ->select('purchaseOrders.*', 'suppliers.name as supplierName')
            ->get();
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = DB::table('purchaseOrders')
            ->join('suppliers', 'purchaseOrders.supplierId', '=', 'suppliers.id')
            ->select('purchaseOrders.*', 'suppliers.name as supplierName')
            ->first();
        $data->items = DB::table('purchaseOrderItems')
            ->select('purchaseOrderItems.*', 'librarySkus.name as ItemName','units.symbol')
            ->join('librarySkus', 'purchaseOrderItems.itemId', '=', 'librarySkus.id')
            ->join('units', 'purchaseOrderItems.unitId', '=', 'units.id')
            ->where('purchaseOrderItems.purchaseId', $id)
            ->get();
        return response()->json($data, 200);
    }

    public function between($start, $end)
    {
        return DB::table('purchaseOrders')
            ->select('purchaseOrders.*', 'suppliers.name as supplierName')
            ->join('suppliers', 'purchaseOrders.supplierId', '=', 'suppliers.id')
            ->whereBetween('purchaseOrders.created_at', [$start, $end])
            ->get();
    }

    public function store(Request $request)
    {
        $items = [];

        $supplierId = $request->post('supplierId');
        $note = $request->post('note');
        $purchase = $request->post('purchase');
        $status = $request->post('status');
        $itemId = $request->post('itemId');
        $unitId = $request->post('unitId');
        $count = $request->post('count');
        $purchaseItems = $request->post('purchaseItems');

        $data = Purchase::create([
            'supplierId' => $supplierId,
            'note' => $note,
            'purchase' => $purchase,
            'status' => $status
        ]);

        for ($i = 0; $i < count($itemId); $i++) {
            $item = PurchaseItem::create([
                'purchaseId' => $data->id,
                'itemId' => $itemId[$i],
                'unitId' => $unitId[$i],
                'count' => $count[$i],
                'purchaseItems' => $purchaseItems[$i]
            ]);
            $items[] = $item;
        } 

        $data['items'] = $items;

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Purchase::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Purchase::find($id);
        $data->delete();

        return response()->json(null, 204);
    }
}
