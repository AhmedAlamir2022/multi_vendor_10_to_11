<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VendorRequestController extends Controller
{
    public function index()
    {
        $vendor_requests = User::where('vendor_status', 0)->latest()->get();
        return view('admin.vendor-request.index', compact('vendor_requests'));
    }

    public function show(string $id)
    {
        $vendor = User::findOrFail($id);
        return view('admin.vendor-request.show', compact('vendor'));
    }

    public function changeStatus(Request $request, string $id)
    {
        $vendor = User::findOrFail($id);
        $vendor->vendor_status = $request->vendor_status;
        $vendor->role = 'vendor';
        $vendor->save();
        toastr('Updated successfully!', 'info', 'success');
        return redirect()->route('admin.vendor-requests.index');
    }
}
