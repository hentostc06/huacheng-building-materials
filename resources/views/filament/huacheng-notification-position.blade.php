<style>
    .hc-admin-notification-stack {
        position: fixed !important;
        top: auto !important;
        left: auto !important;
        right: 1.25rem !important;
        bottom: 1.25rem !important;
        z-index: 999999 !important;
        display: flex !important;
        width: min(420px, calc(100vw - 2rem)) !important;
        max-width: calc(100vw - 2rem) !important;
        flex-direction: column !important;
        align-items: flex-end !important;
        justify-content: flex-end !important;
        gap: .75rem !important;
        pointer-events: none !important;
        transform: none !important;
        margin: 0 !important;
    }

    .hc-admin-notification-stack > * {
        width: 100% !important;
        max-width: 420px !important;
        pointer-events: auto !important;
    }

    .hc-admin-notification-stack .fi-no-notification {
        width: 100% !important;
        overflow: hidden !important;
        border-radius: 1.25rem !important;
        border: 1px solid rgba(56, 189, 248, .28) !important;
        background: linear-gradient(135deg, #0f172a 0%, #082f49 58%, #0c4a6e 100%) !important;
        color: #ffffff !important;
        box-shadow:
            0 22px 55px rgba(15, 23, 42, .28),
            0 0 0 1px rgba(255, 255, 255, .05) inset !important;
        backdrop-filter: blur(16px) !important;
    }

    html.dark .hc-admin-notification-stack .fi-no-notification {
        border-color: rgba(125, 211, 252, .38) !important;
        background: linear-gradient(135deg, #075985 0%, #0c4a6e 48%, #082f49 100%) !important;
        box-shadow:
            0 24px 60px rgba(0, 0, 0, .48),
            0 0 0 1px rgba(255, 255, 255, .08) inset !important;
    }

    .hc-admin-notification-stack .fi-no-notification-title {
        color: #ffffff !important;
        font-weight: 800 !important;
        letter-spacing: .01em !important;
    }

    .hc-admin-notification-stack .fi-no-notification-body,
    .hc-admin-notification-stack .fi-no-notification-date {
        color: rgba(226, 232, 240, .86) !important;
    }

    .hc-admin-notification-stack .fi-no-notification-icon {
        color: #7dd3fc !important;
    }

    .hc-admin-notification-stack .fi-no-notification button,
    .hc-admin-notification-stack .fi-no-notification svg {
        color: rgba(255, 255, 255, .82) !important;
    }

    .hc-admin-notification-stack .fi-no-notification.fi-color-success,
    .hc-admin-notification-stack .fi-no-notification:has(.fi-color-success) {
        border-color: rgba(52, 211, 153, .55) !important;
    }

    .hc-admin-notification-stack .fi-no-notification.fi-color-warning,
    .hc-admin-notification-stack .fi-no-notification:has(.fi-color-warning) {
        border-color: rgba(251, 191, 36, .60) !important;
    }

    .hc-admin-notification-stack .fi-no-notification.fi-color-danger,
    .hc-admin-notification-stack .fi-no-notification:has(.fi-color-danger) {
        border-color: rgba(248, 113, 113, .65) !important;
    }

    @media (max-width: 640px) {
        .hc-admin-notification-stack {
            right: .75rem !important;
            bottom: .75rem !important;
            width: calc(100vw - 1.5rem) !important;
        }

        .hc-admin-notification-stack > * {
            max-width: 100% !important;
        }
    }
</style>

<script>
    (function () {
        function markFilamentNotificationStack() {
            document.querySelectorAll('.fi-no-notification').forEach(function (notification) {
                let parent = notification.parentElement;
                let fixedParent = null;

                while (parent && parent !== document.body && parent !== document.documentElement) {
                    const style = window.getComputedStyle(parent);

                    if (style.position === 'fixed') {
                        fixedParent = parent;
                        break;
                    }

                    parent = parent.parentElement;
                }

                if (fixedParent) {
                    fixedParent.classList.add('hc-admin-notification-stack');
                }
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', markFilamentNotificationStack);
        } else {
            markFilamentNotificationStack();
        }

        const observer = new MutationObserver(function () {
            markFilamentNotificationStack();
        });

        observer.observe(document.documentElement, {
            childList: true,
            subtree: true
        });
    })();
</script>
