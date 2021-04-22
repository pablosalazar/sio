<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeExportController extends Controller
{

    public  function exportar_contratistas()
    {    
        Excel::create('Contratistas', function($excel)
        {
            $excel->sheet('Sheetname', function($sheet)
            {
                $contratistas = Employee::where('type_contract', 'Contratista')
                            ->orderBy('first_name')
                            ->get();
                $lista = [];

                $lista[] = ['NOMBRES', 'APELLIDOS', 'CARGO', 'AREA', 'TIPO DE DOCUMENTO', 'NUMERO DE DOCUMENTO', 'CORREO', 'TELEFONO', 'DIRECCION', 'FECHA DE NACIMIENTO','NUMERO POLIZA', 'FECHA DE EXPEDICION POLIZA', 'ASEGURADORA'];
                foreach ($contratistas as $contratista) {
                    $contratista_array = [];
                    $contratista_array[] = $contratista->first_name;
                    $contratista_array[] = $contratista->last_name;

                    $contratista_array[] = $contratista->type_employee;
                    if(is_null($contratista->area)) {
                        $contratista_array[] = "";    
                    }
                    else {
                        $contratista_array[] = $contratista->area->name;
                    }

                    $contratista_array[] = $contratista->document_type;
                    $contratista_array[] = $contratista->document_number;
                    $contratista_array[] = $contratista->email;
                    $contratista_array[] = $contratista->phone;
                    $contratista_array[] = $contratista->address;
                    $contratista_array[] = $contratista->birthdate;

                    if(count($contratista->contracts) > 0)
                    {
                        $contract = DB::table('contracts')
                            ->where('employee_id', $contratista->id)
                            ->orderBy('end_date', 'desc')
                            ->first();

                        $contratista_array[] = $contract->number_policy;
                        $contratista_array[] = $contract->policy_expedition_date;
                        $contratista_array[] = $contract->insurance;
                    }


                    $lista[] = $contratista_array;
                }

                $sheet->fromArray($lista, null, 'A1', false, false);
            });

        })->export('xls');
    }

    public  function exportar_nivel_academico()
    {
        Excel::create('nivel_academico', function ($excel) {
            $excel->sheet('Sheetname', function ($sheet) {
                $contratistas = Employee::where('type_contract', 'Contratista')
                            ->orderBy('first_name')
                            ->get();

                $lista = [];

                $lista[] = ['NOMBRE Y APELLIDOS DEL INSTRUCTOR', 'POSTGRADO', 'UNIVERSITARIO', 'TECNOLOGO', 'TECNICO', 'BACHILER', 'AÑOS EXPERIENCIA DOCENTE', 'AÑOS EXPERENCIA (No Docenter)'];
                foreach ($contratistas as $contratista) {

                    $tecnico = "";
                    $tecnologo = "";
                    $universitario = "";
                    $postgrado = "";

                    $estudios = $contratista->educations;

                    foreach ($estudios as $estudio)
                    {
                        if($estudio->education == "Técnica")
                        {
                            $tecnico .= $estudio->degree . ", ";
                        }
                        elseif ($estudio->education == "Tecnológica especializada" ||  $estudio->education == "Tecnológica")
                        {
                            $tecnologo .= $estudio->degree . ", ";
                        }
                        elseif($estudio->education == "Universitaria")
                        {
                            $universitario .= $estudio->degree . ", ";
                        }
                        elseif ( $estudio->education == "Especialización" ||  $estudio->education == "Maestría" ||  $estudio->education == "Doctorado") {
                            $postgrado .= $estudio->degree . ", ";
                        }
                    }

                    $tecnico = rtrim($tecnico, ", ");
                    $tecnologo = rtrim($tecnologo, ", ");
                    $universitario = rtrim($universitario, ", ");
                    $postgrado = rtrim($postgrado, ", ");

                    $contratista_array = [];
                    $contratista_array[] = $contratista->name;
                    $contratista_array[] = $postgrado;
                    $contratista_array[] = $universitario;
                    $contratista_array[] = $tecnologo;
                    $contratista_array[] = $tecnico;
                    $contratista_array[] = "";
                    $contratista_array[] = $contratista->experience_teacher;
                    $contratista_array[] = $contratista->experience_area;


                    $lista[] = $contratista_array;
                }

                $sheet->fromArray($lista, null, 'A1', false, false);
            });

        })->export('xls');
    }
}
