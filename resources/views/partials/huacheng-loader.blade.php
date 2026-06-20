<div id="hc-page-loader" class="hc-page-loader" aria-label="Loading Huacheng">
    <div class="hc-page-loader__card">
        <div class="hc-page-loader__logo-box">
            <img
                src="{{ asset('images/Logo.png') }}"
                alt="Huacheng Building Materials"
                class="hc-page-loader__logo"
                onerror="this.style.display='none'"
            >
        </div>

        <div class="hc-page-loader__spectrum" aria-hidden="true">
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
            <span style="--i: 4"></span>
            <span style="--i: 5"></span>
            <span style="--i: 6"></span>
            <span style="--i: 7"></span>
            <span style="--i: 8"></span>
            <span style="--i: 9"></span>
        </div>

        <div class="hc-page-loader__title">
            Huacheng Building Materials
        </div>

        <div class="hc-page-loader__subtitle">
            Preparing content
        </div>
    </div>
</div>

<style>
    .hc-page-loader {
        position: fixed;
        inset: 0;
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            radial-gradient(circle at 25% 20%, rgba(46, 167, 224, .22), transparent 34%),
            radial-gradient(circle at 78% 78%, rgba(14, 165, 233, .18), transparent 36%),
            linear-gradient(135deg, #f8fcff 0%, #eaf7ff 45%, #ffffff 100%);
        opacity: 1;
        visibility: visible;
        transition: opacity .45s ease, visibility .45s ease;
    }

    .hc-page-loader.is-hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    .hc-page-loader__card {
        width: min(360px, calc(100vw - 48px));
        padding: 34px 28px 32px;
        border: 1px solid rgba(46, 167, 224, .22);
        border-radius: 30px;
        background: rgba(255, 255, 255, .86);
        box-shadow: 0 26px 70px rgba(15, 23, 42, .12);
        backdrop-filter: blur(18px);
        text-align: center;
    }

    .hc-page-loader__logo-box {
        width: 108px;
        height: 108px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 32px;
        background:
            linear-gradient(135deg, rgba(46, 167, 224, .14), rgba(255, 255, 255, .98));
        border: 1px solid rgba(46, 167, 224, .18);
        box-shadow:
            0 18px 40px rgba(46, 167, 224, .18),
            inset 0 1px 0 rgba(255, 255, 255, .85);
        animation: hcLoaderFloat 1.8s ease-in-out infinite;
    }

    .hc-page-loader__logo {
        max-width: 76px;
        max-height: 76px;
        object-fit: contain;
    }

    .hc-page-loader__spectrum {
        height: 52px;
        margin-top: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }

    .hc-page-loader__spectrum span {
        width: 8px;
        height: 18px;
        border-radius: 999px;
        background: linear-gradient(180deg, #7dd3fc 0%, #2ea7e0 50%, #1b8dc2 100%);
        box-shadow: 0 10px 22px rgba(46, 167, 224, .22);
        transform-origin: center;
        animation: hcSpectrum 1s ease-in-out infinite;
        animation-delay: calc(var(--i) * .08s);
    }

    .hc-page-loader__spectrum span:nth-child(2n) {
        background: linear-gradient(180deg, #bae6fd 0%, #38bdf8 48%, #0284c7 100%);
    }

    .hc-page-loader__spectrum span:nth-child(3n) {
        background: linear-gradient(180deg, #e0f2fe 0%, #2ea7e0 48%, #0369a1 100%);
    }

    .hc-page-loader__title {
        margin-top: 18px;
        font-size: 20px;
        line-height: 1.3;
        font-weight: 900;
        letter-spacing: -.02em;
        color: #0f172a;
    }

    .hc-page-loader__subtitle {
        margin-top: 8px;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: #2EA7E0;
    }

    @keyframes hcSpectrum {
        0%, 100% {
            height: 16px;
            opacity: .55;
            transform: translateY(0) scaleY(.9);
        }

        35% {
            height: 48px;
            opacity: 1;
            transform: translateY(-4px) scaleY(1);
        }

        65% {
            height: 26px;
            opacity: .82;
            transform: translateY(3px) scaleY(.95);
        }
    }

    @keyframes hcLoaderFloat {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    @media (max-width: 640px) {
        .hc-page-loader__card {
            padding: 28px 22px;
            border-radius: 26px;
        }

        .hc-page-loader__logo-box {
            width: 92px;
            height: 92px;
            border-radius: 26px;
        }

        .hc-page-loader__logo {
            max-width: 64px;
            max-height: 64px;
        }

        .hc-page-loader__spectrum {
            height: 46px;
            gap: 6px;
        }

        .hc-page-loader__spectrum span {
            width: 7px;
        }

        .hc-page-loader__title {
            font-size: 18px;
        }
    }
</style>

<script>
    (function () {
        const loader = document.getElementById('hc-page-loader');

        if (!loader || loader.dataset.ready === '1') {
            return;
        }

        loader.dataset.ready = '1';

        let shownAt = Date.now();
        const minDuration = 500;

        function showLoader() {
            shownAt = Date.now();
            loader.classList.remove('is-hidden');

            window.clearTimeout(window.__hcLoaderFallback);
            window.__hcLoaderFallback = window.setTimeout(hideLoader, 4500);
        }

        function hideLoader() {
            const elapsed = Date.now() - shownAt;
            const delay = Math.max(0, minDuration - elapsed);

            window.setTimeout(function () {
                loader.classList.add('is-hidden');
            }, delay);
        }

        window.addEventListener('load', hideLoader);
        window.addEventListener('pageshow', hideLoader);

        document.addEventListener('DOMContentLoaded', function () {
            window.setTimeout(hideLoader, 400);
        });

        window.addEventListener('beforeunload', function () {
            showLoader();
        });

        document.addEventListener('click', function (event) {
            const link = event.target.closest('a[href]');

            if (!link) {
                return;
            }

            const href = link.getAttribute('href') || '';

            if (
                link.target === '_blank' ||
                link.hasAttribute('download') ||
                href === '#' ||
                href.startsWith('#') ||
                href.startsWith('javascript:') ||
                href.startsWith('mailto:') ||
                href.startsWith('tel:') ||
                link.closest('[data-no-loader]') ||
                event.ctrlKey ||
                event.metaKey ||
                event.shiftKey ||
                event.altKey
            ) {
                return;
            }

            showLoader();
        });

        document.addEventListener('submit', function (event) {
            if (event.target.closest('[data-no-loader]')) {
                return;
            }

            showLoader();
        });

        document.addEventListener('livewire:navigating', showLoader);
        document.addEventListener('livewire:navigated', hideLoader);
        document.addEventListener('turbo:before-visit', showLoader);
        document.addEventListener('turbo:load', hideLoader);

        window.HuachengLoader = {
            show: showLoader,
            hide: hideLoader,
        };
    })();
</script>
