<?php namespace Bostick\Badmin;

use Illuminate\Support\ServiceProvider;

class BadminServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        // $this->handleConfigs();
        // $this->handleMigrations();
        $this->handleViews();
        // $this->handleTranslations();
        $this->handleRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/badmin.php';

        $this->publishes([$configPath => config_path('badmin.php')]);

        $this->mergeConfigFrom($configPath, 'badmin');
    }

    private function handleTranslations() {

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'badmin');
    }

    private function handleViews() {

        $this->loadViewsFrom(__DIR__.'/../../../views', 'badmin');

        $this->publishes([__DIR__.'/../../../views' => base_path('resources/views/bostick/badmin')]);
    }

    private function handleMigrations() {

        $this->publishes([__DIR__ . '/../migrations' => base_path('database/migrations')]);
    }

    private function handleRoutes() {

        include __DIR__.'/../../../routes.php';
    }
}
