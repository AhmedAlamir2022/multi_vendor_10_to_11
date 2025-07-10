<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\ShippingRule;
use Illuminate\Http\Request;

class ShippingRuleController extends Controller
{

    protected $currencyIcon = '';

    public function __construct()
    {
        $this->currencyIcon = GeneralSetting::first()->currency_icon;
    }
    public function index()
    {
        $currencyIcon = $this->currencyIcon;
        $shipping_rules = ShippingRule::latest()->get();
        return view('admin.shipping-rule.index', compact('shipping_rules', 'currencyIcon'));
    }

    public function create()
    {
        return view('admin.shipping-rule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'type' => ['required'],
            'min_cost' => ['nullable', 'integer'],
            'cost' => ['required', 'integer'],
            'status' => ['required']
        ]);
        $shipping = new ShippingRule();
        $shipping->name = $request->name;
        $shipping->type = $request->type;
        $shipping->min_cost = $request->min_cost;
        $shipping->cost = $request->cost;
        $shipping->status = $request->status;
        $shipping->save();
        toastr('Created Successfully', 'success', 'Success');
        return redirect()->route('admin.shipping-rule.index');
    }

    public function edit(string $id)
    {
        $shipping = ShippingRule::findOrFail($id);
        return view('admin.shipping-rule.edit', compact('shipping'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'type' => ['required'],
            'min_cost' => ['nullable', 'integer'],
            'cost' => ['required', 'integer'],
            'status' => ['required']
        ]);
        $shipping = ShippingRule::findOrFail($id);
        $shipping->name = $request->name;
        $shipping->type = $request->type;
        $shipping->min_cost = $request->min_cost;
        $shipping->cost = $request->cost;
        $shipping->status = $request->status;
        $shipping->save();
        toastr('Updated Successfully', 'info', 'Success');
        return redirect()->route('admin.shipping-rule.index');
    }

    public function destroy(string $id)
    {
        $shipping = ShippingRule::findOrFail($id);
        $shipping->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $shipping = ShippingRule::findOrFail($request->id);
        $shipping->status = $request->status == 'true' ? 1 : 0;
        $shipping->save();
        return response(['message' => 'Status has been updated!']);
    }
}
