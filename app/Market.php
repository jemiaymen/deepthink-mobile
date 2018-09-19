<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
	protected $table = 'market';

    public function client()
    {
        return $this->belongsTo(Client::class );
    }
}
