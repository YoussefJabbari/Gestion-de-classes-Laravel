<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //
    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'publiees');
    }
    
    
    
    //
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
}
