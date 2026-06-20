@extends('layouts.website', ['title' => 'Huacheng Building Materials'])

@section('content')
@php
    $heroProducts = ($featuredProducts->isNotEmpty() ? $featuredProducts : $latestProducts)->take(4);
@endphp

@include('partials.home.hero')

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
                <div class="rounded-2xl border border-hc-line bg-hc-bg p-6">
                    <p class="text-3xl font-bold text-hc-primary">01</p>
                    <h3 class="mt-4 text-lg font-bold text-hc-text">Material Modular</h3>
                    <p class="mt-3 text-sm leading-7 text-hc-softText">
                        Produk dirancang untuk pemasangan yang lebih cepat, rapi, dan fleksibel sesuai kebutuhan proyek.
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        模块化建材，安装便捷，适用范围广。
                    </p>
                </div>

                <div class="rounded-2xl border border-hc-line bg-hc-bg p-6">
                    <p class="text-3xl font-bold text-hc-primary">02</p>
                    <h3 class="mt-4 text-lg font-bold text-hc-text">Project Supply</h3>
                    <p class="mt-3 text-sm leading-7 text-hc-softText">
                        Mendukung kebutuhan pengadaan material untuk proyek skala kecil hingga besar.
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        支持不同规模项目的材料采购需求。
                    </p>
                </div>

                <div class="rounded-2xl border border-hc-line bg-hc-bg p-6">
                    <p class="text-3xl font-bold text-hc-primary">03</p>
                    <h3 class="mt-4 text-lg font-bold text-hc-text">Custom Request</h3>
                    <p class="mt-3 text-sm leading-7 text-hc-softText">
                        Ukuran, warna, dan spesifikasi produk dapat disesuaikan berdasarkan kebutuhan customer.
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        可根据客户需求定制尺寸、颜色及规格。
                    </p>
                </div>

                <div class="rounded-2xl border border-hc-line bg-hc-bg p-6">
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

        <div class="mt-12 grid grid-cols-1 gap-6 rounded-2xl border border-hc-line bg-white p-6 shadow-sm md:grid-cols-3">
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
                    WhatsApp: +62 821 1660 798<br>
                    Domain: huacheng.co.id
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
            <div class="rounded-2xl border border-hc-line bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-hc-text">Clean Board</h3>
                <p class="mt-3 text-sm leading-6 text-hc-softText">Panel dan papan bangunan untuk kebutuhan konstruksi modern.</p>
                <p class="mt-2 text-sm text-slate-500">洁净板材系统</p>
            </div>

            <div class="rounded-2xl border border-hc-line bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-hc-text">Ubin PVC & Resin</h3>
                <p class="mt-3 text-sm leading-6 text-hc-softText">Material finishing modular yang ringan, praktis, dan efisien.</p>
                <p class="mt-2 text-sm text-slate-500">PVC瓦 / 树脂瓦</p>
            </div>

            <div class="rounded-2xl border border-hc-line bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-hc-text">Portable Panel House</h3>
                <p class="mt-3 text-sm leading-6 text-hc-softText">Solusi ruang portabel untuk mess, kantor proyek, dan bangunan sementara.</p>
                <p class="mt-2 text-sm text-slate-500">活动板房</p>
            </div>

            <div class="rounded-2xl border border-hc-line bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-hc-text">Container House</h3>
                <p class="mt-3 text-sm leading-6 text-hc-softText">Rumah kontainer bongkar pasang cepat untuk kebutuhan modular.</p>
                <p class="mt-2 text-sm text-slate-500">快拼箱房</p>
            </div>
        </div>
    </div>
</section>

@include('partials.home.products')

@include('partials.home.projects')

@include('partials.home.playlists')

@include('partials.home.blogs')

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
