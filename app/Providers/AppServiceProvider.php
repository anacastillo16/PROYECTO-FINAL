<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        
        if (config('database.default') === 'sqlite') {
            $databasePath = database_path('database.sqlite');
            if (!file_exists($databasePath)) {
                File::put($databasePath, '');
            }
            DB::statement("PRAGMA foreign_keys=ON");
        }
    }
}
