<?php


namespace App\Migracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Supervisor extends Model
{
    protected $fillable = ['nombre', 'cargo', 'tipo_documento', 'numero_documento', 'lugar_expedicion_documento'];
    protected $table = 'supervisores';

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setCargoAttribute($value)
    {
        $this->attributes['cargo'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }


    public function validar($datos)
    {
        $reglas = [
            'nombre' => 'required',
            'cargo' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required|numeric|unique:supervisores',
            'lugar_expedicion_documento' => 'required'
        ];

        if ($this->exists) {
            $reglas['numero_documento'] .= ',numero_documento,' . $this->id;
        }

        $mensajes = [
            'numero_documento.unique' => 'Ya existe un supervisor registrado con este número de documento',
            'numero_documento.numeric' => 'El campo número de documento debe ser un número',
        ];

        $validador = Validator::make($datos, $reglas, $mensajes);

        if ($validador->passes()) {
            return true;
        }

        $this->errores = $validador->errors();
        return false;
    }
}
