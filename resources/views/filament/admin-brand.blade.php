<style>
    /*
    |--------------------------------------------------------------------------
    | Huacheng Admin Brand - header kiri seperti screenshot
    |--------------------------------------------------------------------------
    */

    /* Sembunyikan semua brand custom lama yang turun ke sidebar */
    .hc-force-sidebar-brand,
    .hc-sidebar-brand-fixed,
    .hc-admin-brand-copy,
    .hc-admin-brand-logo-view,
    .hc-admin-topbar-pill,
    .hc-admin-header-brand-text,
    .fi-sidebar-header {
        display: none !important;
    }

    /* Target logo bawaan Filament di header kiri */
    .fi-topbar img,
    .fi-topbar .fi-logo img {
        width: 46px !important;
        height: 46px !important;
        min-width: 46px !important;
        min-height: 46px !important;
        max-width: 46px !important;
        max-height: 46px !important;
        padding: 6px !important;
        border-radius: 9999px !important;
        object-fit: contain !important;
        background: #ffffff !important;
        border: 1px solid rgba(46, 167, 224, .30) !important;
        box-shadow:
            0 12px 28px rgba(15, 23, 42, .25),
            0 0 0 5px rgba(46, 167, 224, .08) !important;
    }

    .hc-topbar-left-brand {
        display: inline-flex !important;
        align-items: center !important;
        gap: 12px !important;
        margin-left: 28px !important;
        text-decoration: none !important;
        max-width: 270px !important;
    }

    .hc-topbar-left-brand__text {
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
        gap: 3px !important;
        min-width: 0 !important;
    }

    .hc-topbar-left-brand__name {
        color: #f8fafc !important;
        font-size: 14px !important;
        line-height: 1 !important;
        font-weight: 900 !important;
        letter-spacing: .01em !important;
        white-space: nowrap !important;
    }

    .hc-topbar-left-brand__china {
        color: #2EA7E0 !important;
        font-size: 20px !important;
        line-height: 1 !important;
        font-weight: 950 !important;
        letter-spacing: .08em !important;
        white-space: nowrap !important;
        text-shadow: 0 0 18px rgba(46, 167, 224, .50) !important;
    }

    .hc-topbar-left-brand__small {
        color: rgba(226, 232, 240, .68) !important;
        font-size: 8px !important;
        line-height: 1 !important;
        font-weight: 800 !important;
        letter-spacing: .15em !important;
        text-transform: uppercase !important;
        white-space: nowrap !important;
    }

    /* Avatar kanan jangan kena style brand */
    .fi-topbar [class*="avatar"] img,
    .fi-topbar button img {
        width: auto !important;
        height: auto !important;
        min-width: 0 !important;
        min-height: 0 !important;
        padding: 0 !important;
        box-shadow: none !important;
        border: 0 !important;
        background: transparent !important;
    }

    @media (max-width: 768px) {
        .hc-topbar-left-brand {
            margin-left: 12px !important;
        }

        .hc-topbar-left-brand__text {
            display: none !important;
        }

        .fi-topbar img,
        .fi-topbar .fi-logo img {
            width: 42px !important;
            height: 42px !important;
            min-width: 42px !important;
            min-height: 42px !important;
            max-width: 42px !important;
            max-height: 42px !important;
        }
    }
</style>

<script>
    (function () {
        function mountHuachengTopbarBrand() {
            document.querySelectorAll(
                '.hc-force-sidebar-brand, .hc-admin-topbar-pill, .hc-admin-header-brand-text, .hc-sidebar-brand-fixed'
            ).forEach(function (item) {
                item.remove();
            });

            const topbar = document.querySelector('.fi-topbar');

            if (!topbar) {
                return;
            }

            const logoImages = Array.from(topbar.querySelectorAll('img')).filter(function (img) {
                const src = img.getAttribute('src') || '';
                const rect = img.getBoundingClientRect();

                return src.includes('Logo.png') && rect.left < 250;
            });

            const logoImage = logoImages[0];

            if (!logoImage) {
                return;
            }

            const parent = logoImage.closest('a') || logoImage.parentElement;

            if (!parent) {
                return;
            }

            parent.classList.add('hc-topbar-left-brand');

            let text = parent.querySelector('.hc-topbar-left-brand__text');

            if (text) {
                return;
            }

            text = document.createElement('span');
            text.className = 'hc-topbar-left-brand__text';
            text.innerHTML = `
                <span class="hc-topbar-left-brand__name">Huacheng</span>
                <span class="hc-topbar-left-brand__china">华诚建材</span>
                <span class="hc-topbar-left-brand__small">Building Materials</span>
            `;

            logoImage.insertAdjacentElement('afterend', text);
        }

        document.addEventListener('DOMContentLoaded', mountHuachengTopbarBrand);
        document.addEventListener('livewire:navigated', mountHuachengTopbarBrand);
        document.addEventListener('livewire:update', mountHuachengTopbarBrand);

        setTimeout(mountHuachengTopbarBrand, 100);
        setTimeout(mountHuachengTopbarBrand, 400);
        setTimeout(mountHuachengTopbarBrand, 900);
        setTimeout(mountHuachengTopbarBrand, 1600);
    })();
</script>
