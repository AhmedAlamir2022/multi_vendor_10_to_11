<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::latest()->get();
        return view('admin.blog.blog-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog.blog-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200', 'unique:blog_categories']
        ], [
            'name.unique' => 'Category already exist!'
        ]);

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        toastr('Created Successfully!', 'success', 'success');
        return redirect()->route('admin.blog-category.index');
    }

    public function edit(string $id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog.blog-category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200', 'unique:blog_categories,name,' . $id]
        ], [
            'name.unique' => 'Category already exist!'
        ]);
        $category = BlogCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        toastr('Updated Successfully!', 'info', 'success');
        return redirect()->route('admin.blog-category.index');
    }

    public function destroy(string $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();
        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $category = BlogCategory::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();
        return response(['message' => 'Status has been updated!']);
    }
}
