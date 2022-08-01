<?php

return [
    /**
     * Enable or disable in different environments.
     */
    'enabled' => env('LARAVEL_SLOW_QUERY_LOGGER_ENABLED', false),

    /**
     * Which log channel to send the logs to.
     */
    'channel' => env('LARAVEL_SLOW_QUERY_LOGGER_CHANNEL', 'daily'),

    /**
     * Log level to use when logging.
     */
    'level' => env('LARAVEL_SLOW_QUERY_LOGGER_LEVEL', 'debug'),

    /**
     * Enable to log the bindings in the log context.
     */
    'show-bindings' => env('LARAVEL_SLOW_QUERY_LOGGER_SHOW_BINDINGS', false),

    /**
     * Enable to substitute the bindings in the placeholders of the query.
     */
    'replace-bindings' => env('LARAVEL_SLOW_QUERY_LOGGER_REPLACE_BINDINGS', false),

    /**
     * Log all SQL queries that are slower than this threshold in milliseconds.
     * Use 0 to log all queries regardless of time to execute.
     */
    'threshold-ms' => env('LARAVEL_SLOW_QUERY_LOGGER_THRESHOLD_MS', 700),
];
