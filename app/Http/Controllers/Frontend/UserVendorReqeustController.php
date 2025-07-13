<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorCondition;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVendorReqeustController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $content = VendorCondition::first();
        return view('frontend.dashboard.vendor-request.index', compact('content'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'banner' => ['required', 'image', 'max:3000'],
            'shop_name' => ['required', 'max:200'],
            // 'shop_email' => ['required', 'email'],
            'phone' => ['required', 'max:200'],
            'address' => ['required'],
            'description' => ['required']
        ]);
        if (Auth::user()->role === 'vendor') {
            return redirect()->back();
        }
        $imagePath = $this->uploadImage($request, 'banner', 'uploads');
        $id = Auth::user()->id;
        $vendor = User::findOrFail($id);
        $vendor->banner = $imagePath;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->description = $request->description;
        $vendor->shop_name = $request->shop_name;
        $vendor->vendor_status = 0;
        $vendor->save();
        toastr('Submitted successfully please wait for approve!', 'success', 'success');
        return redirect()->back();
    }
}
