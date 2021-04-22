<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Classroom extends Model
{
    protected $fillable =['area_id','name','capacity','code'];

    public function area(){

        return $this->belongsTo('App\Area');
    }

    public static function validate($request, $classroom = null){
        $rules=[
            'name' => 'required|unique:classrooms',
            'code' => 'required|unique:classrooms',
            'area_id' => 'required',
        ];

        if (!is_null($classroom)) {
            $rules['name'] .= ',name,' . $classroom->id;
            $rules['code'] .= ',code,' . $classroom->id;
        }

        $messages = [];
    
        $request->validate($rules, $messages);
    }
}
