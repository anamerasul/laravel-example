<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Database\Connectors\NeonPostgresConnector;

class NeonDatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Override the default pgsql connector with a Neon-aware connector.
        $this->app->bind('db.connector.pgsql', function () {
            return new NeonPostgresConnector();
        });
    }
}