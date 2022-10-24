<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::All();
        return view('categorias.index',['categorias'=>$categorias]);
    } 

    public function create(){
        return view('categorias.create');
    }

    public function store(Request $request){
        $categoria = new Categoria();

        $categoria->name = request('name');
        $categoria->descripcion = request('descripcion');

        $categoria->save();
        return redirect('/categorias');

    }
}
