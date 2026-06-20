@extends('layouts.website', ['title' => 'Produk - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light">
    <div class="hc-container py-10 sm:py-14">
        <div class="max-w-3xl">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Produk / 产品目录</p>

            <h1 class="mt-4 font-bold tracking-tight text-hc-text hc-fluid-heading">
                Katalog Produk
            </h1>

            <div class="mt-5 space-y-2 text-base leading-8 text-hc-softText">
                <p>Temukan produk Huacheng Building Materials sesuai kategori dan kebutuhan proyek Anda.</p>
                <p class="text-slate-500">您可以浏览产品目录，或联系我们获取项目专属方案。</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-8 sm:py-12">
    <div class="hc-container">
        <form method="GET" class="grid grid-cols-1 gap-3 rounded-[1.5rem] border border-hc-line bg-white p-4 shadow-soft sm:gap-4 sm:rounded-[2rem] sm:p-5 lg:grid-cols-[minmax(0,1fr)_260px_auto]">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari produk..."
                class="h-12 w-full rounded-2xl border border-hc-line bg-white px-5 text-sm outline-none transition focus:border-hc-primary focus:ring-4 focus:ring-sky-100"
            >

            <select
                name="category"
                class="h-12 w-full rounded-2xl border border-hc-line bg-white px-5 text-sm outline-none transition focus:border-hc-primary focus:ring-4 focus:ring-sky-100"
            >
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>
                        {{ $category->display_name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="button hc-mobile-full">
                <span>Filter</span>
            </button>
        </form>

        @if($products->count())
            <div class="hc-product-grid mt-8 sm:mt-10">
                @foreach($products as $product)
                    <article class="hc-card group overflow-hidden rounded-[1.6rem] border border-hc-line bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-soft sm:rounded-[2rem]">
                        <a href="{{ route('products.show', $product) }}" class="block">
                            <div class="hc-product-image-wrap">
                                <img
                                    src="{{ $product->image_url }}"
                                    alt="{{ $product->name }}"
                                    class="hc-product-image"
                                    loading="lazy"
                                >
                            </div>
                        </a>

                        <div class="p-5 sm:p-6">
                            @if($product->category)
                                <div class="mb-3 inline-flex max-w-full rounded-full bg-sky-50 px-3 py-1 text-[11px] font-bold leading-5 text-hc-primary ring-1 ring-sky-100">
                                    <span class="truncate">{{ $product->category->display_name }}</span>
                                </div>
                            @endif

                            <a href="{{ route('products.show', $product) }}" class="block">
                                <h2 class="text-lg font-black leading-snug text-hc-text transition group-hover:text-hc-primary sm:text-xl hc-text-wrap">
                                    {{ $product->name }}
                                </h2>

                                @if($product->name_zh)
                                    <p class="mt-1 text-sm font-bold leading-relaxed text-hc-primary sm:text-base">
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
                                <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-500 sm:line-clamp-3">
                                    {{ $product->short_description_zh }}
                                </p>
                            @endif

                            <div class="mt-5 flex flex-col gap-4 border-t border-hc-line pt-5 sm:mt-6 sm:flex-row sm:items-center sm:justify-between">
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

                                <a href="{{ route('products.show', $product) }}" class="button button-sm hc-mobile-full">
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
