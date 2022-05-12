<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichier extends Model
{
    use HasFactory;
    
protected $fillable=[
    'student_id',
    'rapport_prv',
    'rapport_crv',
    'presentation',
    'attestation',
    'fiche_ev',
];

public function users(){
    return $this->belongsTo(User::class);
}

public function stages(){
    return $this->belongsTo(stage::class);
}
}
