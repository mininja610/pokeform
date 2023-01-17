<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    
     protected $fillable = [
                    'title',
                    'content',
                    'match',
                    
                    ];
                    
    public function pokemons()
{
    return $this->belongsToMany(Pokemon::class);
}
}
