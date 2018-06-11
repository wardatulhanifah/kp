<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'type', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function biodata()
    {
        if ($this->type == 1) {
            return $this->hasOne(Dosen::class, 'id', 'id');
        } elseif ($this->type == 2) {
            return $this->hasOne(Mahasiswa::class, 'id', 'id');
        } elseif ($this->type == 3) {
            return $this->hasOne(Tendik::class, 'id', 'id');
        }
    }
}
