<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;

class WebsiteController extends Controller
{
    public function home(): View
    {
        $categories = ProductCategory::query()
            ->where('is_active', true)
            ->withCount(['products' => fn ($query) => $query->where('is_active', true)])
            ->orderBy('name')
            ->get();

        $featuredProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $latestProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

        return view('home', compact('categories', 'featuredProducts', 'latestProducts'));
    }

    public function products(): View
    {
        $categories = ProductCategory::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $products = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->when(request('category'), function ($query, $slug) {
                $query->whereHas('category', fn ($categoryQuery) => $categoryQuery->where('slug', $slug));
            })
            ->when(request('search'), function ($query, $search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'ilike', '%' . $search . '%')
                        ->orWhere('short_description', 'ilike', '%' . $search . '%')
                        ->orWhere('description', 'ilike', '%' . $search . '%');
                });
            })
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        return view('products.index', compact('categories', 'products'));
    }

    public function productDetail(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $relatedProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->when($product->product_category_id, fn ($query) => $query->where('product_category_id', $product->product_category_id))
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function contact(): View
    {
        return view('contact');
    }
}
