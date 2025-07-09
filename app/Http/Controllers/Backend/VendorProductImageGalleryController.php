<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductImageGalleryController extends Controller
{
    use ImageUploadTrait;

    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product);
        /** Check product vendor */
        if ($product->vendor_id !== Auth::user()->id) {
            abort(404);
        }
        $product_image_gallery = ProductImageGallery::where('product_id', $product->id)->latest()->get();
        return view('vendor.product.image-gallery.index', compact('product', 'product_image_gallery'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'image', 'max:2048']
        ]);

        /** Handle image upload */
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');
        foreach ($imagePaths as $path) {
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }
        toastr('Uploaded successfully!');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $productImage = ProductImageGallery::findOrFail($id);

        /** Check product vendor */
        if ($productImage->product->vendor_id !== Auth::user()->id) {
            abort(404);
        }
        $this->deleteImage($productImage->image);
        $productImage->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
