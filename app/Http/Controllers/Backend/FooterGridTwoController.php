<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterGridTwo;
use App\Models\FooterTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FooterGridTwoController extends Controller
{
    public function index()
    {
        $footerTitle = FooterTitle::first();
        $footergridtwos = FooterGridTwo::latest()->get();
        return view('admin.footer.footer-grid-two.index', compact('footerTitle', 'footergridtwos'));
    }

    public function create()
    {
        return view('admin.footer.footer-grid-two.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);

        $footer = new FooterGridTwo();
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        Cache::forget('footer_grid_two');
        toastr('Created Successfully!', 'success', 'success');
        return redirect()->route('admin.footer-grid-two.index');
    }

    public function edit(string $id)
    {
        $footer = FooterGridTwo::findOrFail($id);
        return view('admin.footer.footer-grid-two.edit', compact('footer'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);
        $footer = FooterGridTwo::findOrFail($id);
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        Cache::forget('footer_grid_two');
        toastr('Update Successfully!', 'info', 'success');
        return redirect()->route('admin.footer-grid-two.index');
    }

    public function destroy(string $id)
    {
        $footer = FooterGridTwo::findOrFail($id);
        $footer->delete();
        Cache::forget('footer_grid_two');
        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $footer = FooterGridTwo::findOrFail($request->id);
        $footer->status = $request->status == 'true' ? 1 : 0;
        $footer->save();
        Cache::forget('footer_grid_two');
        return response(['message' => 'Status has been updated!']);
    }

    public function changeTitle(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);
        FooterTitle::updateOrCreate(
            ['id' => 1],
            ['footer_grid_two_title' => $request->title]
        );
        toastr('Updated Successfully', 'info', 'success');
        return redirect()->back();
    }
}
