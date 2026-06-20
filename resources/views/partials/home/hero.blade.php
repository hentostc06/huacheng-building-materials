@php
    $slides = $heroSlides ?? collect();
@endphp

<section
    id="hero"
    class="relative isolate min-h-[720px] overflow-hidden bg-white"
    x-data="{
        active: 0,
        total: {{ max($slides->count(), 1) }},
        next() {
            this.active = (this.active + 1) % this.total;
        },
        init() {
            if (this.total > 1) {
                setInterval(() => this.next(), 6000);
            }
        }
    }"
>
    {{-- BACKGROUND CAROUSEL --}}
    <div class="absolute inset-0 -z-20">
        @if($slides->isNotEmpty())
            @foreach($slides as $slide)
                <div
                    x-show="active === {{ $loop->index }}"
                    x-transition.opacity.duration.700ms
                    class="absolute inset-0"
                >
                    <img
                        src="{{ $slide->image_url }}"
                        alt="Huacheng Building Materials"
                        class="h-full w-full object-cover brightness-[1.02] contrast-[1.04] saturate-[1.08]"
                    >
                </div>
            @endforeach
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-sky-100 via-white to-slate-100"></div>
        @endif
    </div>

    {{-- OVERLAY: KIRI TETAP AMAN UNTUK TEKS, KANAN LEBIH JELAS --}}
    <div
        class="absolute inset-0 -z-10"
        style="background: linear-gradient(90deg, rgba(255,255,255,.94) 0%, rgba(255,255,255,.86) 36%, rgba(255,255,255,.50) 55%, rgba(255,255,255,.12) 76%, rgba(255,255,255,0) 100%);"
    ></div>

    {{-- OVERLAY KANAN DIBUAT SANGAT TIPIS AGAR GAMBAR TERLIHAT --}}
    <div class="absolute inset-y-0 right-0 -z-10 w-[55%] bg-white/5"></div>

    {{-- FADE BAWAH HANYA DI BAGIAN BAWAH, BUKAN MENUTUP SELURUH HERO --}}
    <div
        class="absolute inset-x-0 bottom-0 -z-10 h-44"
        style="background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(255,255,255,.88) 100%);"
    ></div>

    <div class="hc-container relative flex min-h-[720px] items-center py-24">
        <div class="max-w-3xl">
            <div class="inline-flex max-w-full items-center rounded-full border border-sky-100 bg-white/90 px-4 py-2 text-xs text-slate-700 shadow-sm backdrop-blur sm:text-sm">
                <span class="mr-2 h-2.5 w-2.5 shrink-0 rounded-full bg-hc-primary"></span>
                <span class="truncate">
                    Indonesia Huacheng Building Materials Co., Ltd / 印尼华诚建材有限公司
                </span>
            </div>

            <h1 class="mt-7 max-w-3xl text-5xl font-black leading-[1.03] tracking-tight text-hc-text sm:text-6xl lg:text-7xl">
                Solusi Material Bangunan Modular
            </h1>

            <h2 class="mt-5 text-2xl font-black leading-snug text-hc-primary sm:text-3xl lg:text-4xl">
                高效模块化建材解决方案
            </h2>

            <p class="mt-6 max-w-2xl text-base leading-8 text-slate-700 sm:text-lg">
                Huacheng Building Materials menyediakan berbagai kebutuhan material bangunan modular untuk proyek konstruksi modern, fasilitas portabel, dan rumah kontainer.
            </p>

            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a
                    href="{{ route('products.index') }}"
                    data-hc-button-ready="1"
                    class="inline-flex h-12 items-center justify-center rounded-full bg-hc-primary px-7 text-sm font-bold text-white shadow-soft transition hover:bg-hc-primaryDark"
                >
                    Lihat Produk
                </a>

                <a
                    href="{{ route('contact') }}"
                    data-hc-button-ready="1"
                    class="inline-flex h-12 items-center justify-center rounded-full border border-sky-100 bg-white/90 px-7 text-sm font-bold text-hc-text shadow-sm backdrop-blur transition hover:border-hc-primary hover:text-hc-primary"
                >
                    Hubungi Sales
                </a>
            </div>
        </div>
    </div>
</section>
