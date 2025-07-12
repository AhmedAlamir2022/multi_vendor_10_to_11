<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function pendingOrders() 
    {
        $pending_orders = Order::where('order_status', 'pending')->latest()->get();
        return view('admin.order.pending-order', compact('pending_orders'));
    }

    public function processedOrders()
    {
        $processed_orders = Order::where('order_status', 'processed_and_ready_to_ship')->latest()->get();
        return view('admin.order.processed-order', compact('processed_orders'));
    }

    public function droppedOfOrders()
    {
        $dropped_orders = Order::where('order_status', 'dropped_off')->latest()->get();
        return view('admin.order.dropped-off-order', compact('dropped_orders'));
    }

    public function shippedOrders()
    {
        $shipped_orders = Order::where('order_status', 'shipped')->latest()->get();
        return view('admin.order.shipped-order', compact('shipped_orders'));
    }

    public function outForDeliveryOrders()
    {
        $outfordelivery_orders = Order::where('order_status', 'out_for_delivery')->latest()->get();
        return view('admin.order.out-for-delivery-order', compact('outfordelivery_orders'));
    }

    public function deliveredOrders()
    {
        $delivered_orders = Order::where('order_status', 'delivered')->latest()->get();
        return view('admin.order.delivered-order', compact('delivered_orders'));
    }

    public function canceledOrders()
    {
        $canceled_orders = Order::where('order_status', 'canceled')->latest()->get();
        return view('admin.order.canceled-order', compact('canceled_orders'));
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        // delete order products
        $order->orderProducts()->delete();
        // delete transaction
        $order->transaction()->delete();
        $order->delete();
        return response(['status' => 'success', 'message' => 'Order Deleted successfully!']);
    }

    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;
        $order->save();
        return response(['status' => 'success', 'message' => 'Updated Order Status']);
    }

    public function changePaymentStatus(Request $request)
    {
        $paymentStatus = Order::findOrFail($request->id);
        $paymentStatus->payment_status = $request->status;
        $paymentStatus->save();
        return response(['status' => 'success', 'message' => 'Updated Payment Status Successfully']);
    }
}
