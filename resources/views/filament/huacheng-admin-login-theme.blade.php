@if (request()->is('admin/login'))
<script>
    document.documentElement.classList.add('hc-admin-login-page');
</script>

<style>
    html.hc-admin-login-page,
    html.hc-admin-login-page body {
        min-height: 100vh !important;
        overflow-x: hidden !important;
        background:
            radial-gradient(circle at 18% 18%, rgba(46, 167, 224, 0.18), transparent 32%),
            radial-gradient(circle at 82% 82%, rgba(46, 167, 224, 0.14), transparent 30%),
            linear-gradient(135deg, #040b17 0%, #071427 46%, #040b17 100%) !important;
    }

    html.hc-admin-login-page body::before {
        content: "";
        position: fixed;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.035) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.035) 1px, transparent 1px);
        background-size: 38px 38px;
        mask-image: linear-gradient(to bottom, rgba(0, 0, 0, .95), rgba(0, 0, 0, .25));
    }

    html.hc-admin-login-page .fi-simple-layout,
    html.hc-admin-login-page .fi-simple-page,
    html.hc-admin-login-page .fi-simple-main-ctn {
        position: relative !important;
        z-index: 1 !important;
        background: transparent !important;
    }

    html.hc-admin-login-page .fi-simple-main {
        width: min(1180px, calc(100vw - 40px)) !important;
        max-width: 1180px !important;
        padding: 0 !important;
        background: transparent !important;
        box-shadow: none !important;
        border: 0 !important;
        overflow: visible !important;
    }

    html.hc-admin-login-page .hc-login-shell {
        position: relative !important;
        display: grid !important;
        grid-template-columns: minmax(360px, 1.08fr) minmax(400px, .92fr) !important;
        min-height: 620px !important;
        border-radius: 32px !important;
        overflow: hidden !important;
        border: 1px solid rgba(46, 167, 224, 0.16) !important;
        background: rgba(7, 15, 30, 0.82) !important;
        box-shadow:
            0 30px 90px rgba(0, 0, 0, 0.42),
            0 0 0 1px rgba(255, 255, 255, 0.04) inset !important;
        backdrop-filter: blur(16px) !important;
    }

    html.hc-admin-login-page .hc-login-hero {
        position: relative !important;
        overflow: hidden !important;
        display: flex !important;
        align-items: flex-end !important;
        padding: 44px !important;
        background:
            linear-gradient(180deg, rgba(46, 167, 224, 0.08), rgba(46, 167, 224, 0.04)),
            linear-gradient(145deg, #071629 0%, #0b3455 52%, #081525 100%) !important;
        isolation: isolate !important;
    }

    html.hc-admin-login-page .hc-login-hero::before {
        content: "" !important;
        position: absolute !important;
        inset: 0 !important;
        z-index: 0 !important;
        background:
            radial-gradient(circle at center, rgba(255, 255, 255, 0.03), transparent 55%),
            url('{{ asset('images/Logo.png') }}') center center / 82% no-repeat !important;
        opacity: 0.14 !important;
        filter: grayscale(1) brightness(1.15) contrast(1.05) !important;
        transform: scale(1.05) !important;
    }

    html.hc-admin-login-page .hc-login-hero::after {
        content: "" !important;
        position: absolute !important;
        inset: 0 !important;
        z-index: 1 !important;
        background:
            linear-gradient(180deg, rgba(7, 22, 41, 0.04) 0%, rgba(7, 22, 41, 0.18) 100%);
        pointer-events: none !important;
    }

    html.hc-admin-login-page .hc-login-hero-content {
        position: relative !important;
        z-index: 2 !important;
        width: 100% !important;
        max-width: 380px !important;
    }

    html.hc-admin-login-page .hc-login-hero-kicker {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        margin-bottom: 18px !important;
        padding: 8px 14px !important;
        border-radius: 999px !important;
        border: 1px solid rgba(255, 255, 255, 0.12) !important;
        background: rgba(255, 255, 255, 0.08) !important;
        color: rgba(255, 255, 255, 0.84) !important;
        font-size: 12px !important;
        font-weight: 800 !important;
        letter-spacing: 0.14em !important;
        text-transform: uppercase !important;
        backdrop-filter: blur(12px) !important;
    }

    html.hc-admin-login-page .hc-login-hero-kicker-dot {
        width: 8px !important;
        height: 8px !important;
        border-radius: 999px !important;
        background: #2EA7E0 !important;
        box-shadow: 0 0 0 6px rgba(46, 167, 224, 0.12) !important;
    }

    html.hc-admin-login-page .hc-login-hero-title {
        margin: 0 !important;
        color: #ffffff !important;
        font-size: 54px !important;
        line-height: 0.95 !important;
        font-weight: 950 !important;
        letter-spacing: -0.05em !important;
        text-wrap: balance !important;
    }

    html.hc-admin-login-page .hc-login-hero-cn {
        margin-top: 14px !important;
        color: #2EA7E0 !important;
        font-size: 34px !important;
        line-height: 1 !important;
        font-weight: 950 !important;
        letter-spacing: 0.10em !important;
        text-shadow: 0 0 18px rgba(46, 167, 224, 0.18) !important;
    }

    html.hc-admin-login-page .hc-login-hero-subtitle {
        margin-top: 18px !important;
        color: rgba(255, 255, 255, 0.74) !important;
        font-size: 15px !important;
        line-height: 1.7 !important;
        max-width: 330px !important;
    }

    html.hc-admin-login-page .hc-login-panel {
        position: relative !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 36px !important;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(247, 250, 252, 0.96)) !important;
        overflow: hidden !important;
    }

    html.hc-admin-login-page .hc-login-panel::before {
        content: "" !important;
        position: absolute !important;
        right: -36px !important;
        top: 50% !important;
        width: 260px !important;
        height: 260px !important;
        transform: translateY(-50%) !important;
        background:
            url('{{ asset('images/Logo.png') }}') center center / 78% no-repeat !important;
        opacity: 0.06 !important;
        filter: grayscale(1) brightness(.6) !important;
        pointer-events: none !important;
    }

    html.hc-admin-login-page .hc-login-panel-inner {
        position: relative !important;
        z-index: 2 !important;
        width: 100% !important;
        max-width: 420px !important;
    }

    html.hc-admin-login-page .fi-logo,
    html.hc-admin-login-page .fi-simple-header > a,
    html.hc-admin-login-page .fi-simple-header .fi-icon-btn,
    html.hc-admin-login-page .hc-admin-desktop-badge,
    html.hc-admin-login-page .hc-admin-mobile-brand,
    html.hc-admin-login-page .hc-topbar-desktop-badge,
    html.hc-admin-login-page .hc-topbar-mobile-brand,
    html.hc-admin-login-page .hc-admin-topbar-right,
    html.hc-admin-login-page .hc-admin-topbar-pill,
    html.hc-admin-login-page .hc-admin-topbar-status {
        display: none !important;
    }

    html.hc-admin-login-page .hc-login-panel-brand {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        gap: 10px !important;
        margin-bottom: 22px !important;
        text-align: center !important;
    }

    html.hc-admin-login-page .hc-login-panel-brand-logo {
        width: 74px !important;
        height: 74px !important;
        padding: 10px !important;
        border-radius: 24px !important;
        object-fit: contain !important;
        background: #ffffff !important;
        border: 1px solid rgba(46, 167, 224, 0.18) !important;
        box-shadow:
            0 16px 34px rgba(46, 167, 224, 0.15),
            0 0 0 6px rgba(46, 167, 224, 0.06) !important;
    }

    html.hc-admin-login-page .hc-login-panel-brand-name {
        color: #0f172a !important;
        font-size: 20px !important;
        font-weight: 950 !important;
        line-height: 1 !important;
        letter-spacing: -0.03em !important;
    }

    html.hc-admin-login-page .hc-login-panel-brand-cn {
        margin-top: 4px !important;
        color: #2EA7E0 !important;
        font-size: 21px !important;
        font-weight: 950 !important;
        line-height: 1 !important;
        letter-spacing: .08em !important;
    }

    html.hc-admin-login-page .hc-login-panel-brand-small {
        margin-top: 4px !important;
        color: #64748b !important;
        font-size: 10px !important;
        font-weight: 900 !important;
        line-height: 1 !important;
        letter-spacing: .16em !important;
        text-transform: uppercase !important;
    }

    html.hc-admin-login-page .fi-simple-header-heading,
    html.hc-admin-login-page .fi-simple-main h1 {
        color: #0f172a !important;
        font-size: 30px !important;
        line-height: 1.05 !important;
        font-weight: 950 !important;
        letter-spacing: -0.04em !important;
        text-align: center !important;
        margin-bottom: 26px !important;
    }

    html.hc-admin-login-page label {
        color: #334155 !important;
        font-size: 13px !important;
        font-weight: 800 !important;
    }

    html.hc-admin-login-page input {
        min-height: 52px !important;
        border-radius: 16px !important;
        border-color: rgba(148, 163, 184, 0.34) !important;
        background: #f8fafc !important;
        color: #0f172a !important;
        box-shadow: none !important;
        transition:
            border-color .22s ease,
            box-shadow .22s ease,
            background-color .22s ease !important;
    }

    html.hc-admin-login-page input:focus {
        background: #ffffff !important;
        border-color: #2EA7E0 !important;
        box-shadow: 0 0 0 4px rgba(46, 167, 224, 0.14) !important;
    }

    html.hc-admin-login-page button[type="submit"],
    html.hc-admin-login-page .fi-btn {
        min-height: 52px !important;
        border-radius: 999px !important;
        background: #2EA7E0 !important;
        color: #ffffff !important;
        font-weight: 900 !important;
        box-shadow: 0 18px 38px rgba(46, 167, 224, 0.28) !important;
        transition:
            transform .22s ease,
            box-shadow .22s ease,
            background-color .22s ease !important;
    }

    html.hc-admin-login-page button[type="submit"]:hover,
    html.hc-admin-login-page .fi-btn:hover {
        transform: translateY(-2px) !important;
        background: #1d96cf !important;
        box-shadow: 0 22px 46px rgba(46, 167, 224, 0.32) !important;
    }

    html.hc-admin-login-page a {
        color: #2EA7E0 !important;
        font-weight: 800 !important;
    }

    html.hc-admin-login-page .fi-checkbox-input {
        border-radius: 8px !important;
    }

    @media (max-width: 980px) {
        html.hc-admin-login-page .fi-simple-main {
            width: min(720px, calc(100vw - 24px)) !important;
        }

        html.hc-admin-login-page .hc-login-shell {
            grid-template-columns: 1fr !important;
            min-height: auto !important;
        }

        html.hc-admin-login-page .hc-login-hero {
            min-height: 250px !important;
            padding: 28px !important;
            align-items: flex-end !important;
        }

        html.hc-admin-login-page .hc-login-hero::before {
            background-size: 58% !important;
            opacity: 0.12 !important;
        }

        html.hc-admin-login-page .hc-login-hero-title {
            font-size: 40px !important;
        }

        html.hc-admin-login-page .hc-login-hero-cn {
            font-size: 28px !important;
        }

        html.hc-admin-login-page .hc-login-panel {
            padding: 28px !important;
        }
    }

    @media (max-width: 640px) {
        html.hc-admin-login-page .fi-simple-main {
            width: calc(100vw - 16px) !important;
        }

        html.hc-admin-login-page .hc-login-shell {
            border-radius: 26px !important;
        }

        html.hc-admin-login-page .hc-login-hero {
            min-height: 220px !important;
            padding: 24px 22px !important;
        }

        html.hc-admin-login-page .hc-login-hero::before {
            background-size: 62% !important;
            opacity: 0.10 !important;
        }

        html.hc-admin-login-page .hc-login-hero-kicker {
            font-size: 10px !important;
            padding: 7px 12px !important;
            margin-bottom: 14px !important;
        }

        html.hc-admin-login-page .hc-login-hero-title {
            font-size: 32px !important;
        }

        html.hc-admin-login-page .hc-login-hero-cn {
            font-size: 24px !important;
        }

        html.hc-admin-login-page .hc-login-hero-subtitle {
            font-size: 13px !important;
            line-height: 1.6 !important;
            margin-top: 14px !important;
        }

        html.hc-admin-login-page .hc-login-panel {
            padding: 22px 18px !important;
        }

        html.hc-admin-login-page .hc-login-panel-brand-logo {
            width: 64px !important;
            height: 64px !important;
            border-radius: 20px !important;
        }

        html.hc-admin-login-page .hc-login-panel-brand-name {
            font-size: 18px !important;
        }

        html.hc-admin-login-page .hc-login-panel-brand-cn {
            font-size: 19px !important;
        }

        html.hc-admin-login-page .fi-simple-header-heading,
        html.hc-admin-login-page .fi-simple-main h1 {
            font-size: 24px !important;
            margin-bottom: 22px !important;
        }

        html.hc-admin-login-page input,
        html.hc-admin-login-page button[type="submit"],
        html.hc-admin-login-page .fi-btn {
            min-height: 48px !important;
        }
    }

    /* MOBILE LOGIN: HIDE TOP HERO SECTION */
    @media (max-width: 980px) {
        html.hc-admin-login-page .hc-login-shell {
            grid-template-columns: 1fr !important;
            min-height: auto !important;
        }

        html.hc-admin-login-page .hc-login-hero {
            display: none !important;
        }

        html.hc-admin-login-page .hc-login-panel {
            padding: 28px 22px !important;
            min-height: auto !important;
            border-radius: 26px !important;
        }

        html.hc-admin-login-page .fi-simple-main {
            width: min(430px, calc(100vw - 22px)) !important;
        }
    }

    @media (max-width: 420px) {
        html.hc-admin-login-page .hc-login-panel {
            padding: 24px 16px !important;
        }

        html.hc-admin-login-page .hc-login-shell {
            border-radius: 24px !important;
        }
    }

</style>

<script>
    (function () {
        function removeLoginTopbarBadge() {
            document.querySelectorAll(
                '.hc-admin-desktop-badge, .hc-admin-mobile-brand, .hc-topbar-desktop-badge, .hc-topbar-mobile-brand, .hc-admin-topbar-right, .hc-admin-topbar-pill, .hc-admin-topbar-status'
            ).forEach(function (el) {
                el.remove();
            });
        }

        function buildLoginLayout() {
            document.body.classList.add('hc-admin-login-page');
            removeLoginTopbarBadge();

            const main = document.querySelector('.fi-simple-main');
            if (!main) return;

            if (main.dataset.hcLoginEnhanced === '1') {
                removeLoginTopbarBadge();
                return;
            }

            const existingChildren = Array.from(main.childNodes).filter(function (node) {
                return !(node.nodeType === Node.TEXT_NODE && !node.textContent.trim());
            });

            const shell = document.createElement('div');
            shell.className = 'hc-login-shell';

            const hero = document.createElement('div');
            hero.className = 'hc-login-hero';
            hero.innerHTML = `
                <div class="hc-login-hero-content">
                    <div class="hc-login-hero-kicker">
                        <span class="hc-login-hero-kicker-dot"></span>
                        Admin Access
                    </div>
                    <h2 class="hc-login-hero-title">Huacheng Building Materials</h2>
                    <div class="hc-login-hero-cn">华诚建材</div>
                    <p class="hc-login-hero-subtitle">
                        Sistem administrasi internal untuk mengelola konten, katalog produk, dan informasi perusahaan
                        secara rapi, profesional, dan terpusat.
                    </p>
                </div>
            `;

            const panel = document.createElement('div');
            panel.className = 'hc-login-panel';

            const panelInner = document.createElement('div');
            panelInner.className = 'hc-login-panel-inner';

            const panelBrand = document.createElement('div');
            panelBrand.className = 'hc-login-panel-brand';
            panelBrand.innerHTML = `
                <img src="{{ asset('images/Logo.png') }}" alt="Huacheng" class="hc-login-panel-brand-logo">
                <div>
                    <div class="hc-login-panel-brand-name">Huacheng</div>
                    <div class="hc-login-panel-brand-cn">华诚建材</div>
                    <div class="hc-login-panel-brand-small">Building Materials</div>
                </div>
            `;

            panelInner.appendChild(panelBrand);

            existingChildren.forEach(function (node) {
                panelInner.appendChild(node);
            });

            panel.appendChild(panelInner);
            shell.appendChild(hero);
            shell.appendChild(panel);
            main.appendChild(shell);

            main.dataset.hcLoginEnhanced = '1';
            removeLoginTopbarBadge();
        }

        document.addEventListener('DOMContentLoaded', buildLoginLayout);
        document.addEventListener('livewire:navigated', buildLoginLayout);

        setTimeout(buildLoginLayout, 120);
        setTimeout(buildLoginLayout, 450);
        setTimeout(buildLoginLayout, 900);
    })();
</script>
@endif