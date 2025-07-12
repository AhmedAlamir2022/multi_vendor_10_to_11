<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSaleItem;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Cache::rememberForever('sliders', function () {
            return Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        });
        $flashSaleItems = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->pluck('product_id')->toArray();
        return view(
            'frontend.home.home',
            compact('sliders', 'flashSaleItems')
        );
    }

    // public function getTypeBaseProduct()
    // {
    //     $typeBaseProducts = [];
    //     $typeBaseProducts['new_arrival'] = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where(['product_type' => 'new_arrival', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

    //     $typeBaseProducts['featured_product'] = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where(['product_type' => 'featured_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

    //     $typeBaseProducts['top_product'] = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where(['product_type' => 'top_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

    //     $typeBaseProducts['best_product'] = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where(['product_type' => 'best_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

    //     return $typeBaseProducts;
    // }

    function ShowProductModal(string $id)
    {
        $product = Product::findOrFail($id);
        $content = view('frontend.layouts.modal', compact('product'))->render();
        return Response::make($content, 200, ['Content-Type' => 'text/html']);
    }

    // public function vendorPage()
    // {
    //     $vendors = User::where('status', 'active')->where('vendor_status', '1')->paginate(8);
    //     return view('frontend.pages.vendors', compact('vendors'));
    // }

    // public function vendorProductsPage(string $id)
    // {

    //     $products = Product::where(['status' => 1, 'is_approved' => 1, 'vendor_id' => $id])->orderBy('id', 'DESC')->paginate(12);
    //     $categories = Category::where(['status' => 1])->get();
    //     $brands = Brand::where(['status' => 1])->get();
    //     $vendor = User::findOrFail($id);
    //     return view('frontend.pages.vendor-product', compact('products', 'categories', 'brands', 'vendor'));

    // }
}
