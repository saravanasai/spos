<?php

namespace App\Providers;

use App\Models\Employee\Employee;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('viewpos', function ($value) {


            if (auth('web')->check()) {
                return false;
            }
            if (Employee::MANAGER === $value?->role_id) {

                return true;
            }
            if (Employee::BILLER === $value?->role_id) {
                return true;
            }
        });

        Blade::if('viewsales', function ($value) {


            if (auth('web')->check()) {
                return true;
            }
            if (Employee::MANAGER === $value?->role_id) {

                return true;
            }
            if (Employee::BILLER === $value?->role_id) {
                return true;
            }
            if (Employee::CASHIER === $value?->role_id) {
                return true;
            }
        });


        Blade::if('canviewproducts', function ($value) {

            if (Employee::MANAGER === $value?->role_id) {
                return true;
            }
            if (auth('web')->check()) {
                return true;
            }
            return false;
        });
    }
}
