<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';

    public function market()
    {
        return $this->hasMany(Market::class , 'client_id');
    }
}
