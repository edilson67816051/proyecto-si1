<?php

namespace App\Http\Controllers;
use App\Role;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('roles.index',['roles'=>$role]);
    }

    public function create()
    {
        return view('roles.create');
    }

    //almacena los nuevos registros creados en la base de datos

    public function store(Request $request)
    {
        $rol = new Role();
        $rol->name = request('name');

        $rol->save();
        
        return redirect('/roles');
    }
}
