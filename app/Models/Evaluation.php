<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    //
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
