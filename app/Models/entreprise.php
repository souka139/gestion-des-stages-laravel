<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entreprise extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_entreprise',
        'adress_entreprise',
        'tel_entreprise',
        'ville_entreprise',
    ];

    public function stages(){
        return $this->belongsToMany(stage::class);
    }
}
