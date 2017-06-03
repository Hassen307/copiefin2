<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
       Schema::defaultStringLength(191);
       try {
       $a=Permission::all()->except([1,2,3]);
         foreach ($a as $per_name) {
         $permissi[]=$per_name->name;
        }
         
        view()->share('permissi',$permissi);
        } catch (\Exception $e) {
    
}
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
