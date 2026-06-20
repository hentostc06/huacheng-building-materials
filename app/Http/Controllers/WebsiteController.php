<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\CompanyProject;
use App\Models\ContentPlaylist;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;

class WebsiteController extends Controller
{
    public function home(): View
    {
        $heroSlides = class_exists(\App\Models\HeroSlide::class)
            ? \App\Models\HeroSlide::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderByDesc('created_at')
                ->get()
            : collect();

        $categories = ProductCategory::query()
            ->where('is_active', true)
            ->withCount(['products' => fn ($query) => $query->where('is_active', true)])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $featuredProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $latestProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

        $projects = CompanyProject::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $playlists = ContentPlaylist::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $blogPosts = BlogPost::query()
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('home', compact(
            'heroSlides',
            'categories',
            'featuredProducts',
            'latestProducts',
            'projects',
            'playlists',
            'blogPosts',
        ));
    }

    public function products(): View
    {
        $categories = ProductCategory::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
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
                        ->orWhere('name_zh', 'ilike', '%' . $search . '%')
                        ->orWhere('short_description', 'ilike', '%' . $search . '%')
                        ->orWhere('short_description_zh', 'ilike', '%' . $search . '%')
                        ->orWhere('description', 'ilike', '%' . $search . '%')
                        ->orWhere('description_zh', 'ilike', '%' . $search . '%');
                });
            })
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        return view('products.index', compact('categories', 'products'));
    }

    public function productDetail(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $product->load('category');

        $relatedProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->when($product->product_category_id, fn ($query) => $query->where('product_category_id', $product->product_category_id))
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function blogIndex(): View
    {
        $posts = BlogPost::query()
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('blog.index', compact('posts'));
    }

    public function blogShow(BlogPost $blogPost): View
    {
        abort_unless($blogPost->is_active, 404);

        if ($blogPost->published_at && $blogPost->published_at->isFuture()) {
            abort(404);
        }

        return view('blog.show', ['post' => $blogPost]);
    }

    public function projects(): View
    {
        $projects = CompanyProject::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('projects.index', compact('projects'));
    }

    public function playlists(): View
    {
        $playlists = ContentPlaylist::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('playlists.index', compact('playlists'));
    }

    public function contact(): View
    {
        return view('contact');
    }
}
