@extends('layouts.website', ['title' => 'Produk - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light">
    <div class="hc-container py-12 sm:py-14">
        <div class="max-w-3xl">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Produk / 产品目录</p>
            <h1 class="mt-4 font-bold tracking-tight text-hc-text hc-fluid-heading">Katalog Produk</h1>
            <div class="mt-5 space-y-2 text-base leading-8 text-hc-softText">
                <p>Temukan produk Huacheng Building Materials sesuai kategori dan kebutuhan proyek Anda.</p>
                <p class="text-slate-500">您可以浏览产品目录，或联系我们获取项目专属方案。</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-12">
    <div class="hc-container">
        <form method="GET" class="grid grid-cols-1 gap-4 rounded-[2rem] border border-hc-line bg-white p-4 shadow-soft sm:p-5 lg:grid-cols-[minmax(0,1fr)_260px_auto]">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari produk..."
                class="h-12 rounded-2xl border border-hc-line bg-white px-5 text-sm outline-none transition focus:border-hc-primary focus:ring-4 focus:ring-sky-100"
            >

            <select
                name="category"
                class="h-12 rounded-2xl border border-hc-line bg-white px-5 text-sm outline-none transition focus:border-hc-primary focus:ring-4 focus:ring-sky-100"
            >
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>
                        {{ $category->display_name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">
                Filter
            </button>
        </form>

        @if($products->count())
            <div class="hc-product-grid mt-10">
                @foreach($products as $product)
                    <article class="hc-card group overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-soft">
                        <a href="{{ route('products.show', $product) }}" class="block">
                            <div class="hc-image-box relative bg-hc-bg">
                                <img
                                    src="{{ $product->image_url }}"
                                    alt="{{ $product->name }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                >

                                @if($product->category)
                                    <div class="absolute left-4 top-4 rounded-full bg-white/95 px-4 py-2 text-xs font-bold text-hc-primary shadow-sm">
                                        {{ $product->category->display_name }}
                                    </div>
                                @endif
                            </div>
                        </a>

                        <div class="p-6">
                            <a href="{{ route('products.show', $product) }}" class="block">
                                <h2 class="text-xl font-bold leading-snug text-hc-text transition group-hover:text-hc-primary hc-text-wrap">
                                    {{ $product->name }}
                                </h2>

                                @if($product->name_zh)
                                    <p class="mt-1 text-base font-semibold leading-relaxed text-hc-primary">
                                        {{ $product->name_zh }}
                                    </p>
                                @endif
                            </a>

                            @if($product->short_description)
                                <p class="mt-4 line-clamp-3 text-sm leading-6 text-hc-softText">
                                    {{ $product->short_description }}
                                </p>
                            @endif

                            @if($product->short_description_zh)
                                <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-500">
                                    {{ $product->short_description_zh }}
                                </p>
                            @endif

                            <div class="mt-6 flex items-center justify-between gap-4 border-t border-hc-line pt-5">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Detail Produk</p>

                                    @if($product->price && (float) $product->price > 0)
                                        <p class="mt-1 text-sm font-bold text-hc-text">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                    @else
                                        <p class="mt-1 text-sm font-semibold text-slate-500">Hubungi Sales</p>
                                    @endif
                                </div>

                                <a href="{{ route('products.show', $product) }}" class="button button-sm">
<span>Detail</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @else
            <div class="mt-10 rounded-[2rem] border border-dashed border-hc-line bg-hc-bg p-10 text-center">
                <h3 class="text-2xl font-bold text-hc-text">Belum ada produk</h3>
                <p class="mt-3 text-hc-softText">
                    Produk belum diinput oleh admin.<br>
                    产品尚未由管理员录入。
                </p>
            </div>
        @endif
    </div>
</section>
@endsection
