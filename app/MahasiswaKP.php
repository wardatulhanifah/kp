<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class MahasiswaKP extends Model
{
    protected $table = 'mahasiswa_kp';

    public function mahasiswa_kp(){
    	return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');

    }
     public function instansi()
    {
        return $this->belongsTo('App\Instansi');
    }

    public function proposal()
    {
        return $this->belongsTo('App\Proposal','id_proposal', 'id');
    }

}
