<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travail extends Model
{
    //
    protected $fillable = ['devoir_id' , 'etudiant_id' , 'url_travail' , 'note_travail'];
    
    
    public function devoir()
    {
        return $this->belongsTo(Devoir::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
