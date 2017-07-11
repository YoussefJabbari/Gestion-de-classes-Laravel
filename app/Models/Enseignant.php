<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    //
    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }

    public function demandes()
    {
        return $this->hasManyThrough(Demande::class, Classe::class    ,   'enseignant_id', 'classe_id', 'id');
    }
    
    
    
    //
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
