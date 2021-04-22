<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'area_id','name'
    ];

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function courses()
    {
        return $this->hasOne('App\Course');
    }
    

    public static function validate($request, $program = null)
    {
    	$rules=[
            'area_id' => 'required',
    		'name' => 'required|unique:programs'
    	];

        if (!is_null($program)) {
           $rules['name'] .= ',name,' . $program->id;
       }

    	$messages = [

        ];

        $request->validate($rules, $messages);
    }
}
