<?php

namespace App\Http\Controllers\Contract;

use App\Area;
use App\Contract;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContractController extends Controller
{

    public function list() 
    {
        $list = Employee::where('type_contract', 'Contratista')->get();
        return view('contracts.list', compact("list"));
    }

    // Lista los contratos de un contratista
    public function index(Employee $employee)
    {
        $list = $employee->contracts()->orderBy('start_date', 'desc')->get();
        return view('contracts.index', compact('employee','list'));
    }

    public function create(Employee $employee)
    {
        $supervisors = Employee::where('is_supervisor', true)
                       ->get()
                       ->pluck('name','id')
                       ->toArray();

        $areas = Area::pluck('name', 'id')->toArray();                       

        return view('contracts.create', compact('employee', 'supervisors', 'areas'));
    }

    public function store(Employee $employee, Request $request )
    { 
       
        Contract::validate($request);

        $area_id = $request->get('area_id');
        if(!is_numeric($area_id)) {
            $area = Area::create(['name' => $area_id]);
            $request['area_id'] = $area->id;
        }

        $contract = $employee->contracts()->create($request->all());

        // update area of the employee
        $contract = $employee->contracts()->orderBy('end_date', 'desc')->first();
        $employee->area_id = $contract->area->id;
        $employee->save();

        return redirect()->route('contratos.index', [$employee->id, $contract->id])->with("status", "Contrato #$contract->number ingresado con exito!");
    }

    public function show(Employee $employee, Contract $contract)
    {
        return view('contracts.show', compact('employee', 'contract'));
    }

    public function edit(Employee $employee, Contract $contract)
    {
        $supervisors = Employee::where('is_supervisor', true)
                       ->get()
                       ->pluck('name','id')
                       ->toArray();
        $areas = Area::pluck('name', 'id')->toArray();                   
        return view('contracts.edit', compact('employee', 'supervisors', 'contract', 'areas'));
    }


    public function update(Request $request, Employee $employee, Contract $contract)
    {
        $contract->validate($request, $contract);

        $area_id = $request->get('area_id');
        if(!is_numeric($area_id)) {
            $area = Area::create(['name' => $area_id]);
            $request['area_id'] = $area->id;
        }
        
        $contract->fill($request->all())->save();

         // update area of the employee
        $contract = $employee->contracts()->orderBy('end_date', 'desc')->first();
        $employee->area_id = $contract->area->id;
        $employee->save();

        return redirect()->route('contratos.show', [$employee->id, $contract->id])->with("status", "Contrato # $contract->number editado  con exito!");
        
    }


    public function destroy(Employee $employee, Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contratos.index', [$employee->id])->with("status", "Contrato # $contract->number eliminado con exito!");
    }
}
