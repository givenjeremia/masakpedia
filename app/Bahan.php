<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    //
    protected $table = 'bahan';

    public function resep() {
        return $this->belongsTo('App\Resep','resep_id');
    }
}
