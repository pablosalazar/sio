<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Student;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    
    public function index()
    {
    	return view('security.index');
    }

    public function searchByBarcode() {
        return view('security.search_by_barcode');
    }

    public function search(Request $request) 
    {


    	$search = $request->get('search');
        $person = [];

        // primero preguntamos por aprendices
        $student = Student::where('document_number', $search)->first();


        if( ! is_null($student)) {
            $result['type'] = 'student';
            $result['state'] = $student->state()? 'Activo': 'Inactivo';
            $result['picture'] = $student->picture;
            $result['name'] = $student->name;
            $result['ficha'] = $student->course->code;
            $result['program'] = $student->course->program->name;
            $result['area'] = $student->course->program->area->name;
            $result['end_date_course'] = $student->course->end_date;
        }
        else 
        {
            // ahora preguntamos por funcionarios

            $employee = Employee::where('document_number', $search)->first();

            if( ! is_null($employee)) {
                $result['type'] = 'employee';
                $result['state'] = $employee->state()? 'Activo': 'Inactivo';
                $result['picture'] = $employee->picture;
                $result['name'] = $employee->name;
                $result['type_contract'] = $employee->type_contract;
                $result['type_employee'] = $employee->type_employee;
                $result['area'] = $employee->area? $employee->area->name: 'No definida';

                if( $employee->type_contract == 'Contratista' ) 
                {
                    $result['end_date_contract'] = $employee->getLastContract()->end_date;    
                }
                else 
                {
                    $result['end_date_contract'] = " - ";    
                }

                
            }
            else {
                $result['type'] = 'none';
            }
        }

        if($request->has('type')) 
        {
            return redirect('porteria/busqueda-por-codigo-de-barras')->with('result', $result);
        }
        
        
        return redirect('porteria/busqueda-manual')->with('result', $result);

        
    }
}
