<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;
use Lines\Auth\Infrastructure\Models\User;

use function Orchestra\Testbench\workbench_path;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // laravel-module-user owns the auth model, as an app's config/auth.php names it.
        config()->set('auth.providers.users.model', User::class);

        // Livewire is configured to resolve it's layout and components from the
        // default layouts and pages directory but it points to the incorrect
        // directory when developing with workbench. Let us override that.
        config()->set('livewire', [
            'component_layout' => 'workbench::layouts.app',
            'component_namespaces' => [
                'layouts' => workbench_path('resources/views/layouts'),
                'pages' => workbench_path('resources/views/pages'),
            ],
        ]);

        $this->app->register(AdminPanelProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
