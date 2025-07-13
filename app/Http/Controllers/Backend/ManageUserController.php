<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\AccountCreatedMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManageUserController extends Controller
{
    public function index()
    {
        return view('admin.manage-user.index');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'role' => ['required']
        ]);
        $user = new User();
        if ($request->role === 'user') {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'user';
            $user->status = 'active';
            $user->save();
            Mail::to($request->email)->send(new AccountCreatedMail($request->name, $request->email, $request->password));
            toastr('Created Successfully!', 'success', 'success');
            return redirect()->back();
        } elseif ($request->role === 'vendor') {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'vendor';
            $user->status = 'active';
            $user->banner = 'uploads/1343.jpg';
            $user->shop_name = $request->name . ' Shop';
            $user->phone = '12321312';
            $user->address = 'Usa';
            $user->description = 'shop description';
            $user->vendor_status = 1;
            $user->save();
            Mail::to($request->email)->send(new AccountCreatedMail($request->name, $request->email, $request->password));
            toastr('Created Successfully!', 'success', 'success');
            return redirect()->back();
        } elseif ($request->role === 'admin') {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'admin';
            $user->status = 'active';
            $user->banner = 'uploads/1343.jpg';
            $user->shop_name = $request->name . ' Shop';
            $user->phone = '12321312';
            $user->address = 'Usa';
            $user->description = 'shop description';
            $user->vendor_status = 1;
            $user->save();
            Mail::to($request->email)->send(new AccountCreatedMail($request->name, $request->email, $request->password));
            toastr('Created Successfully!', 'success', 'success');
            return redirect()->back();
        }
    }
}
