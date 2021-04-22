<?php

namespace App\Http\Controllers\Student;

use File;
use Excel;
use Image;
use App\Area;
use App\Course;
use App\Program;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentUploadsController extends Controller
{

    private $new_areas = [];
    private $new_programs = [];
    private $new_courses = [];
    private $new_students = [];
    private $cont_processed_register = 0;


    public function showImportForm()
    {
    	return view('students.uploads.import');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

    	$ext = $request->file('file')->getClientOriginalExtension();
    	$filename = 'file_by_import.'  . $ext;
    	$request->file('file')->storeAs('', $filename, 'files');
    	$results = $this->LoadDataToDBFromFile($filename);

        return redirect('aprendices/importar')->with('results', $results);

    }

    public function showUploadForm()
    {
    	return view('students.uploads.upload_pictures');
    }

    public function upload(Request $request)
    {

        $file = $request->file('file');


        // Size validation
        $size = $file->getClientSize();

        if($size > 3145728)
        {
           return response()->json('El archivo no puede pesar mas de 3 Megas', 400);
        }

        // Extension validation
        $extensions = ['jpg', 'jpeg', 'png'];
        $ext = $file->getClientOriginalExtension();

        if(!in_array($ext, $extensions))
        {
            return response()->json('El archivo debe estar en formato jpeg, jpg o png.', 400);
        }


        // Student if exists validation
        $id = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file->getClientOriginalName());

        $student = Student::where('document_number', $id)->first();

        if(!is_null($student))
        {

            $filename = $student->document_number .  '-' . time() .  ".jpg";
            $image = Image::make($file)->widen(512)->encode('jpg', 75);
            $image->save(public_path('pictures/students/') . $filename);

            $image = Image::make($file)->widen(100)->encode('jpg', 75);
            $image->save(public_path('pictures/students/thumbnails/') . $filename);

            $this->deletePicture($student->picture);
            $student->picture = $filename;
            $student->save();
        }
        else {
            return response()->json('No se encontró un aprendiz con el número de documento', 400);
        }

    }


    private function LoadDataToDBFromFile($filename)
    {
        $path_file = public_path('uploads' . DIRECTORY_SEPARATOR . $filename);

        $sheet_names = Excel::load($path_file)->getSheetNames();

        $this->cont_processed_register = 0;

        foreach ( $sheet_names as $sheet_name )
        {

			Excel::selectSheets($sheet_name)->load($path_file, function($sheet)
	        {
	            $sheet->each(function ($row) {

	            	if($row->nombre != "")
                    {
                        $this->cont_processed_register++;

                        // Create if no exists area
                        if(!$area = Area::where('name', $row->red_tecnologica)->first()){
                            $area = Area::create(['name' => $row->red_tecnologica]);
                            $this->new_areas[] = $area->name;
                        }


                        // Create if no exists program
                        if(!$program = Program::where([
                            'area_id' => $area->id,
                            'name' => $row->nombre_del_programa
                        ])->first())
                        {
                            $program = Program::create([
                                'area_id' => $area->id,
                                'name' => $row->nombre_del_programa
                            ]);
                            $this->new_programs[] = $program->name;
                        }

                        // Create if no exists course
                        if(!$course = Course::where([
                            'program_id' => $program->id,
                            'code' => $row->codigo_de_ficha,
                            'end_date' => $row->fecha_finalizacion_del_programa->format('Y-m-d')
                        ])->first())
                        {
                            $course = Course::create([
                                'program_id' => $program->id,
                                'code' => $row->codigo_de_ficha,
                                'end_date' => $row->fecha_finalizacion_del_programa->format('Y-m-d')
                            ]);
                            $this->new_courses[] = $course->code;
                        }

                        // Student information
                        $student_existing = Student::where('document_number', $row->numero_de_documento)->first();

                        if(is_null($student_existing))
                        {
                            $student = new Student;

                            $student->course_id = $course->id;
                            $student->first_name = $row->nombre;
                            $student->last_name = $row->primer_apellido . " " . $row->segundo_apellido;
                            $student->document_number = $row->numero_de_documento;
                            $student->blood_type = $row->tipo_de_sangre;
                            if($row->tipo_de_documento == "CC")
                            {
                               $student->document_type = 'C.C.';
                            }
                            else if($row->tipo_de_documento == "TI")
                            {
                                $student->document_type = 'T.I.';
                            }
                            else if($row->tipo_de_documento == "CE")
                            {
                                $student->document_type = 'C.E.';
                            }

                            $student->save();
                            $this->new_students[] = $student->name;
                        }
                        else {

                            $student_existing->course_id = $course->id;
                            $student_existing->save();
                        }
                    }

	            });
	        });
        }

        return [
            'areas' => $this->new_areas,
            'programs' => $this->new_programs,
            'courses' => $this->new_courses,
            'students' => $this->new_students,
            'total_students' => $this->cont_processed_register
        ];


    }

    private function deletePicture($picture) {
        if($picture != "default.jpg"){
            File::delete(public_path('pictures/students/') . $picture);
            File::delete(public_path('pictures/students/thumbnails/') . $picture);
        }
    }
}
