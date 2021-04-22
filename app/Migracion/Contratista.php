<?php

namespace App\Migracion;

use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    protected $fillable = ['cargo', 'area', 'nombre', 'email', 'telefono', 'lugar_residencia',
        'direccion', 'tipo_documento', 'numero_documento', 'fecha_nacimiento',
        'fecha_expedicion_documento', 'lugar_expedicion_documento',
        'experiencia_docente', 'experencia_laboral_area', 'observacion'];
}
