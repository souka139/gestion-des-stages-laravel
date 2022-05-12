<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stage extends Model
{
    use HasFactory;
    
 protected $fillable=[
    'student_id',
    'entreprise_id',
    'nom_encadrant',
    'prenom_encadrant',
    'sujet_titre',
    'sujet_description',
    'technologies',
    'student1_nom',
    'student1_prenom',
    'student2_nom',
    'student2_prenom',
];

public function users(){
    return $this->hasMany(User::class);
}

public function entreprises(){
    return $this->belongsToMany(entreprise::class);
}

}
