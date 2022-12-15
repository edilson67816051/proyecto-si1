<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Bitacora;
use App\User;

class BitacoraController extends Controller
{
    public function index(Request $request)
    {
 
        $users = User::all();
        return view('bitacoras.listar',['users'=>$users]);
        

    }
    public function show($id)
    {
        $bitacoras = Bitacora::where('users_id','=',$id)
            ->orderBy('id','asc')
            ->get();
            return view('bitacoras.index',['bitacoras'=>$bitacoras]);
    }
}
