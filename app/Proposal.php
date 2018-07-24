<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'kp';

    public function instansi()
    {
        return $this->belongsTo('App\Instansi', 'instansi_id', 'id');
    }
    public function status_p()
    {
        return $this->belongsTo('App\StatusProposal', 'status_proposal','id');
    }
    public function mahasiswas()
    {
    	return $this->hasMany('App\MahasiswaKP','id_proposal','id');
    }
}
