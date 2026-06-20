@extends('layouts.website', ['title' => $product->display_name . ' - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light">
    <div class="hc-container py-6 sm:py-8">
        <a href="{{ route('products.index') }}" class="button button-back">
<span>Kembali ke Produk</span>
        </a>
    </div>
</section>

<section class="bg-white py-14">
    <div class="hc-container hc-grid-2 items-start">
        <div class="hc-card self-start overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-soft">
            <img
                src="{{ $product->image_url }}"
                alt="{{ $product->name }}"
                class="block w-full h-auto object-cover"
            >
        </div>

        <div>
            @if($product->category)
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">
                    {{ $product->category->display_name }}
                </p>
            @endif

            <h1 class="mt-4 font-bold tracking-tight text-hc-text hc-fluid-heading hc-text-wrap">
                {{ $product->name }}
            </h1>

            @if($product->name_zh)
                <p class="mt-3 font-bold leading-tight text-hc-primary hc-fluid-heading hc-text-wrap">
                    {{ $product->name_zh }}
                </p>
            @endif

            @if($product->short_description || $product->short_description_zh)
                <div class="mt-7 rounded-[2rem] border border-hc-line bg-hc-bg p-6">
                    @if($product->short_description)
                        <p class="text-base leading-8 text-hc-softText">
                            {{ $product->short_description }}
                        </p>
                    @endif

                    @if($product->short_description_zh)
                        <p class="mt-3 text-base leading-8 text-slate-500">
                            {{ $product->short_description_zh }}
                        </p>
                    @endif
                </div>
            @endif

            @if($product->price && (float) $product->price > 0)
                <div class="mt-6 rounded-[2rem] border border-hc-line bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-500">Estimasi Harga</p>
                    <p class="mt-1 text-3xl font-bold text-hc-text">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
            @endif

            <div class="mt-8 flex flex-col gap-4 sm:flex-row hc-mobile-stack items-stretch sm:items-center">
                <a href="https://wa.me/628211660798?text={{ urlencode('Halo, apakah produk ini tersedia? Saya ingin menanyakan produk: ' . $product->display_name) }}">
                    Tanya Produk via WhatsApp
                </a>

                <a href="{{ route('contact') }}">
                    Kontak Sales
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-hc-bg py-16">
    <div class="hc-container grid grid-cols-1 gap-8 lg:grid-cols-2">
        <div class="rounded-[2rem] border border-hc-line bg-white p-8 shadow-sm">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-hc-primary">Deskripsi Produk</p>
            <h2 class="mt-3 text-2xl font-bold text-hc-text">Informasi Produk</h2>

            <div class="mt-6 space-y-5 text-base leading-8 text-hc-softText">
                @if($product->description)
                    <div>
                        {!! nl2br(e($product->description)) !!}
                    </div>
                @else
                    <p>Deskripsi produk belum tersedia.</p>
                @endif

                @if($product->description_zh)
                    <div class="border-t border-hc-line pt-5 text-slate-500">
                        {!! nl2br(e($product->description_zh)) !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="rounded-[2rem] border border-hc-line bg-white p-8 shadow-sm">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-hc-primary">Spesifikasi / 产品规格</p>
            <h2 class="mt-3 text-2xl font-bold text-hc-text">Detail Spesifikasi</h2>

            <div class="mt-6 space-y-5 text-base leading-8 text-hc-softText">
                @if($product->specification)
                    <div>
                        {!! nl2br(e($product->specification)) !!}
                    </div>
                @else
                    <p>Spesifikasi produk belum tersedia.</p>
                @endif

                @if($product->specification_zh)
                    <div class="border-t border-hc-line pt-5 text-slate-500">
                        {!! nl2br(e($product->specification_zh)) !!}
                    </div>
                @else
                    <div class="border-t border-hc-line pt-5 text-slate-500">
                        产品规格将在管理员完善后显示。
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16">
    <div class="hc-container">
        <div class="rounded-[2rem] bg-hc-primary p-8 text-white sm:p-10 lg:p-12">
            <div class="flex flex-col items-start justify-between gap-6 lg:flex-row lg:items-center">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-white/80">Need Quotation / 获取报价</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight">Butuh penawaran untuk produk ini?</h2>
                    <p class="mt-3 max-w-2xl text-white/85">
                        Hubungi tim Huacheng Building Materials untuk konsultasi, ketersediaan ukuran, dan permintaan harga.
                    </p>
                </div>

                <a href="https://wa.me/628211660798?text={{ urlencode('Halo, apakah produk ini tersedia? Saya ingin menanyakan produk: ' . $product->display_name) }}" class="bg-white text-hc-primary hover:bg-slate-100">
                    Hubungi WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
