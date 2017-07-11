<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    public function versions()
    {
        return $this->hasMany(Version::class)->orderBy('id','desc');
    }

    
    
    //
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
