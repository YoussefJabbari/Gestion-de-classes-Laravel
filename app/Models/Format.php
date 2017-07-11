<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    //
    public function devoir()
    {
        return $this->belongsTo(Devoir::class);
    }
}
