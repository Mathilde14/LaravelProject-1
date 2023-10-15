<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $guarded = [''];

    //1 classe n'appartient pas a plusieurs niveau

    //Dans un niveau on peut avoir plusieurs classes

    public function Niveau(){
        return $this->belongsTo(Niveaux::class);
    }
}
