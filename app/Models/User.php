<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    public $incrementing = false;

    protected $fillable = [
        'id','role', 'email', 'password','photo','nom','prenom','date_naissance','date_inscription',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function enseignant()
    {
        return $this->hasOne(Enseignant::class, 'user_id');
    }
    
    public function etudiant()
    {
        return $this->hasOne(Etudiant::class, 'user_id');
    }
}
