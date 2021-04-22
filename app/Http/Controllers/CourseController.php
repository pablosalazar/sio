<?php

namespace App\Http\Controllers;

use App\Course;
use App\Area;
use App\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $list=Course::all();
        return view('course.index', compact('list'));
    }

    public function create()
    {
        $programs = Program::all()->pluck('name', 'id')->toArray();
        return view('course.create', compact('programs'));
    }

    public function store(Request $request)
    {
        Course::validate($request);
        $course= Course::create($request->all());
        return redirect('fichas')->with("status", "Ficha $course->code ingresada con exito!");
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        $programs = Program::all()->pluck('name', 'id')->toArray();
        return view('course.edit', compact('course', 'programs'));
    }

    public function update(Request $request, Course $course)
    {
        Course::validate($request);
        $course->fill($request->all())->save();
        return redirect('fichas')->with("status", "Ficha $course->code editada con exito!");
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect('fichas')->with("status", "Ficha $course->code eliminada con exito!");
    }
}
