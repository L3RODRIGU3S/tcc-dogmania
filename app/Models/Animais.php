<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animais extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'registro', 'email'];

    public function exames(){
        return $this->hasMany(Exames::class);
    }
}
