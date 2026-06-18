@extends('layouts.website', ['title' => 'Huacheng Building Materials'])

@section('content')
@php
    $heroProducts = ($featuredProducts->isNotEmpty() ? $featuredProducts : $latestProducts)->take(4);
@endphp

<section class="bg-gradient-to-b from-hc-light to-white">
    <div class="hc-container hc-grid-2 py-12 sm:py-16 lg:py-20">
        <div>
            <div class="inline-flex max-w-full items-center rounded-full border border-hc-line bg-white px-4 py-2 text-sm text-slate-700 shadow-sm">
                <span class="mr-2 h-2.5 w-2.5 rounded-full bg-hc-primary"></span>
                <span class="truncate">Indonesia Huacheng Building Materials Co., Ltd / 印尼华诚建材有限公司</span>
            </div>

            <h1 class="mt-6 max-w-3xl text-hc-text hc-text-wrap">
                <span class="block font-bold hc-fluid-title">
                    Solusi Material Bangunan Modular
                </span>
                <span class="zh-title mt-4 block max-w-2xl font-bold text-hc-primary hc-fluid-title-zh">
                    高效模块化建材解决方案
                </span>
            </h1>

            <div class="mt-6 max-w-2xl space-y-3 text-base leading-8 text-hc-softText sm:text-lg">
                <p>
                    Huacheng Building Materials menyediakan berbagai kebutuhan material bangunan modular untuk proyek konstruksi modern, fasilitas portabel, dan rumah kontainer.
                </p>
                <p class="text-[15px] leading-7 text-slate-600 sm:text-base">
                    华诚建材专注于现代建筑项目、活动板房、集装箱房等模块化建材供应。
                </p>
            </div>

            <div class="mt-8 flex flex-col gap-4 sm:flex-row hc-mobile-stack">
                <a href="{{ route('products.index') }}">Lihat Produk</a>
                <a href="{{ route('contact') }}">Hubungi Sales</a>
            </div>

            <div class="mt-12 grid grid-cols-3 gap-4 border-t border-hc-line pt-8 sm:gap-8">
                <div>
                    <p class="text-3xl font-bold text-hc-text">B2B</p>
                    <p class="mt-2 text-xs font-medium uppercase tracking-wider text-slate-500">Project Supply</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-hc-text">OEM</p>
                    <p class="mt-2 text-xs font-medium uppercase tracking-wider text-slate-500">Custom Request</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-hc-text">Fast</p>
                    <p class="mt-2 text-xs font-medium uppercase tracking-wider text-slate-500">Modular System</p>
                </div>
            </div>
        </div>

        <div>
            <div class="hc-card overflow-hidden rounded-[2rem] border border-hc-line bg-white p-4 shadow-soft sm:p-6">
                <div class="flex items-start justify-between gap-4 border-b border-hc-line pb-4">
                    <div>
                        <p class="text-2xl font-bold text-hc-text">产品目录 / Product Catalog</p>
                        <p class="mt-1 text-sm text-slate-500">
                            Produk terbaru dari admin panel.
                        </p>
                    </div>
                </div>

                @if($heroProducts->isNotEmpty())
                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        @foreach($heroProducts as $product)
                            <a href="{{ route('products.show', $product) }}" class="group overflow-hidden rounded-2xl border border-hc-line bg-hc-bg transition hover:-translate-y-1 hover:shadow-soft">
                                <div class="aspect-[4/3] overflow-hidden bg-white">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                </div>

                                <div class="p-4">
                                    <p class="line-clamp-2 text-sm font-bold leading-5 text-hc-text group-hover:text-hc-primary">
                                        {{ $product->name }}
                                    </p>

                                    @if($product->name_zh)
                                        <p class="mt-1 line-clamp-1 text-sm font-semibold text-hc-primary">
                                            {{ $product->name_zh }}
                                        </p>
                                    @endif

                                    @if($product->category)
                                        <p class="mt-3 inline-flex rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-500">
                                            {{ $product->category->display_name }}
                                        </p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        @for($i = 0; $i < 4; $i++)
                            <div class="rounded-2xl border border-dashed border-hc-line bg-hc-bg p-5">
                                <div class="mb-4 aspect-[4/3] rounded-xl bg-white"></div>
                                <div class="h-4 w-32 rounded bg-slate-200"></div>
                                <div class="mt-3 h-3 w-full rounded bg-slate-100"></div>
                                <div class="mt-2 h-3 w-4/5 rounded bg-slate-100"></div>
                                <p class="mt-4 text-xs text-slate-400">Menunggu input produk dari admin</p>
                            </div>
                        @endfor
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="hc-section bg-white">
    <div class="hc-container">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-2 lg:gap-16">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Tentang Kami / 关于我们</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">
                    Perusahaan pemasok material bangunan modular yang fokus pada kualitas, efisiensi, dan kebutuhan proyek modern.
                </h2>
                <p class="mt-5 text-base leading-8 text-hc-softText">
                    Huacheng Building Materials hadir sebagai penyedia solusi material bangunan untuk proyek konstruksi, bangunan portabel, rumah panel, gudang, ruang industri, dan rumah kontainer.
                </p>
                <p class="mt-4 text-base leading-8 text-slate-500">
                    华诚建材致力于为客户提供高品质模块化建材，适用于工业、商业及临时建筑项目需求。
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-[2rem] border border-hc-line bg-hc-bg p-6">
                    <p class="text-3xl font-bold text-hc-primary">01</p>
                    <h3 class="mt-4 text-lg font-bold text-hc-text">Material Modular</h3>
                    <p class="mt-3 text-sm leading-7 text-hc-softText">
                        Produk dirancang untuk pemasangan yang lebih cepat, rapi, dan fleksibel sesuai kebutuhan proyek.
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        模块化建材，安装便捷，适用范围广。
                    </p>
                </div>

                <div class="rounded-[2rem] border border-hc-line bg-hc-bg p-6">
                    <p class="text-3xl font-bold text-hc-primary">02</p>
                    <h3 class="mt-4 text-lg font-bold text-hc-text">Project Supply</h3>
                    <p class="mt-3 text-sm leading-7 text-hc-softText">
                        Mendukung kebutuhan pengadaan material untuk proyek skala kecil hingga besar.
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        支持不同规模项目的材料采购需求。
                    </p>
                </div>

                <div class="rounded-[2rem] border border-hc-line bg-hc-bg p-6">
                    <p class="text-3xl font-bold text-hc-primary">03</p>
                    <h3 class="mt-4 text-lg font-bold text-hc-text">Custom Request</h3>
                    <p class="mt-3 text-sm leading-7 text-hc-softText">
                        Ukuran, warna, dan spesifikasi produk dapat disesuaikan berdasarkan kebutuhan customer.
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        可根据客户需求定制尺寸、颜色及规格。
                    </p>
                </div>

                <div class="rounded-[2rem] border border-hc-line bg-hc-bg p-6">
                    <p class="text-3xl font-bold text-hc-primary">04</p>
                    <h3 class="mt-4 text-lg font-bold text-hc-text">Fast Response</h3>
                    <p class="mt-3 text-sm leading-7 text-hc-softText">
                        Customer dapat langsung menghubungi sales untuk konsultasi produk dan permintaan harga.
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        可直接联系销售团队获取咨询与报价。
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-6 rounded-[2rem] border border-hc-line bg-white p-6 shadow-sm md:grid-cols-3">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-hc-primary">Company</p>
                <p class="mt-3 text-lg font-bold text-hc-text">Indonesia Huacheng Building Materials Co., Ltd</p>
                <p class="mt-2 text-sm text-slate-500">印尼华诚建材有限公司</p>
            </div>

            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-hc-primary">Business Scope</p>
                <p class="mt-3 text-sm leading-7 text-hc-softText">
                    Clean board, aksesoris, ubin baja warna, ubin resin, ubin PVC, rumah panel portabel, dan rumah kontainer.
                </p>
            </div>

            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-hc-primary">Contact</p>
                <p class="mt-3 text-sm leading-7 text-hc-softText">
                    General Manager: Chen Xiao Li<br>
                    WhatsApp: 08211660798<br>
                    Domain: huacheng.modular.co.id
                </p>
            </div>
        </div>
    </div>
</section>

<section id="layanan" class="bg-hc-bg hc-section">
    <div class="hc-container">
        <div class="max-w-3xl">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Layanan / 服务范围</p>
            <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">Ruang Lingkup Produk & Layanan</h2>
            <div class="mt-4 space-y-2 text-base leading-8 text-hc-softText">
                <p>Kami melayani kebutuhan pengadaan berbagai material bangunan modular untuk proyek skala kecil hingga besar.</p>
                <p class="text-[15px] leading-7 text-slate-600 sm:text-base">我们提供模块化建材采购服务，满足不同规模项目的需求。</p>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-3xl border border-hc-line bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-hc-text">Clean Board</h3>
                <p class="mt-3 text-sm leading-6 text-hc-softText">Panel dan papan bangunan untuk kebutuhan konstruksi modern.</p>
                <p class="mt-2 text-sm text-slate-500">洁净板材系统</p>
            </div>

            <div class="rounded-3xl border border-hc-line bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-hc-text">Ubin PVC & Resin</h3>
                <p class="mt-3 text-sm leading-6 text-hc-softText">Material finishing modular yang ringan, praktis, dan efisien.</p>
                <p class="mt-2 text-sm text-slate-500">PVC瓦 / 树脂瓦</p>
            </div>

            <div class="rounded-3xl border border-hc-line bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-hc-text">Portable Panel House</h3>
                <p class="mt-3 text-sm leading-6 text-hc-softText">Solusi ruang portabel untuk mess, kantor proyek, dan bangunan sementara.</p>
                <p class="mt-2 text-sm text-slate-500">活动板房</p>
            </div>

            <div class="rounded-3xl border border-hc-line bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-hc-text">Container House</h3>
                <p class="mt-3 text-sm leading-6 text-hc-softText">Rumah kontainer bongkar pasang cepat untuk kebutuhan modular.</p>
                <p class="mt-2 text-sm text-slate-500">快拼箱房</p>
            </div>
        </div>
    </div>
</section>

<section class="hc-section bg-white">
    <div class="hc-container">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Produk / 产品</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">Katalog Produk</h2>
            </div>
            <a href="{{ route('products.index') }}">
                Buka Halaman Produk
            </a>
        </div>

        @if($latestProducts->isNotEmpty())
            <div class="hc-product-grid mt-10">
                @foreach($latestProducts as $product)
                    <article class="hc-card group overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-soft">
                        <a href="{{ route('products.show', $product) }}" class="block">
                            <div class="hc-image-box relative bg-hc-bg">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            </div>
                        </a>

                        <div class="p-6">
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
                                    <svg class="svgIcon" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12h14" stroke-width="2" stroke-linecap="round"/>
                                        <path d="m13 6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Detail</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="mt-10 rounded-[2rem] border border-dashed border-hc-line bg-hc-bg p-10 text-center">
                <h3 class="text-2xl font-bold text-hc-text">Belum ada produk</h3>
                <p class="mt-3 text-hc-softText">
                    Produk akan ditampilkan setelah admin menginput data melalui panel Filament.<br>
                    产品内容将在管理员后台录入后显示。
                </p>
            </div>
        @endif
    </div>
</section>

<section class="bg-hc-primary py-16">
    <div class="hc-container flex flex-col items-start justify-between gap-8 lg:flex-row lg:items-center">
        <div class="text-white">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-white/80">Need Quotation / 获取报价</p>
            <h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Butuh penawaran untuk proyek Anda?</h2>
            <div class="mt-4 max-w-2xl space-y-2 text-white/85">
                <p>Hubungi tim Huacheng Building Materials untuk konsultasi dan permintaan penawaran harga.</p>
                <p class="text-sm leading-7 text-white/80 sm:text-base">欢迎联系我们获取产品咨询与报价服务。</p>
            </div>
        </div>
    </div>
</section>
@endsection
