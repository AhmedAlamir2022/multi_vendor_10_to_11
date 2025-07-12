<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterGridThree;
use App\Models\FooterTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FooterGridThreeController extends Controller
{
    public function index()
    {
        $footerTitle = FooterTitle::first();
        $footergridthrees = FooterGridThree::latest()->get();
        return view('admin.footer.footer-grid-three.index', compact('footerTitle', 'footergridthrees'));
    }

    public function create()
    {
        return view('admin.footer.footer-grid-three.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);
        $footer = new FooterGridThree();
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        Cache::forget('footer_grid_three');
        toastr('Created Successfully!', 'success', 'success');
        return redirect()->route('admin.footer-grid-three.index');
    }

    public function edit(string $id)
    {
        $footer = FooterGridThree::findOrFail($id);
        return view('admin.footer.footer-grid-three.edit', compact('footer'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);
        $footer = FooterGridThree::findOrFail($id);
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        Cache::forget('footer_grid_three');
        toastr('Update Successfully!', 'info', 'success');
        return redirect()->route('admin.footer-grid-three.index');
    }

    public function destroy(string $id)
    {
        $footer = FooterGridThree::findOrFail($id);
        $footer->delete();
        Cache::forget('footer_grid_three');
        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $footer = FooterGridThree::findOrFail($request->id);
        $footer->status = $request->status == 'true' ? 1 : 0;
        $footer->save();
        Cache::forget('footer_grid_three');
        return response(['message' => 'Status has been updated!']);
    }

    public function changeTitle(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);
        FooterTitle::updateOrCreate(
            ['id' => 1],
            ['footer_grid_three_title' => $request->title]
        );
        toastr('Updated Successfully', 'info', 'success');
        return redirect()->back();
    }
}
