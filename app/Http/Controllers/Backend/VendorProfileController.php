<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VendorProfileController extends Controller
{
    public function index()
    {
        return view('vendor.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image', 'max:2048']
        ]);
        $user = Auth::user();
        if ($request->hasFile('image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = 'uploads/' . $imageName;
            $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->info('Profile Updated Successfully!');
        return redirect()->back();
    }

    // public function updateShopProfile(Request $request)
    // {
    //     $request->validate([
    //         'banner' => ['nullable', 'image', 'max:3000'],
    //         'shop_name' => ['required', 'max:200'],
    //         'phone' => ['required', 'max:50'],
    //         'address' => ['required'],
    //         'description' => ['required'],
    //         'fb_link' => ['nullable', 'url'],
    //         'tw_link' => ['nullable', 'url'],
    //         'insta_link' => ['nullable', 'url'],
    //     ]);
    //     $user = Auth::user();
    //     if ($request->hasFile('banner')) {
    //         if (File::exists(public_path($user->banner))) {
    //             File::delete(public_path($user->banner));
    //         }
    //         $banner = $request->banner;
    //         $bannerName = rand() . '_' . $banner->getClientOriginalName();
    //         $banner->move(public_path('uploads'), $bannerName);
    //         $path = 'uploads/' . $bannerName;
    //         $user->banner = $path;
    //     }
    //     $bannerPath = $this->updateImage($request, 'banner', 'uploads', $user->banner);
    //     $user->banner = empty(!$bannerPath) ? $bannerPath : $user->banner;
    //     $user->shop_name = $request->shop_name;
    //     $user->phone = $request->phone;
    //     $user->address = $request->address;
    //     $user->description = $request->description;
    //     $user->fb_link = $request->fb_link;
    //     $user->tw_link = $request->tw_link;
    //     $user->insta_link = $request->insta_link;
    //     $user->save();
    //     toastr()->success('Shop Profile Updated Successfully!');
    //     return redirect()->back();
    // }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        toastr()->info('Profile Password Updated Successfully!');
        return redirect()->back();
    }
}
