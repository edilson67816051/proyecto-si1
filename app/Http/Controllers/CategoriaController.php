<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CategoriaFormRequest;

class CategoriaController extends Controller
{
    public function index(Request $request){
        if ($request){
            $query = trim($request->get('search'));
            $categorias = Categoria::where('name','LIKE','%'.$query.'%')
            ->where('estado','=',1)
            ->orderBy('id','asc')
            ->paginate(5);
            return view('categorias.index',['categorias'=>$categorias]);
        }
    } 

    public function create(){
        return view('categorias.create');
    }

    public function store(CategoriaFormRequest $request){
        $categoria = new Categoria();

        $categoria->name = request('name');
        $categoria->descripcion = request('descripcion');
        $categoria->estado=1;

        $categoria->save();
        return redirect('/categorias');

    }

    public function destroy($id){

        $categoria =Categoria::findOrFail($id);
        $categoria->estado=0;
        $categoria->save();
        return redirect('/categorias');

    }
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit',['categoria'=>$categoria]);
    }
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->name = $request->get('name');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->update();

        return redirect('/categorias');
    }
}
