<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MahasiswaKP extends Model
{
    protected $table = 'mahasiswa_kp';

    public function mahasiswa_kp(){
    	return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
