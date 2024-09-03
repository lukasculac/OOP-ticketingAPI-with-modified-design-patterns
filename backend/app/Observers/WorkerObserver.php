<?php

namespace App\Observers;

use App\Models\Worker;
use Illuminate\Support\Facades\Log;

class WorkerObserver
{

    public function registered(Worker  $worker):void
    {
        Log::channel('custom')->info('Worker '. $worker->id . ' REGISTERED ');
    }

    public function loggedin($model)
    {
        if ($model instanceof \App\Models\Worker) {
            Log::channel('custom')->info('Worker '. $model->id . ' LOGGED IN ');
        } elseif ($model instanceof \App\Models\Agent) {
            Log::channel('custom')->info('Agent '. $model->id . ' LOGGED IN ');
        }
    }

    public function loggedout($model):void
    {
        if ($model instanceof \App\Models\Worker) {
            Log::channel('custom')->info('Worker '. $model->id . ' LOGGED OUT ');
        } elseif ($model instanceof \App\Models\Agent) {
            Log::channel('custom')->info('Agent '. $model->id . ' LOGGED OUT ');
        }
    }



    /**
     * Handle the Worker "created" event.
     */
    public function created(Worker $worker): void
    {
        //Log::channel('custom')->info('Worker '. $worker->id . ' registered ');
    }

    /**
     * Handle the Worker "updated" event.
     */
    public function updated(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "deleted" event.
     */
    public function deleted(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "restored" event.
     */
    public function restored(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "force deleted" event.
     */
    public function forceDeleted(Worker $worker): void
    {
        //
    }
}
