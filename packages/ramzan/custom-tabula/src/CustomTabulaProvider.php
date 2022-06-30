<?php

namespace Ramzan\CustomTabula;

use Illuminate\Support\ServiceProvider;

class CustomTabulaProvider extends ServiceProvider {

    public function boot(){
    }

    public function register() {

        $this->app->singleton(CustomTabula::class, function() {
            return new CustomTabula();
        });

    }
}
