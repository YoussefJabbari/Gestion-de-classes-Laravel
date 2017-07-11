<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //
    public function evaluation($classe_id)
    {
        return $this->hasOne(Evaluation::class)->where('classe_id', $classe_id)->first();
    }
    
    public function travail($devoir_id)
    {
        if(count($this->hasMany(Travail::class)->where('devoir_id', $devoir_id)) != 0)
        {
            return $this->hasMany(Travail::class)->where('devoir_id', $devoir_id)->first();
        }
        else
        {
            
        }
    }
    
    
    
    
    //
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function travails()
    {
        return $this->hasMany(Travail::class);
    }



    //
    public function classes()
    {
        return $this->belongsToMany(Classe::class,'evaluations');
    }

    public function devoirs()
    {
        return $this->belongsToMany(Devoir::class);
    }



    //
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
