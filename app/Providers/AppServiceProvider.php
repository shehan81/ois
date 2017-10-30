<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\Validation;
use App\Exceptions\CustomHandler;
use Illuminate\Contracts\Debug\ExceptionHandler;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //to inherit the default varchar length of a tbl field
        Schema::defaultStringLength(191);

        //to process translations on pre dispatch
        view()->composer(
                '*', 'App\Http\ViewComposers\TranslateComposer'
        );

        //custom vlidations
        Validator::resolver(function($translator, $data, $rules, $messages) {
            return new Validation($translator, $data, $rules, $messages);
        });
        
        //custom exceptons
        //$this->app->singleton(ExceptionHandler::class, CustomHandler::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
