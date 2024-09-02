<?php

namespace App\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory as BaseFactory;
use Illuminate\Support\Facades\Log;

class CustomFactory extends BaseFactory
{
    public function definition()
    {
        // TODO: Implement definition() method.
    }

    public function customCreate(array $attributes = [], ?Worker $parent = null)
    {


        Log::channel('custom')->info('Seeder '. $this->model . ' activated! ');
        return parent::create($attributes, $parent);
    }


}
