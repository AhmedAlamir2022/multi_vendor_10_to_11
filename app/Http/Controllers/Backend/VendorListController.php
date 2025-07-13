<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VendorListController extends Controller
{
    public function index()
    {
        $vendors = User::where('role', 'vendor')->latest()->get();
        return view('admin.vendor-list.index', compact('vendors'));
    }

    public function changeStatus(Request $request)
    {
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status == 'true' ? 'active' : 'inactive';
        $customer->save();
        return response(['message' => 'Status has been updated!']);
    }
}
