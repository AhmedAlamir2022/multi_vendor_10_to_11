<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FooterInfoController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $footerInfo = FooterInfo::first();
        return view('admin.footer.footer-info.index', compact('footerInfo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:3000'],
            'phone' => ['max:100'],
            'email' => ['max:100'],
            'address' => ['max:300'],
            'copyright' => ['max:200']
        ]);
        $footerInfo = FooterInfo::find($id);
        /** Handle file upload */
        $imagePath = $this->updateImage($request, 'logo', 'uploads', $footerInfo?->logo);
        FooterInfo::updateOrCreate(
            ['id' => $id],
            [
                'logo' => empty(!$imagePath) ? $imagePath : $footerInfo->banner,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'copyright' => $request->copyright

            ]
        );
        Cache::forget('footer_info');
        toastr('Updated successfully!', 'info', 'success');
        return redirect()->back();
    }
}
