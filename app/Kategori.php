<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    public function kategoriasalmasakan() {
        return $this->hasMany('App\KategoriAsalMasakan', 'kategori_id','id');
    }

    public function kategorijenismasakan() {
        return $this->hasMany('App\KategoriJenisMasakan', 'kategori_id','id');
    }
}
