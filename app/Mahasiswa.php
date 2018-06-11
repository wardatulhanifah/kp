<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    protected $table = 'mahasiswa';

    protected $dates = ['tanggal_lahir'];


    public function user()
    {
    	return $this->belongsTo(User::class, 'id');
    }

}
