<?php

namespace App\Providers;

use Illuminate\Log\LogManager;
use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->extend('log', function ($service, $app) {
            if ($service instanceof LogManager) {
                $service->extend('custom', function ($logger, $config) {
                    // Get the Monolog instance
                    $monolog = $logger->getLogger();

                    // Modify the handlers
                    foreach ($monolog->getHandlers() as $handler) {
                        $handler->setFormatter(new LineFormatter(
                            "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
                            null,
                            true,
                            true
                        ));
                    }

                    return $logger;
                });
            }

            return $service;
        });
    }
}
