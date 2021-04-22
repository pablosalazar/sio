<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ["name"];

    public function programs()
    {
        return $this->hasMany('App\Program');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
   

    public static function validate($request, $area = null)
    {
        $rules=[
            'name' => 'required|unique:areas',
        ];

        if (!is_null($area)) {
            $rules['name'] .= ',name,' . $area->id;
        }

        $messages = [];
    
        $request->validate($rules, $messages);
    }
}