<?php

namespace web36\Otp;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;


class ServiceProvider extends BaseServiceProvider{
    
    
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            $this->getConfig() => config_path('otp.php'),
        ], 'otp-config');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'otp-migrations');
        
    }

    
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__.'/../config/pagereview.php', 'pagereview');
        $this->mergeConfigFrom($this->getConfig(), 'otp');
    }

    protected function getConfig(): string
    {
        return __DIR__.'/../config/config.php';
    }

}