<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proveedor;
use App\Producto;
use App\Detalle_compra;
use App\Nota_compra;
use Illuminate\Support\Facades\DB;

class ComprarController extends Controller
{
    public function index()
    {       
        return view("comprar.comprar",
            [
                "total" => $this->Monto_total(),
                "proveedor" => Proveedor::all(),
                "product" => Producto::all(),
            ]);
    }
    public function Monto_total(){
        $total = 0;
          foreach ($this->obtenerProductos() as $producto) {
            $total += $producto->Subtotal;
        }
        return $total;
    }

    public function agregarProductoCompra(Request $request){

        $codigo = $request->post("codigo");
        $cantidad =request('cantidad');
        $precio = request('precio');
        $producto = Producto::where("codigo", "=", $codigo)->first();
        if (!$producto) {
            return redirect()
                ->route("comprar.index")
                ->with("mensaje", "Producto no encontrado");
        }

        $this->agregarProductoACarrito($producto,$cantidad,$precio);

        

    }

    private function obtenerProductos()
    {
        $productos = session("productos");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }
    
    private function guardarProductos($productos)
    {
        session(["productos" => $productos,
        ]);
    }
    private function vaciarProductos()
    {
        $this->guardarProductos(null);
    }

    private function buscarIndiceDeProducto(string $codigo, array &$productos)
    {
        
        foreach ($productos as $indice => $producto) {
            if ($producto->codigo == $codigo) {
                return $indice;
            }
        }
        return -1;
    }

    private function agregarProductoACarrito($producto,$cantidad,$precio)
    {
        $productos = $this->obtenerProductos();

        $posibleIndice = $this->buscarIndiceDeProducto($producto->codigo, $productos);  
        if ($posibleIndice === -1){
                $producto->cantidad = $cantidad;
                $producto->precio = $precio;
                $producto->Subtotal = $producto->precio*$cantidad;
                array_push($productos, $producto); 
        }else{        
                    $productos[$posibleIndice]->cantidad+=$cantidad;
                    $productos[$posibleIndice]->precio=$precio;
                    $productos[$posibleIndice]->Subtotal +=$precio*$cantidad;      
        }
        $this->guardarProductos($productos);
    }

    public function quitarProductoDeCompra(Request $request)
    {
        $indice = $request->post("indice");
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        $this->guardarProductos($productos);
        return redirect()
            ->route("comprar.index");
    }

    public function terminarOCancelarCompra(Request $request){
        if ($request->input("accion") == "terminar") {
            return $this->terminarVenta($request);
        } else {
            return $this->cancelarVenta();
        }
    }

    public function terminarVenta(Request $request){
        $compra = new Nota_compra();

        $compra->proveedor_id = request("id_proveedor");
        $compra->user_id =auth()->user()->id;
        $compra->fecha = date('Y-m-d H:i:s');
        $compra->monto_total =$this->Monto_total();
        $compra->estado ='1';
        $compra->save();

        $productos = $this->obtenerProductos();
        foreach ($productos as $producto){
            $productocomprado = new Detalle_compra();
            $productocomprado->fill([
                "nota_id" =>$compra->id,
                "producto_id" =>$producto->id,
                "cantidad" => $producto->cantidad,
                "precio_compra" => $producto->precio,
                "sub_total" => $producto->Subtotal,
            ]);
            $productocomprado->save();

            $productoActualizado = Producto::find($producto->id);
            $productoActualizado->stock += $productocomprado->cantidad;
            $productoActualizado->saveOrFail();
        }
        $this->vaciarProductos();
        DB::table('bitacoras')->insert(array('actividad'=>'Realizo una Compra con  id+'.$compra->id,
        'fecha'=>date('Y-m-d H:i:s'),'users_id'=>auth()->user()->id,'estado'=>1));
        return redirect('/compras');
    }
    public function cancelarVenta()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("comprar.index")
            ->with("mensaje", "Compra Cancelada");
    }

}
