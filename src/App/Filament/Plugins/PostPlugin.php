<?php

namespace Lines\News\App\Filament\Plugins;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Lines\News\App\Filament\Resources\PostResource;

class PostPlugin implements Plugin
{
    public function getId(): string
    {
        return 'news';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            PostResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
