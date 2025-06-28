<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $isProduction = $this->app->isProduction();

        // Improve security in production environments.
        DB::prohibitDestructiveCommands($isProduction);
        URL::forceHttps($isProduction);

        // Check for Eloquent inefficiencies in development only.
        Model::shouldBeStrict(! $isProduction);
    }
}
