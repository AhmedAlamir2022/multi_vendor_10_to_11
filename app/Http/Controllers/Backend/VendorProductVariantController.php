<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductVariantController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product);
        /** Check product vendor */
        if ($product->vendor_id !== Auth::user()->id) {
            abort(404);
        }
        $product_variants = ProductVariant::where('product_id', $product->id)->latest()->get();
        return view('vendor.product.product-variant.index', compact('product', 'product_variants'));
    }

    public function create()
    {
        return view('vendor.product.product-variant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => ['integer', 'required'],
            'name' => ['required', 'max:200'],
            'status' => ['required']
        ]);

        $varinat = new ProductVariant();
        $varinat->product_id = $request->product;
        $varinat->name = $request->name;
        $varinat->status = $request->status;
        $varinat->save();
        toastr('Created Successfully!', 'success', 'success');
        return redirect()->route('vendor.products-variant.index', ['product' => $request->product]);
    }

    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        /** Check product vendor */
        if ($variant->product->vendor_id !== Auth::user()->id) {
            abort(404);
        }
        return view('vendor.product.product-variant.edit', compact('variant'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'status' => ['required']
        ]);

        $varinat = ProductVariant::findOrFail($id);
        /** Check product vendor */
        if ($varinat->product->vendor_id !== Auth::user()->id) {
            abort(404);
        }
        $varinat->name = $request->name;
        $varinat->status = $request->status;
        $varinat->save();
        toastr('Updated Successfully!', 'info', 'success');
        return redirect()->route('vendor.products-variant.index', ['product' => $varinat->product_id]);
    }

    public function destroy(string $id)
    {
        $varinat = ProductVariant::findOrFail($id);
        /** Check product vendor */
        if ($varinat->product->vendor_id !== Auth::user()->id) {
            abort(404);
        }
        $variantItemCheck = ProductVariantItem::where('product_variant_id', $varinat->id)->count();
        if ($variantItemCheck > 0) {
            return response(['status' => 'error', 'message' => 'This variant contain variant items in it delete the variant items first for delete this variant!']);
        }
        $varinat->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $varinat = ProductVariant::findOrFail($request->id);
        $varinat->status = $request->status == 'true' ? 1 : 0;
        $varinat->save();
        return response(['message' => 'Status has been updated!']);
    }
}
