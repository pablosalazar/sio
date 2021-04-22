<?php

namespace App\Migracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Contrato extends Model
{
    protected $fillable = ['contratista_id', 'supervisor_id', 'tipo', 'numero', 'SIIF', 'novedad', 'valor', 'fecha', 'fecha_inicio', 'fecha_fin',
                            'duracion', 'programa', 'aseguradora', 'numero_poliza', 'fecha_poliza', 'CDP', 'objeto', 'forma_pago',
                            'nombre_arl', 'clasificacion_arl', 'fecha_expedicion_arl', 'nombre_eps', 'fondo_pension', 'mes_pago_aportes',
                            'banco', 'numero_cuenta'];
    
    public function contratista()
    {
        return $this->belongsTo('App\Contratista');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Migracion\Supervisor');
    }

    public function setSupervisorAttribute($value)
    {
        $this->attributes['supervisor'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setProgramaAttribute($value)
    {
        $this->attributes['programa'] = ucfirst(mb_convert_case($value, MB_CASE_LOWER, "UTF-8"));
    }

    public function setAseguradoraAttribute($value)
    {
        $this->attributes['aseguradora'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setNombreArlAttribute($value)
    {
        $this->attributes['nombre_arl'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setNombreEpsAttribute($value)
    {
        $this->attributes['nombre_eps'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setFondoPensionAttribute($value)
    {
        $this->attributes['fondo_pension'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setBancoAttribute($value)
    {
        $this->attributes['banco'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function getValorFormateadoAttribute() {
        return $this->valor?number_format($this->valor, 0, ',', '.'):"";
    }

    public function getValorMensualidadFormateadoAttribute() {
        return $this->valor_mensualidad?number_format($this->valor_mensualidad, 0, ',', '.'):"";
    }

    public function esVigente() {

        $fecha_fin_contrato = strtr($this->fecha_fin, '/', '-');
        $hoy = date('d-m-Y');
        if(strtotime($fecha_fin_contrato) > strtotime($hoy)){
           return true;
        }
        return false;
    }

    public function validar($datos)
    {
        $reglas = [
            'tipo' => 'required',
            'numero' => 'required|numeric',
            'SIIF' => 'required|numeric',
            'fecha' => 'required|date_format:"d/m/Y"',
            'fecha_inicio' => 'required|date_format:"d/m/Y"',
            'fecha_fin' => 'required|date_format:"d/m/Y"|after:fecha_inicio',
            'valor' => 'required|numeric|min:0|max:100000000',
            'supervisor_id' => 'required'
        ];

        $mensajes = [
            'numero.required' => 'El campo número es requerido',
            'numero.numeric' => 'El campo número no puede contener letras',
            'SIIF.required' => 'El campo SIIF es requerido',
            'SIIF.numeric' => 'El campo SIIF debe ser un número',
            'valor.numeric' => 'El campo valor del contrato debe ser un número',
            'supervisor.required' => 'El nombre del supervisor es requerido'
        ];


        $validador = Validator::make($datos, $reglas, $mensajes);

        if ($validador->passes()) {
            return true;
        }

        $this->errores = $validador->errors();
        return false;
    }
}
