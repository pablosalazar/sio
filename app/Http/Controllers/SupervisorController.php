<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function index()
    {
        $employees = Employee::where('type_contract','Planta')
                            ->where('is_supervisor', 0)
                            ->get()
                            ->pluck('name','id')
                            ->toArray();

        $supervisors = Employee::where('is_supervisor', true)->get();

        return view('supervisors.index',compact('employees','supervisors'));
    }

    public function create()
    {
    
    }

    public function store(Request $request)
    {   

        $employee = Employee::findOrFail($request->get('id'));
        $employee->is_supervisor = true;
        $employee->save();

        return redirect('supervisores')->with("status", "Supervisor $employee->name ingresado con exito!");
       
    }

    public function show(Employee $employee)
    {
        
    }

    public function edit(Employee $employee)
    {
        //
    }

    public function update(Request $request, Employee $employee)
    {

        $employee->is_supervisor = false;
        $employee->save();

        return redirect('supervisores')->with("status", "El funcionario $employee->name ha sido eliminado de la lista con exito!");
    }

    public function destroy(Employee $employees)
    {
       
    }
}
