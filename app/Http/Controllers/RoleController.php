<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $list = Role::all();
        return view("roles.index", compact("list"));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view("roles.create", compact('permissions'));
    }

    public function store(Request $request)
    {

        $this->validate($request, ['name' => 'required|unique:roles']);

        if( $role = Role::create($request->only('name')) ) {

            $permissions = $request->get('permissions');
            if(!is_null($permissions))
            {
               $role->syncPermissions($permissions); 
            }
            

        }

        return redirect('roles')->with('status', 'Rol creado!');

    }


    public function show(Role $rol)
    {
        //
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view("roles.edit", compact('role', 'permissions'));
    }


    public function update(Request $request, Role $role)
    {
        $this->validate($request, ['name' => 'required|unique:roles,name,' . $role->id]);
        $role->fill($request->only("name"))->save();

        $permissions = $request->get('permissions');
        if(!is_null($permissions))
        {
           $role->syncPermissions($permissions); 
        }
        return redirect('roles')->with('status', 'Rol actualizado con exito!');
    }


    public function destroy(Role $role)
    {
        if( count($role->users()->get()) == 0 ) {
            $role->delete();
            return redirect('roles')->with('status', 'Rol eliminado con exito!');    
        }
       
        return redirect()->route('roles.edit', $role->id)->with('status', 'No se puede eliminar este rol por que tiene usuarios asociados!');    
    }
}
