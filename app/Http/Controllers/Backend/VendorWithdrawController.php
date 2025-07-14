<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\WithdrawMethod;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VendorWithdrawController extends Controller
{
    public function index()
    {
        $totalEarnings = OrderProduct::where('user_id', auth()->user()->id)
            ->whereHas('order', function ($query) {
                $query->where('payment_status', 1)->where('order_status', 'delivered');
            })
            ->sum(DB::raw('unit_price * qty + variant_total'));

        $totalWithdraw = WithdrawRequest::where('status', 'paid')->sum('total_amount');
        $currentBalance = $totalEarnings - $totalWithdraw;
        $pendingAmount = WithdrawRequest::where('status', 'pending')->sum('total_amount');
        $withdraws = WithdrawRequest::where('user_id', auth()->user()->id)->latest()->get();
        return view('vendor.withdraw.index', compact('currentBalance', 'totalWithdraw', 'pendingAmount', 'withdraws'));
    }

    public function create()
    {
        $methods = WithdrawMethod::all();
        return view('vendor.withdraw.create', compact('methods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => ['required', 'integer'],
            'amount' => ['required', 'numeric'],
            'account_info' => ['required', 'max:2000']
        ]);

        $method = WithdrawMethod::findOrFail($request->method);
        if ($request->amount < $method->minimum_amount || $request->amount > $method->maximum_amount) {
            throw ValidationException::withMessages(["The amount have to be getter then $method->minimum_amount and less then $method->maximum_amount"]);
        }
        $totalEarnings = OrderProduct::where('user_id', auth()->user()->id)
            ->whereHas('order', function ($query) {
                $query->where('payment_status', 1)->where('order_status', 'delivered');
            })
            ->sum(DB::raw('unit_price * qty + variant_total'));
        $totalWithdraw = WithdrawRequest::where('status', 'paid')->sum('total_amount');
        $currentBalance = $totalEarnings - $totalWithdraw;

        if ($request->amount > $currentBalance) {
            throw ValidationException::withMessages(['Insufficient Balance']);
        }
        if (WithdrawRequest::where(['user_id' => auth()->user()->id, 'status' => 'pending'])->exists()) {
            throw ValidationException::withMessages(['You already have a pending request']);
        }
        $withdraw = new WithdrawRequest();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->method = $method->name;
        $withdraw->total_amount = $request->amount;
        $withdraw->withdraw_amount = $request->amount - ($method->withdraw_charge / 100) * $request->amount;
        $withdraw->withdraw_charge = ($method->withdraw_charge / 100) * $request->amount;
        $withdraw->account_info = $request->account_info;
        $withdraw->save();
        toastr('Request added successfully');
        return redirect()->route('vendor.withdraw.index');
    }

    public function show(string $id)
    {
        $methodInfo = WithdrawMethod::findOrFail($id);
        return response($methodInfo);
    }

    function showRequest(string $id)
    {
        $request = WithdrawRequest::where('user_id', auth()->user()->id)->findOrFail($id);
        return view('vendor.withdraw.show', compact('request'));
    }
}
