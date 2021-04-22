<?php

namespace App\Http\Controllers\API;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function get(Employee $employee = null)
    {
    	if( is_null($employee) ) 
    	{
    		return Employee::all();
    	}

    	return $employee;
    }
}
