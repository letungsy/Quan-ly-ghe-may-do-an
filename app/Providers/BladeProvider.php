<?php

namespace App\Providers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class BladeProvider extends ServiceProvider


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
      Blade::if('chuyenquyen',function(){
       if (session()->get('chuyenquyen')) {
          return true;
       }
       return false;
      });
    }
}
