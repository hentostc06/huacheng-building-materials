<style>
    /*
    |--------------------------------------------------------------------------
    | Huacheng Admin Theme - Final Safe Version
    |--------------------------------------------------------------------------
    */

    .fi-topbar {
        min-height: 72px !important;
        border-bottom: 1px solid rgba(148, 163, 184, .10) !important;
        background: rgba(17, 24, 39, .96) !important;
        backdrop-filter: blur(18px) !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .18) !important;
    }

    .fi-sidebar-header {
        min-height: 88px !important;
        padding: 18px 20px 18px 28px !important;
        border-bottom: 1px solid rgba(148, 163, 184, .10) !important;
    }

    .fi-sidebar-header img {
        width: 50px !important;
        height: 50px !important;
        min-width: 50px !important;
        min-height: 50px !important;
        max-width: 50px !important;
        max-height: 50px !important;
        padding: 6px !important;
        border-radius: 999px !important;
        object-fit: contain !important;
        background: #ffffff !important;
        border: 1px solid rgba(46, 167, 224, .30) !important;
        box-shadow:
            0 12px 28px rgba(0, 0, 0, .24),
            0 0 0 5px rgba(46, 167, 224, .08) !important;
    }

    .hc-admin-sidebar-brand-copy {
        display: flex !important;
        flex-direction: column !important;
        gap: 3px !important;
        margin-left: 12px !important;
        min-width: 0 !important;
    }

    .hc-admin-sidebar-brand-name,
    .hc-admin-mobile-brand-name {
        color: #f8fafc !important;
        font-size: 14px !important;
        line-height: 1 !important;
        font-weight: 900 !important;
        white-space: nowrap !important;
    }

    .hc-admin-sidebar-brand-chinese,
    .hc-admin-mobile-brand-chinese {
        color: #2EA7E0 !important;
        font-size: 20px !important;
        line-height: 1 !important;
        font-weight: 950 !important;
        letter-spacing: .08em !important;
        white-space: nowrap !important;
        text-shadow: 0 0 16px rgba(46, 167, 224, .45) !important;
    }

    .hc-admin-sidebar-brand-small,
    .hc-admin-mobile-brand-small {
        color: rgba(226, 232, 240, .66) !important;
        font-size: 8px !important;
        line-height: 1 !important;
        font-weight: 800 !important;
        letter-spacing: .16em !important;
        text-transform: uppercase !important;
        white-space: nowrap !important;
    }

    /*
    |--------------------------------------------------------------------------
    | Desktop Topbar Right
    |--------------------------------------------------------------------------
    */

    .hc-admin-desktop-badge {
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

    .hc-admin-desktop-badge-dot {
        width: 10px !important;
        height: 10px !important;
        border-radius: 999px !important;
        background: #22c55e !important;
        box-shadow:
            0 0 0 5px rgba(34, 197, 94, .12),
            0 0 18px rgba(34, 197, 94, .55) !important;
    }

    .hc-admin-desktop-badge-copy {
        display: flex !important;
        flex-direction: column !important;
        gap: 2px !important;
        min-width: 0 !important;
    }

    .hc-admin-desktop-badge-name {
        color: #f8fafc !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 900 !important;
        white-space: nowrap !important;
    }

    .hc-admin-desktop-badge-chinese {
        color: #2EA7E0 !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 950 !important;
        letter-spacing: .10em !important;
        white-space: nowrap !important;
    }

    .hc-admin-avatar-button {
        width: 46px !important;
        height: 46px !important;
        min-width: 46px !important;
        min-height: 46px !important;
        border-radius: 999px !important;
        border: 1px solid rgba(46, 167, 224, .28) !important;
        background:
            radial-gradient(circle at 30% 25%, rgba(46, 167, 224, .24), transparent 36%),
            rgba(15, 23, 42, .98) !important;
        box-shadow:
            0 0 0 4px rgba(46, 167, 224, .10),
            0 12px 28px rgba(0, 0, 0, .28) !important;
        color: #f8fafc !important;
    }

    .hc-admin-avatar-button:hover {
        transform: translateY(-1px) !important;
        box-shadow:
            0 0 0 5px rgba(46, 167, 224, .16),
            0 16px 34px rgba(0, 0, 0, .32) !important;
    }

    /*
    |--------------------------------------------------------------------------
    | Mobile Topbar Closed
    |--------------------------------------------------------------------------
    */

    .hc-admin-mobile-brand {
        display: none !important;
    }

    @media (max-width: 768px) {
        .fi-topbar {
            min-height: 68px !important;
        }

        .hc-admin-desktop-badge {
            display: none !important;
        }

        .hc-admin-mobile-brand {
            position: fixed !important;
            top: 10px !important;
            left: 58px !important;
            z-index: 99940 !important;
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
            pointer-events: auto !important;
        }

        body.hc-admin-menu-open .hc-admin-mobile-brand {
            display: none !important;
        }

        .hc-admin-mobile-brand img {
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

        .hc-admin-mobile-brand-copy {
            display: flex !important;
            flex-direction: column !important;
            gap: 2px !important;
            min-width: 0 !important;
        }

        .hc-admin-mobile-brand-name {
            font-size: 12px !important;
        }

        .hc-admin-mobile-brand-chinese {
            font-size: 16px !important;
        }

        .hc-admin-mobile-brand-small {
            font-size: 7px !important;
        }

        /*
        | Burger/sidebar open:
        | Brand mobile topbar hilang, brand di sidebar muncul rapi.
        */
        .fi-sidebar-header {
            min-height: 76px !important;
            padding: 14px 16px 14px 28px !important;
        }

        .fi-sidebar-header img {
            width: 42px !important;
            height: 42px !important;
            min-width: 42px !important;
            min-height: 42px !important;
            max-width: 42px !important;
            max-height: 42px !important;
        }

        .fi-sidebar-header .hc-admin-sidebar-brand-copy {
            display: flex !important;
            margin-left: 11px !important;
        }

        .fi-sidebar-header .hc-admin-sidebar-brand-name {
            font-size: 12px !important;
        }

        .fi-sidebar-header .hc-admin-sidebar-brand-chinese {
            font-size: 16px !important;
        }

        .fi-sidebar-header .hc-admin-sidebar-brand-small {
            font-size: 7px !important;
        }

        .hc-admin-avatar-button {
            width: 42px !important;
            height: 42px !important;
            min-width: 42px !important;
            min-height: 42px !important;
        }
    }

    @media (max-width: 390px) {
        .hc-admin-mobile-brand {
            left: 52px !important;
            max-width: calc(100vw - 138px) !important;
        }

        .hc-admin-mobile-brand-small {
            display: none !important;
        }

        .fi-sidebar-header .hc-admin-sidebar-brand-small {
            display: none !important;
        }
    }

    /* DESKTOP SIDEBAR BRAND FIX - HUACHENG */
    @media (min-width: 769px) {
        .fi-sidebar-header {
            min-height: 92px !important;
            padding: 18px 22px 18px 28px !important;
            display: flex !important;
            align-items: center !important;
            border-bottom: 1px solid rgba(148, 163, 184, .10) !important;
        }

        .fi-sidebar-header a,
        .fi-sidebar-header [href] {
            display: inline-flex !important;
            align-items: center !important;
            gap: 13px !important;
            width: 100% !important;
            max-width: 100% !important;
            text-decoration: none !important;
        }

        .fi-sidebar-header img {
            width: 52px !important;
            height: 52px !important;
            min-width: 52px !important;
            min-height: 52px !important;
            max-width: 52px !important;
            max-height: 52px !important;
            padding: 6px !important;
            border-radius: 999px !important;
            object-fit: contain !important;
            background: #ffffff !important;
            border: 1px solid rgba(46, 167, 224, .30) !important;
            box-shadow:
                0 12px 28px rgba(0, 0, 0, .25),
                0 0 0 5px rgba(46, 167, 224, .08) !important;
        }

        .hc-desktop-sidebar-brand-copy {
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            gap: 4px !important;
            min-width: 0 !important;
        }

        .hc-desktop-sidebar-brand-name {
            color: #f8fafc !important;
            font-size: 15px !important;
            line-height: 1 !important;
            font-weight: 950 !important;
            letter-spacing: .01em !important;
            white-space: nowrap !important;
        }

        .hc-desktop-sidebar-brand-chinese {
            color: #2EA7E0 !important;
            font-size: 21px !important;
            line-height: 1 !important;
            font-weight: 950 !important;
            letter-spacing: .08em !important;
            white-space: nowrap !important;
            text-shadow: 0 0 18px rgba(46, 167, 224, .45) !important;
        }

        .hc-desktop-sidebar-brand-small {
            color: rgba(226, 232, 240, .68) !important;
            font-size: 9px !important;
            line-height: 1 !important;
            font-weight: 800 !important;
            letter-spacing: .16em !important;
            text-transform: uppercase !important;
            white-space: nowrap !important;
        }
    }
    /* END DESKTOP SIDEBAR BRAND FIX - HUACHENG */

</style>

<script>
    (function () {
        const logoUrl = "{{ asset('images/Logo.png') }}";

        function mountSidebarBrand() {
            const sidebarHeader = document.querySelector('.fi-sidebar-header');

            if (!sidebarHeader) {
                return;
            }

            const logo = sidebarHeader.querySelector('img');

            if (!logo) {
                return;
            }

            const parent = logo.closest('a') || logo.parentElement;

            if (!parent) {
                return;
            }

            parent.style.display = 'inline-flex';
            parent.style.alignItems = 'center';
            parent.style.textDecoration = 'none';

            if (parent.querySelector('.hc-admin-sidebar-brand-copy')) {
                return;
            }

            const copy = document.createElement('span');
            copy.className = 'hc-admin-sidebar-brand-copy';
            copy.innerHTML = `
                <span class="hc-admin-sidebar-brand-name">Huacheng</span>
                <span class="hc-admin-sidebar-brand-chinese">华诚建材</span>
                <span class="hc-admin-sidebar-brand-small">Building Materials</span>
            `;

            logo.insertAdjacentElement('afterend', copy);
        }

        function mountDesktopBadge() {
            if (document.querySelector('.hc-admin-desktop-badge')) {
                return;
            }

            const badge = document.createElement('div');
            badge.className = 'hc-admin-desktop-badge';
            badge.innerHTML = `
                <span class="hc-admin-desktop-badge-dot"></span>
                <span class="hc-admin-desktop-badge-copy">
                    <span class="hc-admin-desktop-badge-name">Huacheng Admin</span>
                    <span class="hc-admin-desktop-badge-chinese">华诚建材</span>
                </span>
            `;

            document.body.appendChild(badge);
        }

        function mountMobileBrand() {
            if (document.querySelector('.hc-admin-mobile-brand')) {
                return;
            }

            const brand = document.createElement('a');
            brand.href = "{{ url('/admin') }}";
            brand.className = 'hc-admin-mobile-brand';
            brand.innerHTML = `
                <img src="${logoUrl}" alt="Huacheng">
                <span class="hc-admin-mobile-brand-copy">
                    <span class="hc-admin-mobile-brand-name">Huacheng</span>
                    <span class="hc-admin-mobile-brand-chinese">华诚建材</span>
                    <span class="hc-admin-mobile-brand-small">Building Materials</span>
                </span>
            `;

            document.body.appendChild(brand);
        }

        function styleAvatarButton() {
            const topbar = document.querySelector('.fi-topbar');

            if (!topbar) {
                return;
            }

            topbar.querySelectorAll('button, a').forEach(function (item) {
                const text = (item.textContent || '').trim();

                if (text.length === 1 || text === 'A') {
                    item.classList.add('hc-admin-avatar-button');
                }
            });
        }

        function syncMenuState() {
            const sidebar = document.querySelector('.fi-sidebar');
            const aside = document.querySelector('aside');

            let open = false;

            [sidebar, aside].filter(Boolean).forEach(function (el) {
                const rect = el.getBoundingClientRect();
                const style = window.getComputedStyle(el);

                if (
                    window.innerWidth <= 768 &&
                    rect.width > 180 &&
                    rect.left < 30 &&
                    rect.right > 180 &&
                    style.display !== 'none' &&
                    style.visibility !== 'hidden' &&
                    parseFloat(style.opacity || '1') > 0
                ) {
                    open = true;
                }
            });

            document.body.classList.toggle('hc-admin-menu-open', open);
        }

        function bootHuachengAdminTheme() {
            mountSidebarBrand();
            mountDesktopBadge();
            mountMobileBrand();
            styleAvatarButton();
            syncMenuState();
        }

        document.addEventListener('DOMContentLoaded', bootHuachengAdminTheme);
        document.addEventListener('livewire:navigated', bootHuachengAdminTheme);
        document.addEventListener('livewire:update', bootHuachengAdminTheme);

        document.addEventListener('click', function () {
            window.setTimeout(syncMenuState, 80);
            window.setTimeout(syncMenuState, 260);
        }, true);

        window.addEventListener('resize', syncMenuState);
        window.addEventListener('orientationchange', syncMenuState);

        window.setTimeout(bootHuachengAdminTheme, 300);
        window.setTimeout(bootHuachengAdminTheme, 900);
    })();
</script>

    /* DESKTOP SIDEBAR BRAND SCRIPT - HUACHENG */
    <script>
        (function () {
            function mountDesktopSidebarBrand() {
                const sidebarHeader = document.querySelector('.fi-sidebar-header');

                if (!sidebarHeader) {
                    return;
                }

                const logo = sidebarHeader.querySelector('img');

                if (!logo) {
                    return;
                }

                const parent = logo.closest('a') || logo.parentElement;

                if (!parent) {
                    return;
                }

                parent.style.display = 'inline-flex';
                parent.style.alignItems = 'center';
                parent.style.gap = '13px';
                parent.style.textDecoration = 'none';
                parent.style.width = '100%';

                const oldCopies = parent.querySelectorAll('.hc-admin-sidebar-brand-copy, .hc-desktop-sidebar-brand-copy');
                oldCopies.forEach(function (item) {
                    item.remove();
                });

                const copy = document.createElement('span');
                copy.className = 'hc-desktop-sidebar-brand-copy';
                copy.innerHTML = `
                    <span class="hc-desktop-sidebar-brand-name">Huacheng</span>
                    <span class="hc-desktop-sidebar-brand-chinese">华诚建材</span>
                    <span class="hc-desktop-sidebar-brand-small">Building Materials</span>
                `;

                logo.insertAdjacentElement('afterend', copy);
            }

            document.addEventListener('DOMContentLoaded', mountDesktopSidebarBrand);
            document.addEventListener('livewire:navigated', mountDesktopSidebarBrand);
            document.addEventListener('livewire:update', mountDesktopSidebarBrand);

            setTimeout(mountDesktopSidebarBrand, 200);
            setTimeout(mountDesktopSidebarBrand, 700);
            setTimeout(mountDesktopSidebarBrand, 1400);

            document.addEventListener('DOMContentLoaded', function () {
                const observer = new MutationObserver(function () {
                    mountDesktopSidebarBrand();
                });

                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });
            });
        })();
    </script>
    /* END DESKTOP SIDEBAR BRAND SCRIPT - HUACHENG */

