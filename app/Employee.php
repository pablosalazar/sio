<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Employee extends Model
{

    protected $fillable = [
        "picture", "area_id", "first_name", "last_name", "email", "personal_email", "phone", "address", "birthdate", "document_type", 
        "document_number", "document_expedition_place", "document_expedition_date", "residence_place", "observation", 
        "type_contract", "type_employee", "position", "grade", "denomination", "experience_teacher", "experience_area", 
        "salary", 'supervisor'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function educations()
    {
        return $this->hasMany('App\Education');
    }

    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function getNameAttribute() {
        return $this->first_name . " " . $this->last_name;
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function state() 
    {    
        if( $this->type_contract != 'Planta' ) 
        {
            $contract = $this->getLastContract();
            if( $contract->isValid()) {
                return true;
            }
            return false;
        }

        return true;
    }

    public function getLastContract() 
    {
        return $this->contracts()->orderBy('end_date', 'desc')->first();
    }
 
    
    public static function validate($request, $employee = null)
    {

        $rules = [
            'type_contract'=>'required',
            'type_employee'=>'required',
            'area_id'=>'required',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'document_type' => 'required',
            'document_number' => 'required|numeric|unique:employees',
            'email' => 'required|email|unique:employees',
            'personal_email' => 'nullable|email|unique:employees',
            'residence_place' => 'required'
        ];

       if (!is_null($employee)) {
           $rules['document_number'] .= ',document_number,' . $employee->id;
           $rules['personal_email'] .= ',personal_email,' . $employee->id;
           $rules['email'] .= ',email,' . $employee->id;

       }

        $messages = [

        ];

        $request->validate($rules, $messages);
    }

}
