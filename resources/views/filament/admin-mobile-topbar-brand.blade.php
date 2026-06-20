<div class="hc-admin-mobile-topbar-brand" id="hc-admin-mobile-topbar-brand">
    <img src="{{ asset('images/Logo.png') }}" alt="Huacheng">

    <div class="hc-admin-mobile-topbar-copy">
        <div class="hc-admin-mobile-topbar-name">Huacheng</div>
        <div class="hc-admin-mobile-topbar-chinese">华诚建材</div>
        <div class="hc-admin-mobile-topbar-small">Building Materials</div>
    </div>
</div>

<style>
    .hc-admin-mobile-topbar-brand {
        display: none;
    }

    @media (max-width: 768px) {
        .fi-topbar {
            min-height: 68px !important;
            background: rgba(17, 24, 39, .96) !important;
            border-bottom: 1px solid rgba(46, 167, 224, .14) !important;
            box-shadow: 0 10px 28px rgba(0, 0, 0, .22) !important;
            backdrop-filter: blur(18px) !important;
        }

        .hc-admin-mobile-topbar-brand {
            position: fixed !important;
            top: 10px !important;
            left: 58px !important;
            z-index: 99980 !important;
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            max-width: calc(100vw - 150px) !important;
            height: 48px !important;
            padding: 5px 12px 5px 5px !important;
            border-radius: 999px !important;
            border: 1px solid rgba(46, 167, 224, .22) !important;
            background:
                radial-gradient(circle at 18% 20%, rgba(46, 167, 224, .20), transparent 34%),
                linear-gradient(135deg, rgba(15, 23, 42, .96), rgba(15, 23, 42, .78)) !important;
            box-shadow:
                0 12px 28px rgba(0, 0, 0, .28),
                inset 0 1px 0 rgba(255, 255, 255, .07) !important;
            overflow: hidden !important;
            pointer-events: auto !important;
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) scale(1) !important;
            transition: opacity .18s ease, visibility .18s ease, transform .18s ease !important;
        }

        body.hc-admin-sidebar-open .hc-admin-mobile-topbar-brand {
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
            transform: translateY(-8px) scale(.96) !important;
        }

        .hc-admin-mobile-topbar-brand img {
            width: 38px !important;
            height: 38px !important;
            min-width: 38px !important;
            min-height: 38px !important;
            padding: 5px !important;
            border-radius: 999px !important;
            object-fit: contain !important;
            background: #ffffff !important;
            border: 1px solid rgba(46, 167, 224, .30) !important;
            box-shadow:
                0 8px 18px rgba(0, 0, 0, .24),
                0 0 0 4px rgba(46, 167, 224, .08) !important;
        }

        .hc-admin-mobile-topbar-copy {
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            gap: 2px !important;
            min-width: 0 !important;
        }

        .hc-admin-mobile-topbar-name {
            color: #f8fafc !important;
            font-size: 12px !important;
            line-height: 1 !important;
            font-weight: 900 !important;
            white-space: nowrap !important;
        }

        .hc-admin-mobile-topbar-chinese {
            color: #2EA7E0 !important;
            font-size: 16px !important;
            line-height: 1 !important;
            font-weight: 950 !important;
            letter-spacing: .08em !important;
            white-space: nowrap !important;
            text-shadow: 0 0 14px rgba(46, 167, 224, .48) !important;
        }

        .hc-admin-mobile-topbar-small {
            color: rgba(226, 232, 240, .66) !important;
            font-size: 7px !important;
            line-height: 1 !important;
            font-weight: 800 !important;
            letter-spacing: .14em !important;
            text-transform: uppercase !important;
            white-space: nowrap !important;
        }

        .hc-admin-topbar-right,
        .hc-admin-topbar-pill,
        .hc-admin-topbar-status {
            display: none !important;
        }

        .fi-topbar .fi-avatar,
        .fi-topbar [class*="avatar"] {
            box-shadow:
                0 0 0 3px rgba(46, 167, 224, .24),
                0 10px 24px rgba(0, 0, 0, .30) !important;
        }
    }

    @media (max-width: 390px) {
        .hc-admin-mobile-topbar-brand {
            left: 52px !important;
            max-width: calc(100vw - 138px) !important;
            gap: 8px !important;
            padding-right: 9px !important;
        }

        .hc-admin-mobile-topbar-brand img {
            width: 35px !important;
            height: 35px !important;
            min-width: 35px !important;
            min-height: 35px !important;
        }

        .hc-admin-mobile-topbar-name {
            font-size: 11px !important;
        }

        .hc-admin-mobile-topbar-chinese {
            font-size: 14px !important;
        }

        .hc-admin-mobile-topbar-small {
            display: none !important;
        }
    }
</style>

<script>
    (function () {
        function isMobile() {
            return window.matchMedia('(max-width: 768px)').matches;
        }

        function isSidebarVisible() {
            const sidebar = document.querySelector('.fi-sidebar');
            const aside = document.querySelector('aside');

            const targets = [sidebar, aside].filter(Boolean);

            for (const target of targets) {
                const rect = target.getBoundingClientRect();
                const style = window.getComputedStyle(target);

                if (
                    rect.width > 180 &&
                    rect.left < 20 &&
                    rect.right > 180 &&
                    style.display !== 'none' &&
                    style.visibility !== 'hidden' &&
                    parseFloat(style.opacity || '1') > 0
                ) {
                    return true;
                }
            }

            return false;
        }

        function syncMobileBrandVisibility() {
            if (!isMobile()) {
                document.body.classList.remove('hc-admin-sidebar-open');
                return;
            }

            if (isSidebarVisible()) {
                document.body.classList.add('hc-admin-sidebar-open');
            } else {
                document.body.classList.remove('hc-admin-sidebar-open');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            syncMobileBrandVisibility();

            document.addEventListener('click', function () {
                setTimeout(syncMobileBrandVisibility, 60);
                setTimeout(syncMobileBrandVisibility, 220);
                setTimeout(syncMobileBrandVisibility, 450);
            }, true);

            window.addEventListener('resize', syncMobileBrandVisibility);
            window.addEventListener('orientationchange', syncMobileBrandVisibility);

            const observer = new MutationObserver(function () {
                syncMobileBrandVisibility();
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['class', 'style', 'aria-expanded', 'data-state']
            });

            setInterval(syncMobileBrandVisibility, 500);
        });

        document.addEventListener('livewire:navigated', function () {
            setTimeout(syncMobileBrandVisibility, 100);
        });
    })();
</script>
