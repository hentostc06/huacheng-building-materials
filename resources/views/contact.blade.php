@extends('layouts.website', ['title' => 'Kontak - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Kontak / 联系方式</p>
        <h1 class="mt-4 text-4xl font-bold tracking-tight text-hc-text sm:text-5xl">Hubungi Huacheng</h1>
        <p class="mt-5 max-w-2xl text-hc-softText">
            Untuk permintaan penawaran, katalog produk, dan konsultasi proyek.<br>
            如需产品咨询、报价或项目合作，请联系我们。
        </p>
    </div>
</section>

<section class="py-16">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-3 lg:px-8">
        <div class="rounded-3xl border border-hc-line bg-white p-8 shadow-sm">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-hc-primary">General Manager</p>
            <h2 class="mt-3 text-2xl font-bold text-hc-text">Chen Xiao Li / 陈萧丽</h2>
            <p class="mt-3 text-hc-softText">Indonesia Huacheng Building Materials Co., Ltd</p>
        </div>

        <div class="rounded-3xl border border-hc-line bg-white p-8 shadow-sm">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-hc-primary">Phone</p>
            <h2 class="mt-3 text-2xl font-bold text-hc-text">135 7551 4666</h2>
            <p class="mt-3 text-hc-softText">Telepon perusahaan / 公司电话</p>
        </div>

        <div class="rounded-3xl border border-hc-line bg-white p-8 shadow-sm">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-hc-primary">WhatsApp</p>
            <h2 class="mt-3 text-2xl font-bold text-hc-text">+62 821 1660 7988</h2>
            <a href="https://wa.me/628211660798?text={{ urlencode('Halo, apakah boleh menanyakan soal produk-produknya?') }}" class="mt-5 inline-flex rounded-full bg-hc-primary px-6 py-3 text-sm font-bold text-white transition hover:bg-hc-primaryDark">
                Chat WhatsApp
            </a>
        </div>
    </div>
</section>

<section class="bg-hc-bg py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2rem] border border-hc-line bg-white p-8 sm:p-10 lg:p-12">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Business Scope / 经营范围</p>
            <h2 class="mt-4 text-3xl font-bold text-hc-text">Ruang Lingkup Produk</h2>
            <p class="mt-5 max-w-4xl leading-8 text-hc-softText">
                Clean board, aksesoris, ubin baja warna, ubin resin, ubin PVC, rumah panel portabel, dan rumah kontainer bongkar pasang cepat.<br>
                洁净板、配件、彩钢瓦、树脂瓦、PVC瓦、活动板房、快拼箱房。
            </p>
        </div>
    </div>
</section>
@endsection
