<?php

namespace App\Events;

use App\Models\Worker;
use Illuminate\Queue\SerializesModels;

class WorkerRegistered
{
    use SerializesModels;

    public $worker;

    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }

}
