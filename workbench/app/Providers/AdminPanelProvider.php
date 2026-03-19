<?php

declare(strict_types=1);

namespace Workbench\App\Providers;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Lines\News\App\Filament\Plugins\PostPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugin(PostPlugin::make())
            ->pages([
                Dashboard::class,
            ])
            ->widgets([
                accountwidget::class,
                filamentinfowidget::class,
            ])
            ->middleware([
                encryptcookies::class,
                addqueuedcookiestoresponse::class,
                startsession::class,
                authenticatesession::class,
                shareerrorsfromsession::class,
                verifycsrftoken::class,
                substitutebindings::class,
                disablebladeiconcomponents::class,
                dispatchservingfilamentevent::class,
            ])
            ->authmiddleware([
                authenticate::class,
            ]);
    }
}
