<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Http\Requests\ProductoFormRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $query = trim($request->get('search'));
            $producto = Producto::where('name','LIKE','%'.$query.'%')
            ->where('estado','=',1)
            ->orderBy('id','asc')
            ->get();
            return view('productos.index',['productos'=>$producto]);
        }
    }

    public function edit($id){
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::All();
        return view('productos.edit',['categorias'=>$categorias,'producto'=>$producto]);
    }
    public function update(Request $request, $id){

        $producto = Producto::findOrFail($id);
        
        if ($request->get('categoria') != null){
            $producto->categoria_id=$request->get('categoria');
        }

        $producto->name = $request->get('name');
        $producto->codigo = $request->get('codigo');
        $producto->stock = $request->get('stock');
        $producto->precio = $request->get('precio');
        $producto->descripcion = $request->get('descripcion');

        $producto->update();
        
        return redirect('/productos');
    }

    public function create()
    {
        $categoria = Categoria::All();
        return view('productos.create',['categorias'=>$categoria]);
    }

   
    //almacena los nuevos registros creados en la base de datos

    public function store(ProductoFormRequest $request)
    {
        $producto = new Producto();

        $producto->categoria_id=request('categoria');
        $producto->name = request('name');
        $producto->codigo = request('codigo');
        $producto->stock = request('stock');
        $producto->precio = request('precio');
        $producto->descripcion = request('descripcion');
        $producto->estado=1;

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
        $productos->estado=0;
        $productos->update();
        return redirect('/productos');
    }

    public function show($id){
        $producto = Producto::findOrFail($id);
        $categoria = Categoria::findOrFail($producto->categoria_id);
        return view('productos.detalle',['producto'=>$producto,'categoria'=>$categoria]);
    }
}
