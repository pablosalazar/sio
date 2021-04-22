<?php

namespace App\Http\Controllers\Student;

use File;
use Image;
use App\Course;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $list = Student::orderBy('first_name')->get();
        return view('students.index',compact('list'));
    }

    public function create()
    {
        $course = Course::all()->pluck('code', 'id')->toArray();
        return view('students.create', compact('course'));
    }

    public function store(Request $request)
    {
        Student::validate($request);

        $student = Student::create($request->all());
     
        if($request->file("picture"))
        {
            $this->savePicture($student, $request->file('picture'));
        }
            
        return redirect('aprendices')->with("status", "Aprendiz  $student->name ingresado con exito!");
    }

    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        $course = Course::all()->pluck('code', 'id')->toArray();
        return view('students.edit', compact( 'student','course'));
    }

    public function update(Request $request, Student $student)
    {
        $student->validate($request, $student);
        $old_picture = $student->picture;

        $student->fill($request->all())->save();
        if($request->file("picture"))
        {
            $this->deletePicture($old_picture);
            $this->savePicture($student, $request->file("picture"));
        }

         return redirect('aprendices')->with("status", "Aprendiz  $student->name editado con exito!");
    }

    public function destroy(Student $student)
    {
        $student->delete();
         return redirect('aprendices')->with("status", "Aprendiz  $student->name elimando con exito!");
    }

    private function savePicture($student, $file) 
    {

        $filename = $student->document_number .  '-' . time() .  ".jpg";
        $image = Image::make($file)->widen(512)->encode('jpg', 75);
        $image->save(public_path('pictures/students/') . $filename);

        $image = Image::make($file)->widen(100)->encode('jpg', 75);
        $image->save(public_path('pictures/students/thumbnails/') . $filename);

        $student->picture = $filename;
        $student->save();
    }

    private function deletePicture($picture) {
        if($picture != "default.jpg"){
            File::delete(public_path('pictures/students/') . $picture);
            File::delete(public_path('pictures/students/thumbnails/') . $picture);
        }
    }
}
