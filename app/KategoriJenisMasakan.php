<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriJenisMasakan extends Model
{
    //
    protected $table = 'kategori_jenis_masakan';
    public function kategori() {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }

    public function resep() {
        return $this->hasMany('App\Kategori', 'jenis_id', 'id');
    }
}
