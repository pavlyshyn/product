<?php

namespace Pavlyshyn\Product;

use Illuminate\Support\ServiceProvider as LServiceProvider;

class ServiceProvider extends LServiceProvider {

    public function boot() {

        $this->publishes([__DIR__ . '/../config/' => config_path() . "/"], 'config');
        $this->publishes([__DIR__ . '/../database/' => base_path("database")], 'database');
        $this->publishes([__DIR__ . '/../lang' => resource_path('lang/vendor/product')]);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    public function register() {
        
    }

}
