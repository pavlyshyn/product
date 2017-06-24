<?php

namespace Pavlyshyn\Product;

use Illuminate\Support\ServiceProvider as LServiceProvider;

class ServiceProvider extends LServiceProvider {

    public function boot() {

        //Указываем что пакет должен опубликовать при установке
        $this->publishes([__DIR__ . '/../config/' => config_path() . "/"], 'config');
        $this->publishes([__DIR__ . '/../database/' => base_path("database")], 'database');
        // Routing
        if (!$this->app->routesAreCached()) {
            include __DIR__ . '/routes.php';
        }
    }

    public function register() {
        
    }

}
