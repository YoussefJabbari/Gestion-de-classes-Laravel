<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //
    public function devoirs()
    {
        return $this->hasMany(Devoir::class);
    }
    
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    
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



    //
    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class,'evaluations');
    }
    
    public function annonces()
    {
        return $this->belongsToMany(Annonce::class, 'publiees');
    }



    //
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
    
    
    
    
    //
    public function travail($etudiant_id, $devoir_id)
    {
        return $this->hasManyThrough(Travail::class, Devoir::class       ,      'classe_id','devoir_id','id')->where(['etudiant_id' => $etudiant_id, 'devoir_id' => $devoir_id])->first();
    }
}
