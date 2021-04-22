<?php

namespace App\Http\Controllers\Employee;

use App\Area;
use App\Contract;
use App\Education;
use App\Employee;
use App\Formation;
use App\Http\Controllers\Controller;
use App\User;
use Excel;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class EmployeeController extends Controller
{
    public function index()
    {
        $list = Employee::orderBy('first_name')->get();
        return view('employees.index', compact("list"));
    }

    public function create() 
    {
        $areas = Area::pluck('name', 'id')->toArray();
        return view('employees.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $educations = $request->input("educations");
        $request->session()->flash('educations', $educations);
        
        Employee::validate($request);

        $area_id = $request->get('area_id');
        if(!is_numeric($area_id)) {
            $area = Area::create(['name' => $area_id]);
            $request['area_id'] = $area->id;
        }

        DB::transaction(function () use ($request, $educations) {
            $employee = Employee::create($request->all());
         
            foreach ($educations as $education) 
            {
                if($education['education'] != null && $education['degree']) {
                    $employee->educations()->create($education);    
                }
            }

            if($request->file("picture"))
            {
                $this->savePicture($employee, $request->file("picture"));
            }
            
        });

        return redirect('funcionarios')->with('status', 'Funcionario agregado con exito!');
    }

    public function edit( Employee $employee)
    {
        $areas = Area::pluck('name', 'id')->toArray();
        $educations = $employee->educations->toArray();

        return view('employees.edit', compact( 'employee','areas','educations'));
    }

    public function update(Request $request, Employee $employee)
    {
        
        $area_id = $request->get('area_id');
        

        if(!is_numeric($area_id)) {
            $area = Area::create(['name' => $area_id]);
            $request['area_id'] = $area->id;
        }
       
        $educations = $request->input("educations");
        $request->session()->flash('educations', $educations);
        
        $employee->validate($request, $employee);

        DB::transaction(function () use ($request, $employee) {
            
            $old_picture = $employee->picture;

            $employee->fill($request->all())->save();

            $this->createOrUpdateOrDeleteEducations($request, $employee);

            if($request->file("picture"))
            {
                $this->deletePicture($old_picture);
                $this->savePicture($employee, $request->file("picture"));
            }
        });

        return redirect()->route('funcionarios.edit', ['id' => $employee->id])->with('status', 'Los cambios han sido guardados con exito!');
    }

    public function destroy(Employee $employee) 
    {
        if( !is_null($employee->user) ) 
        {
            User::find($employee->user_id)->delete();
        }
        $this->deletePicture($employee->picture);
        
        $employee->delete();

        return redirect('funcionarios')->with('status', 'Funcionario borrado con exito!');

    }

    private function savePicture($employee, $file) 
    {

        $filename = $employee->document_number .  '-' . time() .  ".jpg";
        $image = Image::make($file)->widen(512)->encode('jpg', 75);
        $image->save(public_path('pictures/employees/') . $filename);

        $image = Image::make($file)->widen(100)->encode('jpg', 75);
        $image->save(public_path('pictures/employees/thumbnails/') . $filename);

        $employee->picture = $filename;
        $employee->save();
    }

    private function deletePicture($picture) {

        if($picture != "default.jpg"){
            File::delete(public_path('pictures/employees/') . $picture);
            File::delete(public_path('pictures/employees/thumbnails/') . $picture);
        }
    }

    private function createOrUpdateOrDeleteEducations($request, $employee) 
    {
        $educations_old = $employee->educations->toArray();
        $educations_new = [];

        if($request->has("educations")) {
            $educations_new = $request->input("educations");
        }

        // Registrar actualizar un registros de estudios
        foreach ($educations_new as $education) {

            if($education['education'] != null && $education['degree']) 
            {
                if(isset($education['id'])) 
                {
                    Education::find($education['id'])->fill($education)->save();
                }
                else {
                    $employee->educations()->create($education);    
                }
            }
        }

        //Borrar registros
        $id_educations_old = array_pluck($educations_old, 'id');
        $id_educations_new = array_pluck($educations_new, 'id');
        foreach ($id_educations_old as $id) {
            
          if(!in_array($id, $id_educations_new)) {
                Education::find($id)->delete();
          }
        
        }
    }

    
}
