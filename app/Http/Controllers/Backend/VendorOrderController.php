<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->latest()->get();
        return view('vendor.order.index', compact('orders'));
    }

    public function show(string $id)
    {
        $order = Order::with(['orderProducts'])->findOrFail($id);
        return view('vendor.order.show', compact('order'));
    }

    public function orderStatus(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();
        toastr('Status Updated Successfully!', 'info', 'Success');
        return redirect()->back();
    }
}
