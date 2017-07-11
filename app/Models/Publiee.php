<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publiee extends Model
{
    //
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
