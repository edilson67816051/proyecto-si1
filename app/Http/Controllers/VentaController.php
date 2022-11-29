<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_venta;
use App\Nota_venta;
use App\Cliente;
use App\Producto;
use DB;

use Illuminate\Support\Carbon;
use Response;
use Illuminate\support\Collection;


class VentaController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $nota = DB::table('clientes')
            ->join('nota_ventas','clientes.id','=','nota_ventas.cliente_id')
            ->where('clientes.nombre','LIKE','%'.$query.'%')
            ->where('nota_ventas.estado','=','1')
            ->get();
            return view('ventas.index',['notas'=>$nota]);
        }
    }

    public function create()
    {
        $clientes = Cliente::All();
        $productos = Producto::All();
        return view('ventas.create',compact('clientes','productos'));
    }

    public function store(Request $request)
    {
      
        
        
    }
    public function show($id)
    {
        $persona = DB::table('nota_ventas')
        ->join('clientes','clientes.id','=','nota_ventas.cliente_id')
        ->where('nota_ventas.id','=',$id)
        ->get();
        $producto = DB::table('nota_ventas')
        ->join('detalle_ventas','detalle_ventas.nota_id','=','nota_ventas.id')
        ->join('productos','productos.id','=','detalle_ventas.producto_id')
        ->where('nota_ventas.id','=',$id)
        ->get();
        return view('ventas.show',[
            'persona'=>$persona,
            'producto'=>$producto
        ]);
    }

    
    public function destroy($id)
    {
        $ventas = Nota_venta::findOrFail($id);
        $ventas->estado=0;
        $ventas->update();
        return redirect('/ventas');
    }
}
