<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Education;
use App\Employee;
use App\Migracion\Contratista;
use App\Migracion\Contrato;
use App\Migracion\Estudio;
use App\Migracion\Supervisor;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\DB;
use Image;

class MigrateController extends Controller
{

    public function migrateData() {

        set_time_limit(0);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Contract::query()->truncate();
        Education::query()->truncate();
        Employee::query()->truncate();

        // CONTRATISTAS
        $contratistas = Contratista::all();
        foreach ($contratistas as $key => $item)
        {
            $employee = new Employee();

            $employee->id = $item->id;
            $employee->first_name = $item->nombre;
            $employee->last_name = "";
            $employee->picture = $item->avatar;
            $employee->email = $item->email;
            $employee->personal_email = null;
            $employee->phone = $item->telefono;
            $employee->address = $item->direccion;
            $employee->birthdate = $item->fecha_nacimiento;
            $employee->document_type = $item->tipo_documento;
            $employee->document_number = $item->numero_documento;
            $employee->document_expedition_place = $item->lugar_expedicion_documento;
            $employee->document_expedition_date = $item->fecha_expedicion_documento;
            $employee->residence_place = $item->lugar_residencia;
            $employee->observation = $item->observacion;
            $employee->salary = null;
            
            $employee->type_contract = "Contratista";
            $employee->type_employee = $item->cargo;
            if($item->cargo == "Instructor") {
                $employee->position = "Instructor";
            }

            $employee->position = null;
            $employee->experience_teacher = $item->experiencia_docente;
            $employee->experience_area = $item->experencia_laboral_area;
            $employee->created_at = $item->created_at;
            $employee->updated_at = $item->updated_at;

            $employee->save();
        }
        echo "contratistas migrados...<br>";

        // SUPERVISORES
        $supervisores = Supervisor::all();     
        foreach ($supervisores as $item) 
        {
            $supervisor = new Employee();
            
            $supervisor->first_name = $item->nombre;
            $supervisor->last_name = "";
            
            $supervisor->birthdate = $item->fecha_nacimiento;
            $supervisor->document_type = $item->tipo_documento;
            $supervisor->document_number = $item->numero_documento;
            $supervisor->document_expedition_place = $item->lugar_expedicion_documento;
            $supervisor->residence_place = $item->lugar_residencia;
            
            
            
            $supervisor->type_contract = "Planta";
            $supervisor->type_employee = "Administrativo";
            $supervisor->is_supervisor = true;

            $supervisor->position = $item->cargo;

            $supervisor->created_at = $item->created_at;
            $supervisor->updated_at = $item->updated_at;
            
            $supervisor->save();
        }

        echo "supervisores migrados...<br>";

        // ESTUDIOS
        $estudios = Estudio::all();
        foreach ($estudios as $item)
        {
            $education = new Education();

            $education->employee_id = $item->contratista_id;
            $education->education = $item->formacion;
            $education->degree = $item->titulo;
            $education->institute = $item->institucion;
            $education->state = $item->estado;

            $education->save();
        }

        echo "estudios migrados...<br>";

        //CONTRATOS
        $contractos = Contrato::all();  

        foreach ($contractos as $key => $item) 
        {

      
            $contract = new Contract();
            
            $contract->employee_id = $item->contratista_id;
            $contract->type = $item->tipo;
            $contract->number = $item->numero;
            $contract->SIIF = $item->SIIF;
            $contract->novelty = $item->novedad;
            $contract->legalization_date = $item->fecha;
            $contract->start_date = $item->fecha_inicio;
            $contract->end_date = $item->fecha_fin;

            if($item->flecha != "" && !is_null($item->flecha))
            {
                $contract->legalization_date = $item->flecha;
                // $contract->legalization_date = Carbon::createFromFormat('d/m/Y', $item->flecha)->format('Y-m-d');

            }
            if($item->fecha_inicio != "" && !is_null($item->fecha_inicio))
            {
                $contract->start_date = $item->fecha_inicio;
                // $contract->start_date = Carbon::createFromFormat('d/m/Y', $item->fecha_inicio)->format('Y-m-d');    
            }
            if($item->fecha_fin != "" && !is_null($item->fecha_fin))
            {
                $contract->end_date = $item->fecha_fin;
                // $contract->end_date = Carbon::createFromFormat('d/m/Y', $item->fecha_fin)->format('Y-m-d');
            }
            
            $contract->value = $item->valor;
            $contract->source = $item->fuente;
            $contract->resource = $item->recurso;
            $contract->monthly_value = $item->valor_mensualidad;
            $contract->duration = $item->duracion;
            $contract->program = $item->programa;
            $contract->insurance = $item->aseguradora;
            $contract->number_policy = $item->numero_poliza;
            $contract->policy_expedition_date = $item->fecha_poliza;
            $contract->CDP = $item->CDP;
            $contract->object = $item->objeto;
            $contract->payment_method = $item->forma_pago;
            $contract->arl_name = $item->nombre_arl;
            $contract->arl_rating = $item->clasificacion_arl;
            $contract->arl_expedition_date = $item->fecha_expedicion_arl;
            $contract->eps_name = $item->nombre_eps;
            $contract->pension_fund = $item->fondo_pension;
            $contract->last_month_payment_contribution = $item->mes_pago_aportes;
            $contract->bank = $item->banco;
            $contract->account_number = $item->numero_cuenta;

            $supervisor = Employee::where('document_number', $item->supervisor->numero_documento)->first();
            $contract->supervisor_id = $supervisor->id; 
            $contract->save();
        }
        echo "contratos migrados...<br>";
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function createThumbnails() {

        $directory=(public_path('pictures/employees/'));
        $files = File::files($directory);

        foreach ($files as $file){
            $image = Image::make($file)->widen(100)->encode('jpg', 75);
            $image->save(public_path('pictures/employees/thumbnails/') . pathinfo($file)["basename"]);
        }


    }
}
