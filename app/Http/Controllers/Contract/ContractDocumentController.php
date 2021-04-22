<?php

namespace App\Http\Controllers\Contract;

use App\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractDocumentController extends Controller
{
    public function minuta($id) {
        $contract = Contract::find($id);
        $employee = $contract->employee;
        $supervisor = $contract->supervisor;

        if($employee->type_employee == "Administrativo")
        {
            $view = view('documents.minuta')
                ->with('employee', $employee)
                ->with('contract', $contract)
                ->with('supervisor', $supervisor)
                ->render();

            $pdf = \App::make('dompdf.wrapper')->setPaper('legal', 'portrait');
            $pdf->getDomPDF()->set_option('enable_html5_parser', true);
            $pdf->loadHTML($view);
            return $pdf->stream();
        }
        else
        {

            $view = view('documents.minuta-instructor')
	            ->with('employee', $employee)
                ->with('contract', $contract)
                ->with('supervisor', $supervisor)
            	->render();

            $pdf = \App::make('dompdf.wrapper')->setPaper('legal', 'portrait');
            $pdf->getDomPDF()->set_option('enable_html5_parser', true);
            $pdf->loadHTML($view);
            return $pdf->stream();
        }


    }

    public function acta_inicio($id) {
        $contract = Contract::find($id);
        $employee = $contract->employee;
        $supervisor = $contract->supervisor;
        
        $view = view('documents.acta-inicio')
            ->with('employee', $employee)
            ->with('contract', $contract)
            ->with('supervisor', $supervisor)
            ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option('enable_html5_parser', true);
        $pdf->loadHTML($view);
        return $pdf->stream();
    }

    public function acta_idoneidad($id)
    {
        $contract = Contract::find($id);
        $employee = $contract->employee;
        $view = view('documents.acta-idoneidad')
            ->with('employee', $employee)
            ->with('contract', $contract)
            ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->getDomPDF()->set_option('enable_html5_parser', true);
        return $pdf->stream();
    }
}
