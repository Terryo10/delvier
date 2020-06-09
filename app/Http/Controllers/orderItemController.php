<?php

namespace App\Http\Controllers;

use App\delivery;
use App\order;
use App\order_items;
use Illuminate\Http\Request;

class orderItemController extends Controller
{
    public function deliveryShow($id)
    {
        $item = order_items::findorfail($id);
        return view('supplier.delivery.item')
            ->with('item', $item);
    }

    public function deliveryUpdate(Request $request)
    {
        $order_id = $request->input('order_id');
        $status = $request->input('status');

        $order_item = order_items::findorfail($order_id);
        $order_item->update([
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'updated');

    }

    public function parentOrder($id)
    {
        $order = order::findorfail($id);
        $delivery = delivery::find($order->delivery_id);
        $items = $order->order_items;

        return view('supplier.orders.parent')
            ->with('delivery', $delivery)
            ->with('order', $order)
            ->with('items',$items);
    }
}
