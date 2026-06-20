<div class="hc-admin-topbar-right">
    <div class="hc-admin-topbar-status">
        <span class="hc-admin-topbar-status-dot"></span>

        <div class="hc-admin-topbar-status-copy">
            <span class="hc-admin-topbar-status-title">Huacheng Admin</span>
            <span class="hc-admin-topbar-status-subtitle">华诚建材</span>
        </div>
    </div>
</div>

<style>
    .hc-admin-topbar-right {
        display: flex !important;
        align-items: center !important;
        margin-right: 12px !important;
    }

    .hc-admin-topbar-status {
        display: inline-flex !important;
        align-items: center !important;
        gap: 11px !important;
        padding: 8px 13px !important;
        border-radius: 999px !important;
        border: 1px solid rgba(46, 167, 224, .25) !important;
        background:
            radial-gradient(circle at 20% 20%, rgba(46, 167, 224, .22), transparent 32%),
            linear-gradient(135deg, rgba(15, 23, 42, .92), rgba(15, 23, 42, .72)) !important;
        box-shadow:
            0 12px 32px rgba(0, 0, 0, .22),
            inset 0 1px 0 rgba(255, 255, 255, .08) !important;
        backdrop-filter: blur(16px) !important;
    }

    .hc-admin-topbar-status-dot {
        width: 10px !important;
        height: 10px !important;
        border-radius: 999px !important;
        background: #22c55e !important;
        box-shadow:
            0 0 0 5px rgba(34, 197, 94, .12),
            0 0 18px rgba(34, 197, 94, .55) !important;
        animation: hcAdminOnlinePulse 1.8s ease-in-out infinite;
    }

    .hc-admin-topbar-status-copy {
        display: flex !important;
        flex-direction: column !important;
        gap: 2px !important;
        min-width: 0 !important;
    }

    .hc-admin-topbar-status-title {
        color: #f8fafc !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 900 !important;
        white-space: nowrap !important;
    }

    .hc-admin-topbar-status-subtitle {
        color: #2EA7E0 !important;
        font-size: 12px !important;
        line-height: 1 !important;
        font-weight: 950 !important;
        letter-spacing: .12em !important;
        white-space: nowrap !important;
        text-shadow: 0 0 16px rgba(46, 167, 224, .42) !important;
    }

    .fi-topbar {
        border-bottom: 1px solid rgba(148, 163, 184, .08) !important;
    }

    .fi-topbar button[aria-label*="user" i],
    .fi-topbar button[aria-label*="account" i],
    .fi-topbar button:has(img),
    .fi-topbar button:has(.fi-avatar),
    .fi-topbar .fi-avatar,
    .fi-topbar [class*="avatar"] {
        border-radius: 999px !important;
    }

    .fi-topbar .fi-avatar,
    .fi-topbar [class*="avatar"] {
        box-shadow:
            0 0 0 3px rgba(46, 167, 224, .22),
            0 10px 24px rgba(0, 0, 0, .28) !important;
    }

    .fi-topbar button {
        transition:
            transform .22s ease,
            box-shadow .22s ease,
            background-color .22s ease !important;
    }

    .fi-topbar button:hover {
        transform: translateY(-1px) !important;
    }

    @keyframes hcAdminOnlinePulse {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(.78);
            opacity: .72;
        }
    }

    @media (max-width: 768px) {
        .hc-admin-topbar-status-copy {
            display: none !important;
        }

        .hc-admin-topbar-status {
            padding: 10px !important;
        }

        .hc-admin-topbar-right {
            margin-right: 8px !important;
        }
    }
</style>
