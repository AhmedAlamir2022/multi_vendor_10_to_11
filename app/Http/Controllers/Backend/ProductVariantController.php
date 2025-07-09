<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product);
        $product_variants = ProductVariant::where('product_id', $product->id)->latest()->get();
        return view('admin.product.product-variant.index', compact('product', 'product_variants'));
    }

    public function create()
    {
        return view('admin.product.product-variant.create');
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
        toastr('Product Variant Created Successfully!', 'success', 'success');
        return redirect()->route('admin.products-variant.index', ['product' => $request->product]);
    }

    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit', compact('variant'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'status' => ['required']
        ]);
        $varinat = ProductVariant::findOrFail($id);
        $varinat->name = $request->name;
        $varinat->status = $request->status;
        $varinat->save();
        toastr('Product Variant Updated Successfully!', 'info', 'success');
        return redirect()->route('admin.products-variant.index', ['product' => $varinat->product_id]);
    }

    public function destroy(string $id)
    {
        $varinat = ProductVariant::findOrFail($id);
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
