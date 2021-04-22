<?php

namespace App\Http\Controllers\contract;

use Excel;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractExportController extends Controller
{
    public function export() 
    {
    	$today = Carbon::now()->format('d-m-Y');
    	
    	// $contratistas = Employee::where('type_contract', 'Contratista')
     //                        ->orderBy('first_name')
     //                        ->get();

     //    foreach( $contratistas as $contratista )
     //    {
     //    	$contract =  $contratista->getLastContract();

     //    	if($contract->isValid())
     //    	{
     //    		echo "si <br>";
     //    	}
     //    	else
     //    	{
     //    		echo "no - " . $contratista->name . "<br>";
     //    	}
        	
     //    }


    	Excel::create('contratos ' . $today , function($excel)
        {
            $excel->sheet('Sheetname', function($sheet)
            {
                $contratistas = Employee::where('type_contract', 'Contratista')
                            ->orderBy('first_name')
                            ->get();
                $lista = [];

                $lista[] = [
                	'NUMERO', 'FECHA DE SUSCRIPCION', 'NUMERO DE IDENTIFICACION', 'RAZON SOCIAL', 
                	'OBJETO DEL CONTRATO', 'VALOR TOTAL', 'FUENTE', 'CDP', 
                	'FECHA DE INICIO','FECHA DE TERMINACION', 'SUPERVISOR', 'ESTADO'
                ];

                foreach ($contratistas as $contratista) {

                	$contrato =  $contratista->getLastContract();

                	if(!is_null($contrato) && $contrato->isValid()) 
                	{
                		$contratista_array = [];
	                    $contratista_array[] = $contrato->number;
	                    $contratista_array[] = $contrato->legalization_date;

	                    $contratista_array[] = $contratista->document_number;
	                    $contratista_array[] = $contratista->name;
	           
	           			$contratista_array[] = $contrato->object;
	           			$contratista_array[] = $contrato->value;
	           			$contratista_array[] = $contrato->source;
	           			$contratista_array[] = $contrato->CDP;
	           			$contratista_array[] = $contrato->start_date;
	           			$contratista_array[] = $contrato->end_date;

	           			$contratista_array[] = $contrato->supervisor? $contrato->supervisor->name: "";

	                    $contratista_array[] = $contrato->novelty;

	                    $lista[] = $contratista_array;
                	}
                    
                }

                $sheet->fromArray($lista, null, 'A1', false, false);
            });

        })->export('xls');
    }
}
