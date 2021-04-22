<?php

namespace App\Http\Controllers\API;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function get(Course $course = null)
    {
    	if( is_null($course) ) 
    	{
    		return Course::all();
    	}

    	$program = $course->program->name;
    	$area = $course->program->area? $course->program->area->name : '';

    	return $course;
    }
}
