<?php

namespace App\Migracion;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $fillable = ['contratista_id', 'formacion', 'titulo', 'institucion', 'estado'];

    public function contratista()
    {
        return $this->belongsTo('App\Contratista');
    }

    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setInstitucionAttribute($value)
    {
        $this->attributes['institucion'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }


    public static function getPostEstudios($datos = [])
    {
        $estudios = [];

        if ( count($datos ) ) {
            for ($i = 0; $i < count($datos['formacion']); $i++)
            {
                if( !empty($datos['formacion'][$i]) or !empty($datos['titulo'][$i]) or !empty($datos['institucion'][$i])){
                    $estudio = new Estudio();

                    $estudio->formacion = $datos['formacion'][$i];
                    $estudio->titulo = $datos['titulo'][$i];
                    $estudio->institucion = $datos['institucion'][$i];
                    $estudio->estado = $datos['estado'][$i];

                    $estudios[] = $estudio;
                }
            }
        }

        return $estudios;
    }
}
