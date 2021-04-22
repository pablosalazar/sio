<?php

namespace App\Http\Controllers; 

use App\Program;
use App\Area;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $list=Program::all();
        return view('programs.index',compact('list'));
    }

    public function create(Program $program)
    {
        $areas = Area::all()->pluck('name', 'id')->toArray();
        return view('programs.create', compact('program','areas'));
    }

    public function store(Request $request)
    {
        Program::validate($request);
        $program = Program::create($request->all());
        $program->save();
        return redirect('programas')->with("status", "Programa $program->name ingresado con exito!");
    }

    public function show(Program $program)
    {
        //
    }

    public function edit(Program $program)
    {   
        $areas = Area::all()->pluck('name', 'id')->toArray();
        return view('programs.edit', compact('program','areas'));
    }

    public function update(Request $request, Program $program)
    {
        $program->validate($request, $program);
        $program->fill($request->all())->save();
        return redirect('programas')->with("status", "Programa $program->name editado con exito!");
    }

    public function destroy(Program $program)
    {
       $program->delete();
       return redirect('programas')->with("status", "Programa $program->name eliminado con exito!");
    }
}
