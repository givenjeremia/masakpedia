<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriAsalMasakan extends Model
{
    //
    protected $table = 'kategori_asal_masakan';

    public function kategori() {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }

    public function resep() {
        return $this->hasMany('App\Resep', 'asal_id', 'id');
    }
}
