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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const iconMap = {
                produk: `
                    <svg class="svgIcon" viewBox="0 0 24 24" fill="none">
                        <path d="M4 7.5 12 3l8 4.5-8 4.5L4 7.5Z" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M4 12.5 12 17l8-4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 17.5 12 22l8-4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                `,
                sales: `
                    <svg class="svgIcon" viewBox="0 0 24 24" fill="none">
                        <path d="M7 8h10M7 12h7M5 20l3-3h9a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                `,
                whatsapp: `
                    <svg class="svgIcon" viewBox="0 0 24 24" fill="none">
                        <path d="M7.5 19.5 4 20.5l1-3.4A8 8 0 1 1 7.5 19.5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 8.5c.3 3.4 2.1 5.4 5.5 6 .5.1 1-.2 1.2-.7l.4-.9c.2-.5 0-1-.5-1.2l-1.2-.5c-.4-.2-.9-.1-1.2.3l-.3.4c-.9-.4-1.6-1.1-2-2l.4-.3c.4-.3.5-.8.3-1.2l-.5-1.2c-.2-.5-.8-.7-1.2-.5l-.9.4c-.6.2-.9.7-.8 1.3Z" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                `,
                filter: `
                    <svg class="svgIcon" viewBox="0 0 24 24" fill="none">
                        <path d="M4 5h16l-6 7v5l-4 2v-7L4 5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                `,
                detail: `
                    <svg class="svgIcon" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14" stroke-width="2" stroke-linecap="round"/>
                        <path d="m13 6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                `,
                admin: `
                    <svg class="svgIcon" viewBox="0 0 24 24" fill="none">
                        <path d="M7 10V8a5 5 0 0 1 10 0v2" stroke-width="2" stroke-linecap="round"/>
                        <rect x="5" y="10" width="14" height="10" rx="2" stroke-width="2"/>
                        <path d="M12 14v2" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                `
            };

            function pickIcon(label) {
                const text = label.toLowerCase();

                if (text.includes('admin')) return iconMap.admin;
                if (text.includes('filter')) return iconMap.filter;
                if (text.includes('whatsapp') || text.includes('chat')) return iconMap.whatsapp;
                if (text.includes('sales') || text.includes('kontak') || text.includes('hubungi')) return iconMap.sales;
                if (text.includes('detail')) return iconMap.detail;
                if (text.includes('produk')) return iconMap.produk;

                return iconMap.detail;
            }

            function cleanLabel(label) {
                return label.replace('→', '').trim();
            }

            const buttonTexts = [
                'Lihat Produk',
                'Hubungi Sales',
                'Hubungi WhatsApp',
                'WhatsApp',
                'Buka Halaman Produk',
                'Filter',
                'Tanya Produk via WhatsApp',
                'Kontak Sales',
                'Chat WhatsApp',
                'Lihat Detail'
            ];

            document.querySelectorAll('a, button').forEach(function (element) {
                const rawText = element.textContent.trim().replace(/\s+/g, ' ');
                const matched = buttonTexts.some(function (buttonText) {
                    return rawText === buttonText;
                });

                if (!matched) {
                    return;
                }

                if (element.dataset.hcButtonReady === '1') {
                    return;
                }

                const label = cleanLabel(rawText);

                element.classList.add('button');

                if (label.length <= 8) {
                    element.classList.add('button-sm');
                }

                element.innerHTML = pickIcon(label) + `<span>${label}</span>`;
                element.dataset.hcButtonReady = '1';
            });

            document.querySelectorAll('span').forEach(function (element) {
                const rawText = element.textContent.trim().replace(/\s+/g, ' ');

                if (rawText !== 'Lihat Detail →' && rawText !== 'Lihat Detail') {
                    return;
                }

                if (element.dataset.hcButtonReady === '1') {
                    return;
                }

                element.classList.add('button', 'button-sm');
                element.innerHTML = iconMap.detail + '<span>Lihat Detail</span>';
                element.dataset.hcButtonReady = '1';
            });
        });
    </script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}?v=2">
</head>
<body class="bg-white text-hc-text antialiased">
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
                        <p>WhatsApp: 08211660798</p>
                        <p>Domain: huacheng.modular.co.id</p>
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

</body>
</html>
