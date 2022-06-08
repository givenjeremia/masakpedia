<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    //
    protected $table = 'resep';
    public function useraktivitasresep() {
        return $this->hasMany('App\UserAktivitasResep','resep_id','id');
    }

    public function kategorijenismasakan() {
        return $this->belongsTo('App\KategoriJenisMasakan','jenis_id');
    }

    public function kategoriasalmasakan() {
        return $this->belongsTo('App\KategoriAsalMasakan','asal_id');
    }

    public function bahan() {
        return $this->hasMany('App\Bahan','resep_id', 'id');
    }

    public function langkah() {
        return $this->hasMany('App\Langkah','resep_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
}
