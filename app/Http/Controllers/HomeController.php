<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Employee;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }


    public function index()
    {
        $employess = Employee::all();
        $supervisores = Employee::where('is_supervisor', 1)->get();
        $aprendices = Student::all();
        $users = User::all();
        $contracts = Contract::all();

        return view('home', compact('employess', 'supervisores', 'aprendices', 'users', 'contracts'));
    }
}
