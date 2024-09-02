<?php

namespace App\Logging;

use Illuminate\Log\Logger;
use Monolog\Formatter\LineFormatter;

class CustomizeFormatter
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke(Logger $logger)
    {
        // Retrieve the underlying Monolog instance
        $monolog = $logger->getLogger();

        foreach ($monolog->getHandlers() as $handler) {
            $handler->setFormatter(new CustomFormatter());
        }
    }
}
