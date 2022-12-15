<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Proveedor;


class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $query = trim($request->get('search'));
            $proveedores = Proveedor::where('nombre','LIKE','%'.$query.'%')
            ->where('estado','=',1)
            ->orderBy('id','asc')
            ->get();
            return view('proveedor.index',['proveedores'=>$proveedores]);
        }
    }

    public function create()
    {
        return view('proveedor.create');
    }

    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->ci = request('ci');
        $proveedor->nombre = request('nombre');
        $proveedor->apellido= request('apellido');
        $proveedor->ciudad = request('ciudad');
        $proveedor->telefono = request('telefono');
        $proveedor->estado = 1;
        $proveedor->save();
        DB::table('bitacoras')->insert(array('actividad'=>'Creo un Proveedor',
        'fecha'=>date('Y-m-d H:i:s'),'users_id'=>auth()->user()->id,'estado'=>1));
         return redirect('/proveedor');
        
    }
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit',['proveedor'=>$proveedor]);
    }
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->ci = request('ci');
        $proveedor->nombre = request('nombre');
        $proveedor->apellido = request('apellido');
         if (request('ciudad') != null)
         $proveedor->ciudad = request('ciudad');
        $proveedor->telefono = request('telefono');
        $proveedor->update();
        DB::table('bitacoras')->insert(array('actividad'=>'Modifico un Proveedor',
        'fecha'=>date('Y-m-d H:i:s'),'users_id'=>auth()->user()->id,'estado'=>1));
        return redirect('/proveedor');

    }
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->estado=0;
        $proveedor->update();
        DB::table('bitacoras')->insert(array('actividad'=>'Elimino un Proveedor',
        'fecha'=>date('Y-m-d H:i:s'),'users_id'=>auth()->user()->id,'estado'=>1));
        return redirect('/proveedor');
    }
}
