<?php

declare(strict_types=1);

namespace Lines\News;

use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class NewsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'news';

    public static string $viewNamespace = 'news';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations();
            })
            ->hasConfigFile()
            ->hasViews(static::$viewNamespace)
            ->hasTranslations()
            ->hasAssets()
            ->hasRoute('web')
            ->hasMigrations([
                'create_posts_table',
            ]);
    }

    public function packageBooted(): void
    {
        Livewire::addNamespace(
            namespace: 'news',
            classNamespace: 'Lines\\News\\App\\Livewire',
            classPath: __DIR__.'/App/Livewire',
            classViewPath: __DIR__.'/../resources/views',
        );

        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        FilamentIcon::register($this->getIcons());

        // stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__.'/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/news/{$file->getFilename()}"),
                ], 'news-stubs');
            }
        }
    }

    protected function getAssetPackageName(): ?string
    {
        return 'lines/news';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('news', __DIR__ . '/../resources/dist/components/news.js'),
            // Css::make('news-styles', __DIR__ . '/../resources/dist/news.css'),
            // Js::make('news-scripts', __DIR__ . '/../resources/dist/news.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }
}
