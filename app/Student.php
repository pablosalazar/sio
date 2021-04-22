<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'course_id','picture','first_name','last_name','document_type','document_number',
        'blood_type','email', 'personal_email', 'phone','address'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }
    
    public function getNameAttribute(){

       return $this->first_name .' '. $this->last_name;
    }

    /*
    * Retorna true si el aprendiz esta inscrito en una ficha vigente de lo contrario retorna false
    */
    public function state() 
    {
        $end_date_course = $this->course->end_date;
        $today = date('Y-m-d');


        if(strtotime($end_date_course) >= strtotime($today)){
            return true;
        }
        return false;
    }

    public static function validate($request, $student = null) 
    {
    	$rules = [ 
            'course_id'=>'required',
            'first_name'=>'required', 
    		'last_name'=>'required',
    		'document_type'=>'required',
    		'document_number'=>'required|unique:students',
            'email' => 'required|email|unique:students',
    		'personal_email' => 'nullable|email|unique:students'
    	];

        if (!is_null($student)) {
            $rules['document_number'] .= ',document_number,' . $student->id;
            $rules['email'] .= ',email,' . $student->id;
            $rules['personal_email'] .= ',personal_email,' . $student->id;

        }
    	$messages = [

        ];


        $request->validate($rules, $messages);

    }
}
