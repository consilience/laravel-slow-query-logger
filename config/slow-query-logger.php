<?php

return [
    /**
     * log when you are on these environments
     */
    'enabled' => env('LARAVEL_SLOW_QUERY_LOGGER_ENABLED', false),

    /**
     * log when you are on these environments
     */
    'channel' => env('LARAVEL_SLOW_QUERY_LOGGER_CHANNEL', 'single'),

    /**
     * Log level to use.
     */
    'level' => env('LARAVEL_SLOW_QUERY_LOGGER_LEVEL', 'debug'),

    /**
     * Log the bindings separately in the context.
     */
    'show-bindings' => env('LARAVEL_SLOW_QUERY_LOGGER_SHOW_BINDINGS', false),

    /**
     * Substitute the bindings in the placeholders of the query.
     */
    'replace-bindings' => env('LARAVEL_SLOW_QUERY_LOGGER_REPLACE_BINDINGS', false),

    /**
     * log all sql queries that are slower than a threashold milli-seconds
     */
    'threshold-ms' => env('LARAVEL_SLOW_QUERY_LOGGER_THRESHOLD_MS', 700),
];