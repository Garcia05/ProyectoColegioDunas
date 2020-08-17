<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    protected $table = 'cursos';
    public $timestamps = false;
    public function scopeName($query, $name){
        if($name)
            return $query->where('nombre_curso','LIKE',"%$name%");
    }
    public function scopeGrado($query, $grado){
        if($grado)
            return $query->where('grado','LIKE',"%$grado%");
    }
    public function scopeAnio($query, $anio){
        if($anio)
            return $query->where('anio','LIKE',"%$anio%");
    }
    //$cursos = Curso::where('nombre_curso','LIKE',$name)->where('grado','LIKE',$grade)->where('anio','LIKE',$anio)->get();
}
