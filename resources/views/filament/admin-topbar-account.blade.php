@php
    $user = auth()->user();
    $initial = strtoupper(mb_substr($user?->name ?: 'A', 0, 1));
@endphp

@if($user)
    <style>
        .hc-admin-account {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 12px;
            padding: 6px 8px 6px 10px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.82);
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            backdrop-filter: blur(10px);
        }

        .hc-admin-account-avatar {
            width: 30px;
            height: 30px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #0f172a;
            color: #ffffff;
            font-size: 12px;
            font-weight: 800;
            flex: 0 0 auto;
        }

        .hc-admin-account-text {
            display: flex;
            flex-direction: column;
            line-height: 1.15;
            min-width: 0;
        }

        .hc-admin-account-name {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #0f172a;
            font-size: 12px;
            font-weight: 800;
        }

        .hc-admin-account-email {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #64748b;
            font-size: 10px;
            font-weight: 600;
            margin-top: 2px;
        }

        .hc-admin-logout {
            height: 30px;
            border: 0;
            border-radius: 999px;
            background: #2EA7E0;
            color: #ffffff;
            padding: 0 12px;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
            white-space: nowrap;
        }

        .hc-admin-logout:hover {
            background: #1B8DC2;
            transform: translateY(-1px);
        }

        .dark .hc-admin-account {
            border-color: rgba(255, 255, 255, 0.12);
            background: rgba(15, 23, 42, 0.78);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.26);
        }

        .dark .hc-admin-account-avatar {
            background: #2EA7E0;
        }

        .dark .hc-admin-account-name {
            color: #ffffff;
        }

        .dark .hc-admin-account-email {
            color: rgba(255, 255, 255, 0.62);
        }

        @media (max-width: 768px) {
            .hc-admin-account-text {
                display: none;
            }

            .hc-admin-account {
                gap: 6px;
                padding: 5px;
            }

            .hc-admin-logout {
                padding: 0 10px;
            }
        }
    </style>

    <div class="hc-admin-account">
        <div class="hc-admin-account-avatar">
            {{ $initial }}
        </div>

        <div class="hc-admin-account-text">
            <span class="hc-admin-account-name">
                {{ $user->name ?? 'Admin' }}
            </span>

            <span class="hc-admin-account-email">
                {{ $user->email }}
            </span>
        </div>

        <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
            @csrf
            <button type="submit" class="hc-admin-logout">
                Logout
            </button>
        </form>
    </div>
@endif
