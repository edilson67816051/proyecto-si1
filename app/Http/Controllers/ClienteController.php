<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\DB;
use App\Cliente;

class ClienteController extends Controller
{

    public function index(Request $request)
    {
        if ($request){
            $query = trim($request->get('search'));
            $clientes = Cliente::where('nombre','LIKE','%'.$query.'%')
            ->where('estado','=',1)
            ->orderBy('id','asc')
            ->get();
            return view('clientes.index',['clientes'=>$clientes]);
        }
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClienteFormRequest $request)
    {
        $cliente = new Cliente();
        $cliente->ci = request('ci');
        $cliente->nombre = request('nombre');
        $cliente->apellido_p = request('apellido_p');
        $cliente->apellido_m = request('apellido_m');
        $cliente->genero = request('genero');
        $cliente->telefono = request('telefono');
        $cliente->estado = 1;
        $cliente->save();

         return redirect('/clientes');
        
    }
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit',['cliente'=>$cliente]);
    }
    public function update(ClienteFormRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->ci = request('ci');
        $cliente->nombre = request('nombre');
        $cliente->apellido_p = request('apellido_p');
        $cliente->apellido_m = request('apellido_m');
        if (request('genero') != null)
             $cliente->genero = request('genero');
        $cliente->telefono = request('telefono');
        $cliente->update();

        return redirect('/clientes');

    }
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->estado=0;
        $cliente->update();;
        return redirect('/clientes');
    }
}
