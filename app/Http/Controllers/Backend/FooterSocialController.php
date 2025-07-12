<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FooterSocialController extends Controller
{
    public function index()
    {
        $footer_socials = FooterSocial::latest()->get();
        return view('admin.footer.footer-socials.index', compact('footer_socials'));
    }

    public function create()
    {
        return view('admin.footer.footer-socials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required'],
        ]);
        $footer = new FooterSocial();
        $footer->icon = $request->icon;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        Cache::forget('footer_socials');
        toastr('Created Successfully!', 'success', 'success');
        return redirect()->route('admin.footer-socials.index');
    }

    public function edit(string $id)
    {
        $footer = FooterSocial::findOrFail($id);
        return view('admin.footer.footer-socials.edit', compact('footer'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required'],
        ]);
        $footer = FooterSocial::findOrFail($id);
        $footer->icon = $request->icon;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        Cache::forget('footer_socials');
        toastr('Updated Successfully!', 'info', 'success');
        return redirect()->route('admin.footer-socials.index');
    }

    public function destroy(string $id)
    {
        $footer = FooterSocial::findOrFail($id);
        $footer->delete();
        Cache::forget('footer_socials');
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $footer = FooterSocial::findOrFail($request->id);
        $footer->status = $request->status == 'true' ? 1 : 0;
        $footer->save();
        Cache::forget('footer_socials');
        return response(['message' => 'Status has been updated!']);
    }
}
