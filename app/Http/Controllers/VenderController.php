<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Producto;
use App\Detalle_venta;
use App\Nota_venta;

use Illuminate\Http\Request;

class VenderController extends Controller
{
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
    
    public function quitarProductoDeVenta(Request $request)
    {
        $indice = $request->post("indice");
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        $this->guardarProductos($productos);
        return redirect()
            ->route("vender.index");
    }

    
    public function agregarProductoVenta(Request $request){

        $codigo = $request->post("codigo");
        $cantidad =request('cantidad');
        $producto = Producto::where("codigo", "=", $codigo)->first();
        if (!$producto) {
            return redirect()
                ->route("vender.index")
                ->with("mensaje", "Producto no encontrado");
        }

        $this->agregarProductoACarrito($producto,$cantidad);
        
        return redirect()->route("vender.index");

    }

    private function agregarProductoACarrito($producto,$cantidad)
    {
        if ($producto->stock <= 0) {
            return redirect()->route("vender.index")
                ->with([
                    "mensaje" => "No hay existencias del producto",
                    "tipo" => "danger"
                ]);
        }

        $productos = $this->obtenerProductos();

        $posibleIndice = $this->buscarIndiceDeProducto($producto->codigo, $productos);

        
        
        if ($posibleIndice === -1){
            if($producto->stock >=$cantidad){
                $producto->cantidad = $cantidad;
                $producto->Subtotal = $producto->precio*$cantidad;
                array_push($productos, $producto);
            }else{
                return redirect()->route("vender.index")
                    ->with([
                        "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                        "tipo" => "danger"
                    ]);
            }
        }else{        
                if($producto->stock >= ($productos[$posibleIndice]->cantidad+$cantidad)){
                    $productos[$posibleIndice]->cantidad+=$cantidad;
                    $productos[$posibleIndice]->Subtotal +=  $productos[$posibleIndice]->precio*$cantidad;
                }else{
                    return redirect()->route("vender.index")
                    ->with([
                        "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                        "tipo" => "danger"
                    ]);
                }
        }

        $this->guardarProductos($productos);
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


    public function Monto_total(){
        $total = 0;
          foreach ($this->obtenerProductos() as $producto) {
            $total += $producto->Subtotal;
        }
        return $total;
    }

    public function index()
    {       
        return view("vender.vender",
            [
                "total" => $this->Monto_total(),
                "clientes" => Cliente::all(),
                "product" => Producto::all(),
            ]);
    }

    public function terminarOCancelarVenta(Request $request){
        if ($request->input("accion") == "terminar") {
            return $this->terminarVenta($request);
        } else {
            return $this->cancelarVenta();
        }
    }

    public function terminarVenta(Request $request){
        $venta = new Nota_venta();

        $venta->cliente_id = request("id_cliente");
        $venta->user_id =1;
        $venta->fecha = date('Y-m-d H:i:s');
        $venta->total_venta =$this->Monto_total();
        $venta->estado ='1';
        $venta->decuento = 0.0;
        $venta->save();

        $productos = $this->obtenerProductos();
        foreach ($productos as $producto){
            $productovendido = new Detalle_venta();
            $productovendido->fill([
                "nota_id" =>$venta->id,
                "producto_id" =>$producto->id,
                "cantidad" => $producto->cantidad,
                "precio_venta" => $producto->precio,
                "sub_total" => $producto->Subtotal,
            ]);
            $productovendido->save();
            $productoActualizado = Producto::find($producto->id);
            $productoActualizado->stock -= $productovendido->cantidad;
            $productoActualizado->saveOrFail();
        }
        $this->vaciarProductos();
        return redirect('/ventas');
    }
    public function cancelarVenta()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("vender.index")
            ->with("mensaje", "Venta cancelada");
    }
}