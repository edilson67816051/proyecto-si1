@extends('layouts.app')

@section('content')
<h1>Detalles del Producto</h1>
<div class="row">
    <div class="col-4">
        @if ($producto->imagen)
                  <img src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="{{$producto->name}}" height="300px" width="300px" class="img-thumbnail">
               @endif
    </div>
    <div class="row col-8">
        <div class="col-6">
            <label for="codigo">Codigo</label>
            <input type="text" value="{{$producto->codigo}}" class="form-control">
        </div>
        <div class="col-6">
            <label for="codigo">Nombre</label>
            <input type="text" value="{{$producto->name}}" class="form-control">
        </div>
        <div class="col-3">
            <label for="codigo">Stock</label>
            <input type="text" value="{{$producto->stock}}" class="form-control">
        </div>
        <div class="col-3">
            <label for="codigo">Precio</label>
            <input type="text" value="{{$producto->precio}}" class="form-control">
        </div>
        <div class="col-6">
            <label for="codigo">Categoria</label>
            <input type="text" value="{{$categoria->name}}" class="form-control">
        </div>
        <div class="col-12">
            <label for="codigo">Descripcion</label>
            <input type="text" value="{{$producto->descripcion}}" class="form-control">
        </div>
    </div>
        <div class="col-4">
            <br>
            <a href="{{url('productos')}}">
                <button href="submit" class="btn btn-primary">Salir</button>
            </a>            
        </div>  
    
</div>

@endsection