<style>
    /* HUACHENG TOPBAR POLISH ONLY */

    .hc-topbar-old-hide,
    .hc-admin-topbar-right,
    .hc-admin-topbar-pill,
    .hc-admin-topbar-status,
    .hc-admin-desktop-badge {
        display: none !important;
    }

    .fi-topbar {
        position: relative !important;
        min-height: 72px !important;
        border-bottom: 1px solid rgba(148, 163, 184, .10) !important;
        background: rgba(17, 24, 39, .96) !important;
        backdrop-filter: blur(18px) !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .18) !important;
    }

    .hc-topbar-desktop-badge {
        position: fixed !important;
        top: 13px !important;
        right: 84px !important;
        z-index: 99940 !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 10px !important;
        height: 46px !important;
        padding: 8px 14px !important;
        border-radius: 999px !important;
        border: 1px solid rgba(46, 167, 224, .24) !important;
        background:
            radial-gradient(circle at 20% 20%, rgba(46, 167, 224, .22), transparent 34%),
            linear-gradient(135deg, rgba(15, 23, 42, .98), rgba(15, 23, 42, .78)) !important;
        box-shadow:
            0 12px 30px rgba(0, 0, 0, .24),
            inset 0 1px 0 rgba(255, 255, 255, .08) !important;
        pointer-events: none !important;
    }

    .hc-topbar-desktop-badge-dot {
        width: 10px !important;
        height: 10px !important;
        border-radius: 999px !important;
        background: #22c55e !important;
        box-shadow:
            0 0 0 5px rgba(34, 197, 94, .12),
            0 0 18px rgba(34, 197, 94, .55) !important;
    }

    .hc-topbar-desktop-badge-copy {
        display: flex !important;
        flex-direction: column !important;
        gap: 2px !important;
    }

    .hc-topbar-desktop-badge-title {
        color: #f8fafc !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 900 !important;
        white-space: nowrap !important;
    }

    .hc-topbar-desktop-badge-china {
        color: #2EA7E0 !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 950 !important;
        letter-spacing: .10em !important;
        white-space: nowrap !important;
        text-shadow: 0 0 14px rgba(46, 167, 224, .40) !important;
    }

    .hc-topbar-mobile-brand {
        display: none !important;
    }

    @media (max-width: 768px) {
        .fi-topbar {
            min-height: 68px !important;
        }

        .hc-topbar-desktop-badge {
            display: none !important;
        }

        .hc-topbar-mobile-brand {
            position: absolute !important;
            top: 50% !important;
            left: 58px !important;
            transform: translateY(-50%) !important;
            z-index: 10 !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 9px !important;
            height: 48px !important;
            max-width: calc(100vw - 150px) !important;
            padding: 5px 11px 5px 5px !important;
            border-radius: 999px !important;
            border: 1px solid rgba(46, 167, 224, .22) !important;
            background:
                radial-gradient(circle at 20% 20%, rgba(46, 167, 224, .20), transparent 34%),
                linear-gradient(135deg, rgba(15, 23, 42, .96), rgba(15, 23, 42, .78)) !important;
            box-shadow:
                0 12px 28px rgba(0, 0, 0, .26),
                inset 0 1px 0 rgba(255, 255, 255, .06) !important;
            overflow: hidden !important;
            text-decoration: none !important;
        }

        body.hc-admin-mobile-menu-open .hc-topbar-mobile-brand {
            display: none !important;
        }

        .hc-topbar-mobile-brand img {
            width: 38px !important;
            height: 38px !important;
            min-width: 38px !important;
            min-height: 38px !important;
            padding: 5px !important;
            border-radius: 999px !important;
            object-fit: contain !important;
            background: #ffffff !important;
            border: 1px solid rgba(46, 167, 224, .30) !important;
            box-shadow: 0 8px 18px rgba(0, 0, 0, .24) !important;
        }

        .hc-topbar-mobile-brand-copy {
            display: flex !important;
            flex-direction: column !important;
            gap: 2px !important;
            min-width: 0 !important;
        }

        .hc-topbar-mobile-brand-name {
            color: #f8fafc !important;
            font-size: 12px !important;
            line-height: 1 !important;
            font-weight: 900 !important;
            white-space: nowrap !important;
        }

        .hc-topbar-mobile-brand-china {
            color: #2EA7E0 !important;
            font-size: 16px !important;
            line-height: 1 !important;
            font-weight: 950 !important;
            letter-spacing: .08em !important;
            white-space: nowrap !important;
            text-shadow: 0 0 14px rgba(46, 167, 224, .48) !important;
        }

        .hc-topbar-mobile-brand-small {
            color: rgba(226, 232, 240, .66) !important;
            font-size: 7px !important;
            line-height: 1 !important;
            font-weight: 800 !important;
            letter-spacing: .14em !important;
            text-transform: uppercase !important;
            white-space: nowrap !important;
        }
    }

    @media (max-width: 390px) {
        .hc-topbar-mobile-brand {
            left: 52px !important;
            max-width: calc(100vw - 138px) !important;
        }

        .hc-topbar-mobile-brand-small {
            display: none !important;
        }
    }
</style>

<script>
    (function () {
        const logoUrl = "{{ asset('images/Logo.png') }}";

        function mountMobileBrand() {
            const topbar = document.querySelector('.fi-topbar');

            if (!topbar || topbar.querySelector('.hc-topbar-mobile-brand')) {
                return;
            }

            const brand = document.createElement('a');
            brand.href = "{{ url('/admin') }}";
            brand.className = 'hc-topbar-mobile-brand';
            brand.innerHTML = `
                <img src="${logoUrl}" alt="Huacheng">
                <span class="hc-topbar-mobile-brand-copy">
                    <span class="hc-topbar-mobile-brand-name">Huacheng</span>
                    <span class="hc-topbar-mobile-brand-china">华诚建材</span>
                    <span class="hc-topbar-mobile-brand-small">Building Materials</span>
                </span>
            `;

            topbar.appendChild(brand);
        }

        function mountDesktopBadge() {
            if (document.querySelector('.hc-topbar-desktop-badge')) {
                return;
            }

            const badge = document.createElement('div');
            badge.className = 'hc-topbar-desktop-badge';
            badge.innerHTML = `
                <span class="hc-topbar-desktop-badge-dot"></span>
                <span class="hc-topbar-desktop-badge-copy">
                    <span class="hc-topbar-desktop-badge-title">Huacheng Admin</span>
                    <span class="hc-topbar-desktop-badge-china">华诚建材</span>
                </span>
            `;

            document.body.appendChild(badge);
        }

        function syncMobileMenuState() {
            if (window.innerWidth > 768) {
                document.body.classList.remove('hc-admin-mobile-menu-open');
                return;
            }

            const sidebar = document.querySelector('.fi-sidebar') || document.querySelector('aside');
            let open = false;

            if (sidebar) {
                const rect = sidebar.getBoundingClientRect();
                const style = window.getComputedStyle(sidebar);

                open =
                    rect.width > 200 &&
                    rect.left < 20 &&
                    rect.right > 200 &&
                    style.display !== 'none' &&
                    style.visibility !== 'hidden' &&
                    Number(style.opacity || 1) > 0;
            }

            document.body.classList.toggle('hc-admin-mobile-menu-open', open);
        }

        function bootTopbarPolish() {
            mountMobileBrand();
            mountDesktopBadge();
            syncMobileMenuState();
        }

        document.addEventListener('DOMContentLoaded', bootTopbarPolish);
        document.addEventListener('livewire:navigated', bootTopbarPolish);
        document.addEventListener('livewire:update', bootTopbarPolish);

        document.addEventListener('click', function () {
            setTimeout(syncMobileMenuState, 80);
            setTimeout(syncMobileMenuState, 250);
            setTimeout(syncMobileMenuState, 500);
        }, true);

        window.addEventListener('resize', syncMobileMenuState);
        window.addEventListener('orientationchange', syncMobileMenuState);

        setTimeout(bootTopbarPolish, 250);
        setTimeout(bootTopbarPolish, 800);
    })();
</script>
