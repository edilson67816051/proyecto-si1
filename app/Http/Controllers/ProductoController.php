<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index',['productos'=>$productos]);
    }

    public function create()
    {
        $categoria = Categoria::All();
        return view('productos.create',['categorias'=>$categoria]);
    }

    //almacena los nuevos registros creados en la base de datos

    public function store(Request $request)
    {
        $producto = new Producto();

       

        $producto->categoria_id=request('categoria');
        $producto->name = request('name');
        $producto->codigo = request('codigo');
        $producto->stock = request('stock');
        $producto->descripcion = request('descripcion');

        if ($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $nombre = request('name').'.'.$imagen->getClientOriginalExtension();
            $url=public_path('imagenes\productos');
            $request->imagen->move($url,$nombre);
            $producto->imagen=$nombre;
        }
        $producto->save();
        return redirect('/productos');
    }
    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);

        $productos->delete();
        return redirect('/productos');
    }
}
