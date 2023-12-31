<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exames extends Model
{
    use HasFactory;

    public function animais(){
        return $this->belongsTo(Animais::class);
    }
}
