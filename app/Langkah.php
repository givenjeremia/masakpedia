<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langkah extends Model
{
    //
    protected $table = 'langkah';

    public function resep() {
        return $this->belongsTo('App\Resep','resep_id');
    }
}
