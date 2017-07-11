<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devoir extends Model
{
    //
    public function formats()
    {
        return $this->hasMany(Format::class);
    }
    
    public function travails()
    {
        return $this->hasMany(Travail::class);
    }



    //
    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }
    
    
    
    //
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
