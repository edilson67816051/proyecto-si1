<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_compra;
use App\Nota_compra;
use App\proveedor;
use App\Producto;
use DB;

use Illuminate\Support\Carbon;
use Response;
use Illuminate\support\Collection;

class CompraController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $nota = DB::table('proveedors')
            ->join('nota_compras','proveedors.id','=','nota_compras.proveedor_id')
            ->where('proveedors.nombre','LIKE','%'.$query.'%')
            ->where('nota_compras.estado','=','1')
            ->get();
            return view('compras.index',['notas'=>$nota]);
        }
    }

    public function create()
    {
        $clientes = Proveedor::All();
        $productos = Producto::All();
        return view('compras.create',compact('clientes','productos'));
    }

    public function show($id)
    {
        $proveedor = DB::table('nota_compras')
        ->join('proveedors','proveedors.id','=','nota_compras.proveedor_id')
        ->where('nota_compras.id','=',$id)
        ->get();
        
        $producto = DB::table('nota_compras')
        ->join('detalle_compras','detalle_compras.nota_id','=','nota_compras.id')
        ->join('productos','productos.id','=','detalle_compras.producto_id')
        ->where('nota_compras.id','=',$id)
        ->get();
        return view('compras.show',[
            'persona'=>$proveedor,
            'producto'=>$producto
        ]);
    }

    public function store($id)
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
        return view('ventas.facturar',[
            'persona'=>$persona,
            'producto'=>$producto
        ]);
    }

    public function destroy($id)
    {
        $ventas = Nota_compra::findOrFail($id);
        $ventas->estado=0;
        $ventas->update();
        DB::table('bitacoras')->insert(array('actividad'=>'Elimino una compra',
        'fecha'=>date('Y-m-d H:i:s'),'users_id'=>auth()->user()->id,'estado'=>1));

        return redirect('/compras');
    }
}
