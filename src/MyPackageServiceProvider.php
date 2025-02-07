<?php

namespace :uc:vendor\:uc:package;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class :uc:packageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
		    
//		    Blade::componentNamespace("CreaUdemy\\Components");
		    // Blades with classes
//		    Blade::component(ButtonComponent::class, $packageName.'::button-component');
//		    Blade::component(Master::class, $packageName.'::master');
//		    Blade::component(ModalComponent::class, $packageName.'::modal-component');
				
         $this->loadTranslationsFrom(__DIR__.'/lang', ':lc:package');
         $this->loadViewsFrom(__DIR__.'/views', ':lc:package');
         $this->loadMigrationsFrom(__DIR__.'/database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes/web.php');
		
		Factory::guessFactoryNamesUsing(function ($modelName) {
				// Ensure only package models use this resolution
				if (str_starts_with($modelName, ':uc:vendor\\:uc:package\\Models\\')) {
						return ':uc:vendor\\:uc:package\\database\\factories\\' . class_basename($modelName) . 'Factory';
				}
				
				// Default behavior for non-package models
				return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
		});
		Paginator::useBootstrapFive();
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/:lc:package.php', ':lc:package');
		    
//		    ServiceProvider::addProviderToBootstrapFile(UserDataService::class);
//		    ServiceProvider::addProviderToBootstrapFile(ComposerServiceProvider::class);
        // Register the service the package provides.
        $this->app->singleton(':lc:package', function ($app) {
            return new :uc:package;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [':lc:package'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/:lc:package.php' => config_path(':lc:package.php'),
        ], ':lc:package.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/:lc:vendor'),
        ], ':lc:package.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/:lc:vendor'),
        ], ':lc:package.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/:lc:vendor'),
        ], ':lc:package.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
