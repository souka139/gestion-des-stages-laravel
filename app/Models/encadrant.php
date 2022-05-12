<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class encadrant extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_encadrant',
        'prenom_encadrant',
        'stage_id',
        'soutenance',
        'note',
    ];

    public function stages(){
        return $this->hasMany(stage::class);
    }
    public static function getNotes(){
        $records=DB::table('encadrants')->join('stages','encadrants.stage_id','=','stages.id')->select('stages.id','stages.student1_prenom','stages.student1_nom','encadrants.note')->get()->toArray();
        return $records;
    }
}
