<?php

namespace App; 

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   protected $fillable = ["program_id", "code", "start_date", "end_date", "journey"];

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function program()
    {
        return $this->belongsTo('App\Program');
    }


	public static function validate($request, $course = null)
    {
        $rules=[
            'program_id'=> 'required',
            'code' => 'required|unique:courses',
            'start_date' => 'required',
            'school_day' => 'required',
            'end_date' => 'required',
        ];


        if (!is_null($course)) {
            $rules['code'] .= ',code,' . $course->id;
            $rules['start_date'] .= ',start_date,' . $course->id;
            $rules['working_day'] .= ',working_day,' . $course->id;
            $rules['number_students'] .= ',number_students,' . $course->id;
        }
        

        if (!is_null($course)) {
            $rules['code'] .= ',code,' . $course->id;
            $rules['start_date'] .= ',start_date,' . $course->id;
            $rules['school_day'] .= ',school_day,' . $course->id;
            $rules['end_date'] .= ',end_date,' . $course->id;
        }

        $messages = [
    
        ];
    
        $request->validate($rules, $messages);
    }
}
