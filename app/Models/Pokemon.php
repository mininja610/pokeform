<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    
    protected $table = 'pokemons';
    
    // 初期値の定義
    protected $attributes = [
        'hp' => '0',
        'attack_power' => '0',
        'defensive_power' => '0',
        'special_attack_power' => '0',
        'special_defensive_power' => '0',
        'speed' => '0',
        'total' => '0',
    ];
    
    protected $fillable = [
                    'name',
                    'primary_type',
                    'secondary_type',
                    'hp',
                    'attack_power',
                    'defensive_power',
                    'special_attack_power',
                    'special_defensive_power',
                    'speed',
                    'total'
                    ];
                    
    public function parties()
{
    return $this->belongsToMany(Party::class);
}
    public function moves()
{
    return $this->belongsToMany(Move::class);
}
    public function user()
{
    return $this->belongsTo(User::class);
}                
}

