<style>
    .fi-sidebar-header {
        min-height: 82px !important;
        padding-inline: 22px !important;
    }

    .hc-admin-brand {
        display: inline-flex !important;
        align-items: center !important;
        gap: 13px !important;
        max-width: 100% !important;
        text-decoration: none !important;
    }

    .hc-admin-brand img {
        width: 50px !important;
        height: 50px !important;
        min-width: 50px !important;
        min-height: 50px !important;
        max-width: 50px !important;
        max-height: 50px !important;
        padding: 6px !important;
        border-radius: 9999px !important;
        object-fit: contain !important;
        background: #ffffff !important;
        border: 1px solid rgba(46, 167, 224, .26) !important;
        box-shadow: 0 12px 28px rgba(15, 23, 42, .22) !important;
    }

    .hc-admin-brand-text {
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
        gap: 3px !important;
        min-width: 0 !important;
    }

    .hc-admin-brand-name {
        color: #f8fafc !important;
        font-size: 15px !important;
        line-height: 1.05 !important;
        font-weight: 900 !important;
        letter-spacing: .01em !important;
        white-space: nowrap !important;
    }

    .hc-admin-brand-china {
        color: #2EA7E0 !important;
        font-size: 20px !important;
        line-height: 1.05 !important;
        font-weight: 950 !important;
        letter-spacing: .08em !important;
        white-space: nowrap !important;
        text-shadow: 0 0 18px rgba(46, 167, 224, .35) !important;
    }

    .hc-admin-brand-subtitle {
        color: rgba(226, 232, 240, .66) !important;
        font-size: 9px !important;
        line-height: 1 !important;
        font-weight: 800 !important;
        letter-spacing: .16em !important;
        text-transform: uppercase !important;
        white-space: nowrap !important;
    }

    .fi-sidebar.fi-collapsed .hc-admin-brand-text {
        display: none !important;
    }

    @media (max-width: 768px) {
        .hc-admin-brand-text {
            display: none !important;
        }

        .hc-admin-brand img {
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
    document.addEventListener('DOMContentLoaded', function () {
        function setupHuachengBrand() {
            const headers = document.querySelectorAll('.fi-sidebar-header, .fi-topbar');

            headers.forEach(function (header) {
                const logoImage = header.querySelector('img');

                if (!logoImage) {
                    return;
                }

                const parent = logoImage.parentElement;

                if (!parent) {
                    return;
                }

                parent.classList.add('hc-admin-brand');

                const oldText = parent.querySelector('.hc-admin-brand-text');

                if (oldText) {
                    oldText.remove();
                }

                const text = document.createElement('div');
                text.className = 'hc-admin-brand-text';
                text.innerHTML = `
                    <div class="hc-admin-brand-name">Huacheng</div>
                    <div class="hc-admin-brand-china">华诚建材</div>
                    <div class="hc-admin-brand-subtitle">Building Materials</div>
                `;

                parent.appendChild(text);
            });
        }

        setupHuachengBrand();

        const observer = new MutationObserver(function () {
            setupHuachengBrand();
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });

        document.addEventListener('livewire:navigated', setupHuachengBrand);
        document.addEventListener('livewire:update', setupHuachengBrand);
    });
</script>
