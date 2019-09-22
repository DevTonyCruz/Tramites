<?php

namespace App\Providers;

use App\Models\Configurations;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalVariablesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('configuration')){
            $config=Configurations::all();
            foreach($config as $configurations){
                View::share($configurations->alias, $configurations->value);
            }
        }
    }
}
