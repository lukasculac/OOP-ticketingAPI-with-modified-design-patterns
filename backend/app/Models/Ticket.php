<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Ticket extends Model
{
    use HasFactory;

    // Overriding the save method to modify access design pattern
    public function save(array $options = [])
    {
        // Adding custom logic before saving
        Log::channel('custom')->info('New ticket saved to database!');

        // Calling the parent save method to keep original functionality also
        return parent::save($options);
    }

    protected $fillable = [
        'worker_id',
        'department',
        'message',
        'response',
        'status',
        'priority',
        'opened_at',
        'closed_at',
    ];

    protected $observables = ['openned', 'closed', 'eddited', 'priorityMedium', 'priorityHigh'];


    public function worker(){
        return $this->belongsTo(Worker::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    protected static function booted()
    {
        static::deleting(function ($ticket) {
            $ticket->files()->delete();
        });
    }
}
