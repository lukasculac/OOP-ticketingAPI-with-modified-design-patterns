<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class CustomFormatter extends LineFormatter
{
    /**
     * Customize the format with a specific output pattern.
     */
    public function __construct()
    {
        // Define a custom log format pattern
        //$format = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
        $format = "[%datetime%] log : %message%\n";

        parent::__construct($format, 'd-m-y H:i:s', true, true);
    }
}
