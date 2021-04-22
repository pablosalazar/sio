<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        "employee_id", "supervisor_id", "area_id", "type", "number", "SIIF", "novelty", "legalization_date", "start_date", "end_date", 
        "value", "monthly_value", "source", "resource", "duration", "program", "insurance", "number_policy",
		"policy_expedition_date", "CDP", "object", "payment_method", "arl_name", "arl_rating", 
		"arl_expedition_date", "eps_name", "pension_fund", "last_month_payment_contribution", 
		"bank", "account_number"
    ];

    protected $dates = [
        'legalization_date', 'start_date', 'end_date'
    ];


    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Employee');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function setLegalizationDateAttribute($value) 
    {
        $this->attributes['legalization_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getLegalizationDateAttribute($value) 
    {  
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function setStartDateAttribute($value) 
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

     public function getStartDateAttribute($value) 
    {  
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function setEndDateAttribute($value) 
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

     public function getEndDateAttribute($value) 
    {  
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function getFormatValueAttribute() {
        return $this->value? number_format($this->value, 0, ',', '.'):"";
    }

    public function getFormatMonthlyValueAttribute() {
        return $this->monthly_value? number_format($this->monthly_value, 0, ',', '.'):"";
    }



    public static function validate($request, $contract = null)
    {
    	$rules=[
    		'type' => 'required',
            'number' => 'required|numeric',
            'SIIF' => 'required|numeric',
            'legalization_date' => 'required|date_format:"d/m/Y"',
            'start_date' => 'required|date_format:"d/m/Y"',
            'end_date' => 'required|date_format:"d/m/Y"|after:start_date',
            'value' => 'required|numeric|min:0|max:100000000',
            'monthly_value' => 'nullable|numeric|min:0|max:50000000',
            'policy_expedition_date' => 'nullable|date_format:"d/m/Y"',
            'arl_expedition_date' => 'nullable|date_format:"d/m/Y"',
            'supervisor_id'=>'required'
    	];

    	$messages = [

            'numero.numeric' => 'El campo número no puede contener letras',
            'SIIF.required' => 'El campo SIIF es requerido',
            'SIIF.numeric' => 'El campo SIIF debe ser un número',
            'value.numeric' => 'El campo valor del contrato debe ser un número',
            'supervisor_id.required' => 'El supervisor es requerido'
        ];

        $request->validate($rules, $messages);
    }

    /*
    * Contrato es vigente, se valida la fecha fin con la fecha actual.
    */
    public function isValid() {
        
        $end_date_contract = strtr($this->end_date, '/', '-');

        $today = date('d-m-Y');
        if(strtotime($end_date_contract) >= strtotime($today)){
            return true;
        }
        return false;
    }
}
