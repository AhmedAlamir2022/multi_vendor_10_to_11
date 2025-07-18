<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class ChildCategoryController extends Controller
{
    public function index()
    {
        $childCategories = ChildCategory::latest()->get();
        return view('admin.child-category.index', compact('childCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories'));
    }

    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subCategories;
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'sub_category' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name'],
            'status' => ['required']
        ]);
        $childCategory = new ChildCategory();
        $childCategory->category_id = $request->category;
        $childCategory->sub_category_id = $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();
        toastr('ChildCategory Created Successfully!', 'success');
        return redirect()->route('admin.child-category.index');
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $childCategory->category_id)->get();
        return view('admin.child-category.edit', compact('categories', 'childCategory', 'subCategories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required'],
            'sub_category' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name,' . $id],
            'status' => ['required']
        ]);
        $childCategory = ChildCategory::findOrFail($id);
        $childCategory->category_id = $request->category;
        $childCategory->sub_category_id = $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();
        toastr('Update Successfully!', 'info');
        return redirect()->route('admin.child-category.index');
    }

    public function destroy(string $id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        // if (Product::where('child_category_id', $childCategory->id)->count() > 0) {
        //     return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
        // }

        // $homeSettings = HomePageSetting::all();
        // foreach ($homeSettings as $item) {
        //     $array = json_decode($item->value, true);
        //     $collection = collect($array);
        //     if ($collection->contains('child_category', $childCategory->id)) {
        //         return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
        //     }
        // }
        $childCategory->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $category = ChildCategory::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();
        return response(['message' => 'Status has been updated!']);
    }
}
