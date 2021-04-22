<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Area $area)
    {
        $list = Area::all();
        return view ('areas.index', compact('list'));
    }

    public function create()
    {
        return view ('areas.create');
    }

    public function store(Request $request)
    {
        Area::validate($request);
        $area = Area::create($request->all());
        return redirect('areas')->with("status", "Área $area->name ingresada  con exito!");
    }

    public function show(Area $area)
    {
        //
    }

    public function edit(Area $area)
    {
        return view ('areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $area->validate($request, $area);
        $area->fill($request->all())->save();
       return redirect('areas')->with("status", "Área $area->name editada  con exito!");
    }

    public function destroy(Area $area)
    {
        
        $area->delete();
        return redirect('areas')->with("status", "Área $area->name eliminada  con exito!");
    }
}
