<?php

namespace Consilience\Laravel\SlowQueryLogger;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Throwable;

class SlowQueryLoggerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/slow-query-logger.php' => config_path('slow-query-logger.php'),
            ], 'config');
        }

        $this->setupListener();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/slow-query-logger.php',
            'slow-query-logger'
        );
    }

    /**
     * The listener that subscribes to query execution events.
     */
    private function setupListener()
    {
        if (!config('slow-query-logger.enabled')) {
            return;
        }

        DB::listen(function (QueryExecuted $queryExecuted) {
            $timeMs = $queryExecuted->time;

            $thresholdMs = config('slow-query-logger.threshold-ms', -1);

            if ($thresholdMs < 0 || $timeMs < $thresholdMs) {
                return;
            }

            $sql = $queryExecuted->sql;
            $bindings = $queryExecuted->bindings;

            try {
                if (config('slow-query-logger.replace-bindings')) {
                    foreach ($bindings as $bindingValue) {
                        $position = strpos($sql, '?');

                        if ($position !== false) {
                            $sql = substr_replace($sql, "'{$bindingValue}'", $position, 1);
                        }
                    }
                }

                Log::channel(config('slow-query-logger.channel'))
                    ->log(
                        config('slow-query-logger.level', 'debug'),
                        sprintf('SQL %.3f mS: %s', $timeMs, $sql),
                        config('slow-query-logger.show-bindings') ? ['bindings' => $bindings] : []
                    );
            } catch (Throwable) {
                // Be quiet on errors.
            }
        });
    }
}
