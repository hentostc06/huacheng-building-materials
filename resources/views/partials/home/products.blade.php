@php
    $productItems = $latestProducts ?? collect();
    $visibleProducts = $productItems->take(3);
    $hasMoreProducts = $productItems->count() > 3;
@endphp

@if($productItems->isNotEmpty())
<section class="hc-section bg-white">
    <div class="hc-container">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Produk / 产品</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">Katalog Produk</h2>
            </div>

            @if($hasMoreProducts)
                <a href="{{ route('products.index') }}" class="button hc-section-head-cta">
                    <span>Lihat Selengkapnya / 查看更多</span>
                </a>
            @else
                <a href="{{ route('products.index') }}" class="button hc-section-head-cta">
                    <span>Buka Halaman Produk / 产品页面</span>
                </a>
            @endif
        </div>

        <div class="hc-product-grid mt-10">
            @foreach($visibleProducts as $product)
                <article class="hc-uniform-card hc-card group overflow-hidden rounded-2xl border border-hc-line bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-soft">
                    <a href="{{ route('products.show', $product) }}" class="block">
                        <div class="hc-uniform-card-media">
                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            >
                        </div>
                    </a>

                    <div class="hc-uniform-card-body p-6">
                        @if($product->category)
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-hc-primary">
                                {{ $product->category->display_name }}
                            </p>
                        @endif

                        <a href="{{ route('products.show', $product) }}">
                            <h3 class="mt-3 text-xl font-bold leading-snug text-hc-text transition group-hover:text-hc-primary hc-text-wrap">
                                {{ $product->name }}
                            </h3>
                        </a>

                        @if($product->name_zh)
                            <p class="mt-1 text-base font-semibold text-hc-primary">
                                {{ $product->name_zh }}
                            </p>
                        @endif

                        @if($product->short_description)
                            <p class="mt-3 line-clamp-3 text-sm leading-6 text-hc-softText">
                                {{ $product->short_description }}
                            </p>
                        @endif

                        @if($product->short_description_zh)
                            <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-500">
                                {{ $product->short_description_zh }}
                            </p>
                        @endif

                        <div class="mt-6">
                            <a href="{{ route('products.show', $product) }}" class="button button-sm">
                                <span>Detail</span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

<div class="hc-section-bottom-cta">
            @if($hasMoreProducts)
                <a href="{{ route('products.index') }}" class="button">
                    <span>Lihat Selengkapnya / 查看更多</span>
                </a>
            @else
                <a href="{{ route('products.index') }}" class="button">
                    <span>Buka Halaman Produk / 产品页面</span>
                </a>
            @endif
        </div>
    </div>
</section>
@else
<section class="hc-section bg-white">
    <div class="hc-container">
        <div class="rounded-2xl border border-dashed border-hc-line bg-hc-bg p-10 text-center">
            <h3 class="text-2xl font-bold text-hc-text">Belum ada produk</h3>
            <p class="mt-3 text-hc-softText">
                Produk akan ditampilkan setelah admin menginput data melalui panel Filament.<br>
                产品内容将在管理员后台录入后显示。
            </p>
        </div>
    </div>
</section>
@endif
