<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tendik extends Model
{
    protected $table = 'tendik';
    protected $dates = ['tanggal_lahir'];
}
