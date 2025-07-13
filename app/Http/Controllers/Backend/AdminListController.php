<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->latest()->get();
        return view('admin.admin-list.index', compact('admins'));
    }

    public function changeStatus(Request $request)
    {
        $admin = User::findOrFail($request->id);
        $admin->status = $request->status == 'true' ? 'active' : 'inactive';
        $admin->save();
        return response(['message' => 'Status has been updated!']);
    }

    public function destory(string $id)
    {
        $admin = User::findOrFail($id);
        $products = Product::where('vendor_id', $admin->id)->get();
        if(count($products) > 0){
            return response(['status' => 'error', 'message' => 'Admin can\'t be deleted please ban the user insted of delete!']);
        }
        User::where('id', $admin->id)->delete();
        $admin->delete();
        return response(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}
