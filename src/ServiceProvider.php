<?php

namespace web36\Otp;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;


class ServiceProvider extends BaseServiceProvider{
    
    
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->registerPublishing();
        
    }

    
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__.'/../config/pagereview.php', 'pagereview');
        $this->mergeConfigFrom($this->getConfig(), 'otp');
        $this->registerBindings();
    }


    protected function getConfig(): string
    {
        return __DIR__.'/../config/config.php';
    }
    protected function getMigrations(): string
    {
        return __DIR__.'/../database/migrations/';
    }

    protected function registerPublishing(): void
    {
        $this->publishes([$this->getConfig() => config_path('otp.php')], 'otp-config');

        // $this->publishes([__DIR__.'/../lang' => app()->langPath().'/vendor/OTP'], 'lang');

        $this->publishes([$this->getMigrations() => database_path('migrations')], 'otp-migrations');
    }

    protected function registerBindings(): void
    {
        // $this->app->singleton('token.repository', fn ($app) => new TokenRepositoryManager($app));

        // $this->app->singleton(TokenRepositoryInterface::class, fn ($app) => $app['token.repository']->driver());

        // $this->app->singleton(
        //     SMSClient::class,
        //     static function ($app) {
        //         try {
        //             return $app->make(config('otp.sms_client'));
        //         } catch (Throwable $e) {
        //             throw new SMSClientNotFoundException();
        //         }
        //     }
        // );
    }


}