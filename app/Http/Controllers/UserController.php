<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Administrador']);
    }

    public function index()
    {
        $list = User::latest()->paginate();
        return view('users.index', compact('list'));
    }


    public function create()
    {
        $employees = Employee::where('user_id', null)->get()->pluck('name', 'id')->toArray();

        $roles = Role::pluck('name', 'id')->toArray();
        return view('users.create', compact('employees', 'roles'));
    }


    public function store(Request $request)
    {
        User::validate($request);

        $user = User::create($request->all());
        $user->roles()->save(Role::find($request->get('role_id')));

        if($request->get('employee_id') != null) 
        {
            $employee = Employee::find($request->get('employee_id'));
            $employee->user_id = $user->id;
            $employee->save();
        }

        return redirect('usuarios')->with("status", "Cuenta de usuarios para $user->name creada con exito!");

    }

    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id')->toArray();
        return view('users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {

        User::validate($request, $user);

        $user->fill($request->all());
        $user->save();

        

        $user->syncRoles(Role::find($request->get('role_id')));

        return redirect('usuarios')->with("status", "Los cambios han sido guardados con exito!");

    }


    public function destroy(User $user)
    {
         $user->delete();

        return redirect('usuarios')->with('status', 'Usuario borrado con exito!');
    }

    public function changePassword(Request $request, User $user) {

        $password = $request->get('password');
        $user->password = $password;
        $user->save();
        
        if($request->has('page') && $request->get('page') == "profile"){
           return redirect()->route('profile')->with('status', 'La contraseña se ha actualizado con exito!');
        }
        return redirect()->route('usuarios.edit', $user->id)->with('status', 'La contraseña se ha actualizado con exito!');
    }
}
