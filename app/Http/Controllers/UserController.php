<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //importamos los datos de la base de datos llamando al modelo User 
    //Mostrar una lista de los registro
    public function index()
    {
        $users = User::all();
        return view('usuarios.index',['users'=>$users]);
    }

    //Muestra el formulario para crear un nuevo restro
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create',['roles'=>$roles]);
    }

    //almacena los nuevos registros creados en la base de datos

    public function store(Request $request)
    {
        $usuarios = new User();
        $usuarios->name = request('name');
        $usuarios->apellido = request('apellido');
        $usuarios->email = request('email');
        $usuarios->username=request('username');
        $usuarios->estado = 1;
        $usuarios->password = bcrypt(request('password'));
        $usuarios->save();
        DB::table('bitacoras')->insert(array('actividad'=>'Creo un usuario',
        'fecha'=>date('Y-m-d H:i:s'),'users_id'=>auth()->user()->id,'estado'=>1));
        return redirect('/usuarios');
    }

    //mustra los registro especifico

    public function show($id)
    {
        $user = new User();
        $user = User::findOrFail($id);
        return view('usuarios.detalle',['user'=>$user]);
    }


    // Muestra en la tabla los datos a editar

    public function edit($id)
    {
        return view('usuarios.edit',['user'=>User::findOrFail($id)]);
    }

    // Actualiza un registro en la base de datos

    public function update(UserFormRequest $request, $id)
    {
        $usuarios = User::findOrFail($id);

        $usuarios->name = $request->get('name');
        $usuarios->username = $request->get('username');
        $usuarios->apellido = $request->get('apellido');
        $usuarios->email = $request->get('email');

        $usuarios->update();
        DB::table('bitacoras')->insert(array('actividad'=>'Modifico un usuario',
        'fecha'=>date('Y-m-d H:i:s'),'users_id'=>auth()->user()->id,'estado'=>1));
        return redirect('/usuarios');
    }

    //elimina un registro especidico

    public function destroy($id)
    {
        $usuarios = User::findOrFail($id);

        $usuarios->delete();

        DB::table('bitacoras')->insert(array('actividad'=>'Elimino un usuario',
        'fecha'=>date('Y-m-d H:i:s'),'users_id'=>auth()->user()->id,'estado'=>1));

        return redirect('/usuarios');
    }
}
