<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class Worker extends Model implements AuthenticatableContract
{
    use HasFactory, hasApiTokens, Authenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'position',
        'api_token'
        ];
    protected $hidden = [
        'password',
    ];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }

    protected static function booted()
    {
        static::deleting(function ($worker) {
            $worker->tickets()->delete();
        });
    }


    // Add custom event mappings
    protected $dispatchesEvents = [
        'workerRegistered' => \App\Events\WorkerRegistered::class,
    ];

    protected $observables = ['registered', 'loggedin', 'loggedout'];

    // Example method to trigger the custom event
    public function fireCustomModelEvent($event, $halt = true)
    {
        if (!isset(static::$dispatcher)) {
            return true;
        }

        $event = "eloquent.{$event}: " . static::class;

        $method = $halt ? 'until' : 'dispatch';

        return static::$dispatcher->$method(new \App\Events\WorkerRegistered($this));
    }

}
