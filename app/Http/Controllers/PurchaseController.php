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
        return Purchase::all();
    }

    public function show($id)
    {
        return Purchase::find($id);
    }

    public function between($start, $end)
    {
        return DB::table('purchaseOrders')
            ->whereBetween('created_at', [$start, $end])
            ->get();
    }

    public function store(Request $request)
    {
        $items = [];

        $supplierId = $request->post('supplierId');
        $note = $request->post('note');
        $totalPrice = $request->post('totalPrice');
        $status = $request->post('status');
        $itemId = $request->post('itemId');
        $unitId = $request->post('unitId');
        $count = $request->post('count');
        $unitCost = $request->post('unitCost');
        $subTotal = $request->post('subTotal');

        $data = Purchase::create([
            'supplierId' => $supplierId,
            'note' => $note,
            'totalPrice' => $totalPrice,
            'status' => $status
        ]);

        for ($i = 0; $i < count($itemId); $i++) {
            $item = PurchaseItem::create([
                'purchaseId' => $data->id,
                'itemId' => $itemId[$i],
                'unitId' => $unitId[$i],
                'count' => $count[$i],
                'unitCost' => $unitCost[$i],
                'subTotal' => $subTotal[$i]
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
