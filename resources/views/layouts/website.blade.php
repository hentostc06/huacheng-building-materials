<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Huacheng Building Materials' }}</title>
    <meta name="description" content="{{ $description ?? 'Huacheng Building Materials - Supplier material bangunan modular dan katalog produk untuk kebutuhan proyek.' }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        hc: {
                            primary: '#2EA7E0',
                            primaryDark: '#1B8DC2',
                            light: '#EAF7FD',
                            line: '#D8ECF8',
                            text: '#111827',
                            softText: '#4B5563',
                            bg: '#F9FCFE',
                        }
                    },
                    boxShadow: {
                        soft: '0 10px 30px rgba(46, 167, 224, 0.08)',
                    }
                }
            }
        }
    </script>

    <style>
        [x-cloak] { display:none !important; }

        .menu-link {
            color: #334155;
            position: relative;
            transition: color .2s ease;
        }

        .menu-link:hover {
            color: #2EA7E0;
        }

        .menu-link.is-active {
            color: #111827;
            font-weight: 700;
        }

        .menu-link.is-active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 100%;
            height: 2px;
            border-radius: 9999px;
            background: #2EA7E0;
        }

        .zh-title {
            line-height: 1.08;
            word-break: keep-all;
        }

        @media (max-width: 640px) {
            .zh-title {
                line-height: 1.18;
            }
        }
    
        /* Huacheng Action Button */
        .button {
  min-width: 110px;
  width: auto;
  height: 40px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  background-color: #2EA7E0;
  border-radius: 9999px;
  color: #ffffff;
  font-weight: 700;
  border: none;
  position: relative;
  cursor: pointer;
  transition-duration: .2s;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.116);
  padding-left: 14px;
  padding-right: 16px;
  transition-duration: .5s;
  text-decoration: none;
  white-space: nowrap;
}

.button.button-sm {
  min-width: 110px;
  height: 40px;
  padding-left: 14px;
  padding-right: 16px;
}

.button.button-back {
  min-width: 170px;
  height: 42px;
  padding-left: 14px;
  padding-right: 18px;
}

.button.button-back .svgIcon {
  height: 20px;
}

@media (max-width: 640px) {
  .button.button-back {
    min-width: 100%;
    width: 100%;
  }
}
            width: fit-content;
            min-width: 110px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
            background-color: #2EA7E0 !important;
            border-radius: 30px !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            border: none !important;
            position: relative;
            cursor: pointer;
            transition-duration: .2s;
            box-shadow: 5px 5px 14px rgba(46, 167, 224, 0.26);
            padding-left: 8px !important;
            padding-right: 16px !important;
            transition-duration: .5s;
            text-decoration: none !important;
            white-space: nowrap;
        }

        .button .svgIcon {
            width: 25px;
            height: 25px;
            flex: 0 0 25px;
            transition-duration: 1.5s;
        }

        .button .svgIcon path,
        .button .svgIcon circle,
        .button .svgIcon rect,
        .button .svgIcon line,
        .button .svgIcon polyline {
            stroke: #ffffff;
        }

        .button .svgIcon.fill-icon path {
            fill: #ffffff;
            stroke: none;
        }

        .button:hover {
            background-color: #1B8DC2 !important;
            box-shadow: 6px 6px 16px rgba(46, 167, 224, 0.34);
            transition-duration: .5s;
        }

        .button:active {
            transform: scale(0.97);
            transition-duration: .2s;
        }

        .button:hover .svgIcon {
            transform: rotate(250deg);
            transition-duration: 1.5s;
        }

        .button-sm {
            height: 38px;
            min-width: 105px;
            padding-right: 14px !important;
            font-size: 13px !important;
        }

    
        .floating-wa {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 9999;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            height: 48px;
            border-radius: 9999px;
            background: #2EA7E0;
            color: #ffffff;
            padding: 0 18px 0 14px;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 18px 40px rgba(46, 167, 224, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.55);
            text-decoration: none;
            transition: .25s ease;
        }

        .floating-wa:hover {
            background: #1B8DC2;
            transform: translateY(-3px);
            box-shadow: 0 22px 48px rgba(46, 167, 224, 0.45);
        }

        .floating-wa:active {
            transform: scale(.96);
        }

        .floating-wa-icon {
            width: 24px;
            height: 24px;
            flex: 0 0 24px;
        }

        .floating-wa-label {
            line-height: 1;
            white-space: nowrap;
        }

        @media (max-width: 640px) {
            .floating-wa {
                right: 16px;
                bottom: 16px;
                width: 52px;
                height: 52px;
                justify-content: center;
                padding: 0;
            }

            .floating-wa-label {
                display: none;
            }
        }

    
        html,
        body {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        img,
        svg,
        video {
            max-width: 100%;
            height: auto;
        }

        .hc-container {
            width: 100%;
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 16px;
            padding-right: 16px;
        }

        @media (min-width: 640px) {
            .hc-container {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media (min-width: 1024px) {
            .hc-container {
                padding-left: 32px;
                padding-right: 32px;
            }
        }

        .hc-section {
            padding-top: 64px;
            padding-bottom: 64px;
        }

        @media (max-width: 640px) {
            .hc-section {
                padding-top: 48px;
                padding-bottom: 48px;
            }
        }

        .hc-grid-2 {
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
        }

        @media (min-width: 1024px) {
            .hc-grid-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 64px;
            }
        }

        .hc-product-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        @media (min-width: 640px) {
            .hc-product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .hc-product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 32px;
            }
        }

        .hc-card {
            min-width: 0;
            overflow: hidden;
        }

        .hc-fluid-title {
            font-size: clamp(36px, 6vw, 72px);
            line-height: 1.04;
            letter-spacing: -0.04em;
        }

        .hc-fluid-title-zh {
            font-size: clamp(30px, 5vw, 56px);
            line-height: 1.08;
            letter-spacing: -0.03em;
            word-break: keep-all;
            overflow-wrap: break-word;
        }

        .hc-fluid-heading {
            font-size: clamp(28px, 4vw, 48px);
            line-height: 1.12;
            letter-spacing: -0.03em;
        }

        .hc-text-wrap {
            min-width: 0;
            overflow-wrap: break-word;
            word-break: normal;
        }

        .hc-image-box {
            aspect-ratio: 4 / 3;
            width: 100%;
            overflow: hidden;
        }

        @media (max-width: 640px) {
            .hc-mobile-stack {
                display: flex;
                flex-direction: column;
                align-items: stretch;
            }

            .hc-mobile-full {
                width: 100%;
            }

            .button {
                justify-content: center;
            }
        }

    
        /* Huacheng clean button: no icon, no svg, hover slide */
        .button,
        .hc-slide-button {
            position: relative !important;
            isolation: isolate !important;
            overflow: hidden !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 0 !important;
            min-height: 42px !important;
            min-width: 104px !important;
            padding: 0 22px !important;
            border-radius: 9999px !important;
            border: 1px solid rgba(46, 167, 224, 0.18) !important;
            background: #2EA7E0 !important;
            color: #ffffff !important;
            font-size: 14px !important;
            font-weight: 800 !important;
            line-height: 1 !important;
            text-decoration: none !important;
            white-space: nowrap !important;
            box-shadow: 0 12px 28px rgba(46, 167, 224, 0.22) !important;
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease, color .22s ease !important;
        }

        .button::before,
        .hc-slide-button::before {
            content: "" !important;
            position: absolute !important;
            inset: 0 !important;
            z-index: -1 !important;
            background: linear-gradient(90deg, #1B8DC2 0%, #38BDF8 100%) !important;
            transform: translateX(-102%) !important;
            transition: transform .35s ease !important;
        }

        .button:hover::before,
        .hc-slide-button:hover::before {
            transform: translateX(0) !important;
        }

        .button:hover,
        .hc-slide-button:hover {
            transform: translateY(-2px) !important;
            color: #ffffff !important;
            border-color: rgba(46, 167, 224, 0.45) !important;
            box-shadow: 0 18px 38px rgba(46, 167, 224, 0.32) !important;
        }

        .button:active,
        .hc-slide-button:active {
            transform: translateY(0) scale(.98) !important;
        }

        .button-sm {
            min-height: 40px !important;
            min-width: 96px !important;
            padding: 0 18px !important;
            font-size: 13px !important;
        }

        .button svg,
        .button .svgIcon,
        .hc-slide-button svg,
        .hc-slide-button .svgIcon {
            display: none !important;
        }

        .button span,
        .hc-slide-button span {
            position: relative !important;
            z-index: 1 !important;
        }

        @media (max-width: 640px) {
            .button,
            .hc-slide-button {
                width: auto !important;
                max-width: 100% !important;
                min-height: 42px !important;
                padding-left: 18px !important;
                padding-right: 18px !important;
                font-size: 13px !important;
            }
        }

    
        /* Huacheng uniform card media: samakan semua bingkai gambar seperti Playlist Konten */
        .hc-uniform-card-media {
            width: 100% !important;
            height: 220px !important;
            overflow: hidden !important;
            position: relative !important;
            border-bottom: 1px solid #D8ECF8 !important;
            background: #F9FCFE !important;
        }

        .hc-uniform-card-media img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            display: block !important;
        }

        .hc-uniform-card-media > div {
            width: 100% !important;
            height: 100% !important;
        }

        .hc-uniform-card {
            height: 100% !important;
            display: flex !important;
            flex-direction: column !important;
        }

        .hc-uniform-card-body {
            flex: 1 1 auto !important;
        }

        @media (max-width: 640px) {
            .hc-uniform-card-media {
                height: 190px !important;
            }
        }

    
        /* Product mobile clean view */
        .hc-product-image-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3;
            overflow: hidden;
            background:
                radial-gradient(circle at 35% 25%, rgba(46, 167, 224, .10), transparent 34%),
                linear-gradient(135deg, #f8fcff 0%, #eef8ff 100%);
        }

        .hc-product-image {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
            transition: transform .5s ease;
        }

        .hc-card:hover .hc-product-image {
            transform: scale(1.04);
        }

        @media (max-width: 640px) {
            .hc-product-grid {
                gap: 18px !important;
            }

            .hc-product-image-wrap {
                aspect-ratio: 16 / 10;
                border-bottom: 1px solid #D8ECF8;
            }

            .hc-product-image {
                object-fit: cover;
                object-position: center;
                padding: 0;
                background: #f8fcff;
            }

            .hc-card {
                border-radius: 24px !important;
            }

            .hc-mobile-full {
                width: 100% !important;
            }

            .hc-mobile-full.button,
            button.hc-mobile-full {
                justify-content: center !important;
            }
        }

    
        @media (max-width: 640px) {
            .hc-product-image-wrap {
                aspect-ratio: 16 / 10 !important;
                overflow: hidden !important;
                background: #f8fcff !important;
            }

            .hc-product-image-wrap .hc-product-image {
                width: 100% !important;
                height: 100% !important;
                object-fit: cover !important;
                object-position: center !important;
                padding: 0 !important;
                margin: 0 !important;
            }
        }

    
        /* MOBILE HERO RESPONSIVE ONLY - HUACHENG */
        @media (max-width: 640px) {
            html,
            body {
                overflow-x: hidden !important;
            }

            #hero {
                min-height: 620px !important;
                max-width: 100vw !important;
                overflow: hidden !important;
            }

            #hero .hc-container {
                min-height: 620px !important;
                width: 100% !important;
                max-width: 100% !important;
                padding-top: 48px !important;
                padding-bottom: 74px !important;
                padding-left: 18px !important;
                padding-right: 18px !important;
                align-items: flex-start !important;
                justify-content: center !important;
            }

            #hero .hc-container > div {
                width: 100% !important;
                max-width: 100% !important;
                padding-top: 20px !important;
            }

            #hero .absolute.inset-0.-z-20 img {
                object-position: center center !important;
            }

            #hero .absolute.inset-0.-z-10.bg-gradient-to-r {
                background: linear-gradient(
                    to right,
                    rgba(255, 255, 255, .94) 0%,
                    rgba(255, 255, 255, .82) 54%,
                    rgba(255, 255, 255, .34) 100%
                ) !important;
            }

            #hero .absolute.inset-0.-z-10.bg-gradient-to-b {
                background: linear-gradient(
                    to bottom,
                    rgba(255, 255, 255, .12) 0%,
                    rgba(255, 255, 255, .18) 48%,
                    rgba(255, 255, 255, .96) 100%
                ) !important;
            }

            #hero .inline-flex.max-w-full {
                max-width: calc(100vw - 36px) !important;
                padding: 7px 12px !important;
                font-size: 10px !important;
                line-height: 1.2 !important;
            }

            #hero h1 {
                margin-top: 22px !important;
                max-width: 92vw !important;
                font-size: 34px !important;
                line-height: 1.08 !important;
                letter-spacing: -0.045em !important;
            }

            #hero h2 {
                margin-top: 16px !important;
                max-width: 92vw !important;
                font-size: 20px !important;
                line-height: 1.25 !important;
            }

            #hero p {
                max-width: 92vw !important;
                font-size: 13.5px !important;
                line-height: 1.75 !important;
            }

            #hero .mt-6 {
                margin-top: 16px !important;
            }

            #hero .mt-9 {
                margin-top: 24px !important;
            }

            #hero a[data-hc-button-ready="1"] {
                width: 100% !important;
                max-width: 100% !important;
                height: 44px !important;
                min-height: 44px !important;
                font-size: 12.5px !important;
                border-radius: 999px !important;
            }
        }

        @media (max-width: 380px) {
            #hero h1 {
                font-size: 30px !important;
                line-height: 1.1 !important;
            }

            #hero h2 {
                font-size: 18px !important;
            }

            #hero p {
                font-size: 13px !important;
                line-height: 1.7 !important;
            }

            #hero .hc-container {
                padding-left: 16px !important;
                padding-right: 16px !important;
            }
        }
        /* END MOBILE HERO RESPONSIVE ONLY - HUACHENG */

    
        /* SMART HEADER ALL DEVICES - HUACHENG */
        body.hc-smart-header-ready {
            padding-top: var(--hc-header-height, 78px) !important;
        }

        .hc-smart-header {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 99990 !important;
            width: 100% !important;
            transform: translateY(0) !important;
            transition:
                transform .28s ease,
                box-shadow .28s ease,
                background-color .28s ease,
                backdrop-filter .28s ease !important;
            will-change: transform !important;
            background: rgba(255, 255, 255, .94) !important;
            backdrop-filter: blur(18px) !important;
            box-shadow: 0 10px 28px rgba(15, 23, 42, .08) !important;
        }

        .hc-smart-header.is-hidden {
            transform: translateY(-105%) !important;
            box-shadow: none !important;
        }

        .hc-smart-header.is-visible {
            transform: translateY(0) !important;
        }

        @media (max-width: 768px) {
            body.hc-smart-header-ready {
                padding-top: var(--hc-header-height, 72px) !important;
            }

            .hc-smart-header {
                background: rgba(255, 255, 255, .96) !important;
            }
        }
        /* END SMART HEADER ALL DEVICES - HUACHENG */

    </style>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('[data-nav]');
            const sections = ['tentang', 'layanan'];

            function setActive(target) {
                links.forEach(link => {
                    link.classList.remove('is-active');

                    if (link.dataset.nav === target) {
                        link.classList.add('is-active');
                    }
                });
            }

            function updateActiveFromLocation() {
                const path = window.location.pathname;
                const hash = window.location.hash.replace('#', '');

                if (path.startsWith('/produk')) {
                    setActive('produk');
                    return;
                }

                if (path.startsWith('/kontak')) {
                    setActive('kontak');
                    return;
                }

                if (hash === 'tentang') {
                    setActive('tentang');
                    return;
                }

                if (hash === 'layanan') {
                    setActive('layanan');
                    return;
                }

                setActive('beranda');
            }

            function updateActiveFromScroll() {
                if (window.location.pathname !== '/') {
                    return;
                }

                let current = '';

                sections.forEach(sectionId => {
                    const section = document.getElementById(sectionId);

                    if (!section) {
                        return;
                    }

                    const rect = section.getBoundingClientRect();

                    if (rect.top <= 130 && rect.bottom >= 130) {
                        current = sectionId;
                    }
                });

                if (current) {
                    setActive(current);
                } else if (window.scrollY < 260) {
                    setActive('beranda');
                }
            }

            updateActiveFromLocation();

            window.addEventListener('hashchange', updateActiveFromLocation);
            window.addEventListener('scroll', updateActiveFromScroll, { passive: true });

            links.forEach(link => {
                link.addEventListener('click', function () {
                    const target = this.dataset.nav;

                    setTimeout(() => {
                        setActive(target);
                    }, 50);
                });
            });
        });
    </script>
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}?v=2">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttonLabels = [
                'Detail',
                'Lihat Detail',
                'Lihat Produk',
                'Hubungi Sales',
                'Hubungi WhatsApp',
                'Buka Halaman Produk',
                'Filter',
                'Tanya Produk via WhatsApp',
                'Kontak Sales',
                'Chat WhatsApp',
                'Simpan',
                'Save',
                'Submit'
            ];

            document.querySelectorAll('a, button').forEach(function (element) {
                if (element.closest('.floating-wa')) {
                    return;
                }

                const rawText = element.textContent.trim().replace(/\s+/g, ' ');
                const cleanText = rawText.replace(/[→›»]/g, '').trim();

                if (!buttonLabels.includes(cleanText)) {
                    return;
                }

                element.querySelectorAll('svg, .svgIcon').forEach(function (icon) {
                    icon.remove();
                });

                element.innerHTML = '<span>' + cleanText + '</span>';
                element.classList.add('hc-slide-button');
                element.dataset.hcButtonReady = '1';
            });
        });
    </script>

</head>
<body class="bg-white text-hc-text antialiased">
    @include('partials.huacheng-loader')
    <div class="min-h-screen">
        <header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-hc-line bg-white/95 backdrop-blur">
            <div class="hc-container flex items-center justify-between py-4">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/huacheng-logo.png') }}" alt="Huacheng Building Materials" class="h-11 w-auto md:h-14">
                </a>

                <nav class="hidden items-center gap-8 lg:flex">
                    <a href="{{ route('home') }}" data-nav="beranda" class="menu-link text-sm font-semibold">
                        Beranda
                    </a>

                    <a href="{{ route('products.index') }}" data-nav="produk" class="menu-link text-sm font-semibold">
                        Produk
                    </a>

                    <a href="{{ route('home') }}#tentang" data-nav="tentang" class="menu-link text-sm font-semibold">
                        Tentang
                    </a>

                    <a href="{{ route('home') }}#layanan" data-nav="layanan" class="menu-link text-sm font-semibold">
                        Layanan
                    </a>

                    <a href="{{ route('contact') }}" data-nav="kontak" class="menu-link text-sm font-semibold">
                        Kontak
                    </a>
                </nav>

                <div class="hidden items-center gap-3 lg:flex">
                </div>

                <button type="button" @click="open = !open" class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-hc-line text-slate-700 lg:hidden">
                    <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/></svg>
                    <svg x-cloak x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div x-cloak x-show="open" x-transition class="border-t border-hc-line bg-white px-4 pb-5 lg:hidden">
                <div class="hc-container flex flex-col gap-2 pt-3">
                    <a href="{{ route('home') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-hc-light">Beranda</a>
                    <a href="{{ route('products.index') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-hc-light">Produk</a>
                    <a href="{{ route('home') }}#tentang" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-hc-light">Tentang</a>
                    <a href="{{ route('home') }}#layanan" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-hc-light">Layanan</a>
                    <a href="{{ route('contact') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-hc-light">Kontak</a>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="mt-16 border-t border-hc-line bg-hc-bg">
            <div class="hc-container grid gap-8 py-12 sm:grid-cols-2 lg:grid-cols-4">
                <div class="lg:col-span-2">
                    <img src="{{ asset('images/huacheng-logo.png') }}" alt="Huacheng Building Materials" class="h-14 w-auto">
                    <p class="mt-5 max-w-xl text-sm leading-7 text-hc-softText">
                        <span class="font-semibold text-hc-text">Indonesia Huacheng Building Materials Co., Ltd</span><br>
                        <span class="text-slate-500">印尼华诚建材有限公司</span><br>
                        Supplier material bangunan modular, clean board, ubin PVC, ubin resin, rumah panel portabel, dan rumah kontainer bongkar pasang cepat.
                    </p>
                </div>

                <div>
                    <p class="font-bold text-hc-text">Menu</p>
                    <div class="mt-4 space-y-3 text-sm text-hc-softText">
                        <p><a href="{{ route('home') }}" class="hover:text-hc-primary">Beranda</a></p>
                        <p><a href="{{ route('products.index') }}" class="hover:text-hc-primary">Produk</a></p>
                        <p><a href="{{ route('contact') }}" class="hover:text-hc-primary">Kontak</a></p>
                        <p><a href="/admin" class="hover:text-hc-primary">Admin Panel</a></p>
                    </div>
                </div>

                <div>
                    <p class="font-bold text-hc-text">Kontak</p>
                    <div class="mt-4 space-y-3 text-sm text-hc-softText">
                        <p>General Manager: Chen Xiao Li</p>
                        <p>陈萧丽</p>
                        <p>Telepon: 135 7551 4666</p>
                        <p>WhatsApp: +62 821 1660 798</p>
                        <p>Domain: huacheng.co.id</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-hc-line px-4 py-6 text-center text-xs text-slate-500">
                © {{ date('Y') }} Huacheng Building Materials. All rights reserved.
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (document.getElementById('floating-whatsapp-button')) {
                return;
            }

            const phoneNumber = '628211660798';
            const message = 'Halo, apakah boleh menanyakan soal produk-produknya?';
            const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            const button = document.createElement('a');
            button.id = 'floating-whatsapp-button';
            button.className = 'floating-wa';
            button.href = url;
            button.target = '_blank';
            button.rel = 'noopener noreferrer';
            button.setAttribute('aria-label', 'Chat WhatsApp Huacheng Building Materials');

            button.innerHTML = `
                <svg class="floating-wa-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M7.5 19.5 4 20.5l1-3.4A8 8 0 1 1 7.5 19.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 8.5c.3 3.4 2.1 5.4 5.5 6 .5.1 1-.2 1.2-.7l.4-.9c.2-.5 0-1-.5-1.2l-1.2-.5c-.4-.2-.9-.1-1.2.3l-.3.4c-.9-.4-1.6-1.1-2-2l.4-.3c.4-.3.5-.8.3-1.2l-.5-1.2c-.2-.5-.8-.7-1.2-.5l-.9.4c-.6.2-.9.7-.8 1.3Z" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="floating-wa-label">WhatsApp</span>
            `;

            document.body.appendChild(button);
        });
    </script>




<!-- SMART HEADER SCRIPT - HUACHENG -->
<script>
    (function () {
        let lastScrollY = window.scrollY || 0;
        let ticking = false;
        let header = null;

        function findHeader() {
            return document.querySelector('header')
                || document.querySelector('.site-header')
                || document.querySelector('.hc-header')
                || document.querySelector('nav');
        }

        function setHeaderHeight() {
            if (!header) {
                return;
            }

            const height = header.offsetHeight || 78;
            document.documentElement.style.setProperty('--hc-header-height', height + 'px');
        }

        function showHeader() {
            if (!header) {
                return;
            }

            header.classList.remove('is-hidden');
            header.classList.add('is-visible');
        }

        function hideHeader() {
            if (!header) {
                return;
            }

            header.classList.remove('is-visible');
            header.classList.add('is-hidden');
        }

        function setupSmartHeader() {
            header = findHeader();

            if (!header) {
                return;
            }

            header.classList.add('hc-smart-header');
            document.body.classList.add('hc-smart-header-ready');

            setHeaderHeight();
            showHeader();
        }

        function handleScroll() {
            if (!header) {
                ticking = false;
                return;
            }

            const currentScrollY = window.scrollY || 0;
            const diff = currentScrollY - lastScrollY;

            if (currentScrollY <= 20) {
                showHeader();
                lastScrollY = currentScrollY;
                ticking = false;
                return;
            }

            if (diff > 8) {
                hideHeader();
            }

            if (diff < -4) {
                showHeader();
            }

            lastScrollY = currentScrollY;
            ticking = false;
        }

        function requestScrollUpdate() {
            if (!ticking) {
                window.requestAnimationFrame(handleScroll);
                ticking = true;
            }
        }

        document.addEventListener('DOMContentLoaded', setupSmartHeader);
        window.addEventListener('resize', setupSmartHeader);
        window.addEventListener('orientationchange', setupSmartHeader);
        window.addEventListener('scroll', requestScrollUpdate, { passive: true });

        document.addEventListener('livewire:navigated', function () {
            setupSmartHeader();
            showHeader();
        });

        setTimeout(setupSmartHeader, 300);
        setTimeout(setupSmartHeader, 900);
    })();
</script>
<!-- END SMART HEADER SCRIPT - HUACHENG -->

</body>
</html>
