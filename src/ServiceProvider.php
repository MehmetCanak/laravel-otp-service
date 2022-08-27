<?php

namespace web36\Otp;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Throwable;

class ServiceProvider extends BaseServiceProvider{
    // public function boot(){
    //     $this->publishes([
    //         __DIR__.'/config/otp.php' => config_path('otp.php'),
    //     ]);
    // }
    // public function register(){
    //     $this->mergeConfigFrom(
    //         __DIR__.'/config/otp.php', 'otp'
    //     );
    //     $this->app->singleton('otp', function($app){
    //         return new Otp();
    //     });
    // }

}