<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Huacheng')
            ->brandLogo(asset('images/Logo.png'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('favicon.png'))
            ->colors([
                'primary' => Color::Sky,
            ])
            ->navigationGroups([
                NavigationGroup::make('Landing Page')
                    ->collapsible(false),

                NavigationGroup::make('Konten Website')
                    ->collapsible(false),

                NavigationGroup::make('Katalog Produk')
                    ->collapsible(false),
            ])
            ->renderHook(
                'panels::head.end',
                fn (): string => view('filament.admin-brand')->render()
            )
            ->renderHook(
                'panels::body.start',
                fn (): string => view('partials.huacheng-loader')->render()
            )
            ->renderHook(
                'panels::head.end',
                fn (): string => view('filament.huacheng-topbar-polish')->render()
            )
            ->renderHook(
                'panels::head.end',
                fn (): string => view('filament.huacheng-admin-login-theme')->render()
            )
            ->renderHook(
                'panels::head.end',
                fn (): string => view('filament.huacheng-notification-position')->render()
            )
            ->discoverResources(
                in: app_path('Filament/Resources'),
                for: 'App\\Filament\\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Pages'),
                for: 'App\\Filament\\Pages'
            )
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(
                in: app_path('Filament/Widgets'),
                for: 'App\\Filament\\Widgets'
            )
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
