<?php
 
namespace App\Http\Controllers;

use App\Area;
use App\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(){

        $list=Classroom::all();
        return view('classroom.index', compact('list'));
    }

    public function create(Classroom $classroom)
    {
        $areas = Area::all()->pluck('name', 'id')->toArray();         
        return view('classroom.create', compact('classroom','areas'));
    }

    public function store(Request $request)
    {
        Classroom::validate($request);
        $classroom = Classroom::create($request->all());
        //dd($classroom);
        $classroom->save();
        return redirect('ambientes')->with("status", "Ambiente $classroom->name ingresado con exito!");
    }

    public function show(Classroom $classroom)
    {
        
    }
    
    public function edit(Classroom $classroom)
    {
        $areas = Area::all()->pluck('name', 'id')->toArray();  
        //dd($classroom);
        return view('classroom.edit', compact('classroom','areas'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $classroom->validate($request, $classroom);
        $classroom->fill($request->all())->save();
        return redirect('ambientes')->with("status", "Ambiente $classroom->name editado con exito!");
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect('ambientes')->with("status", "Ambiente $classroom->name eliminado con exito!");
    }
}
