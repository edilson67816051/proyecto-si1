@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Modificar el Producto: <br> {{$producto->name}}</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
        <form class="row g-3" action="{{route('productos.update',$producto->id)}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="col-md-5">
                <label for="name">Nombre</label>
                <input type="text" required minlength="3" maxlength="50" class="form-control" value='{{$producto->name}}' name="name" placeholder="Nombre...">
            </div>
            <div class="col-md-5">
                <label for="categoria">Categoria</label>
                    <select name="categoria" class="form-control">
                        <option selected disabled>  Elige una Categoria ...</option>
                        @foreach ($categorias as $c)
                        <option value="{{$c->id}}" >{{$c->name}}</option>
                        @endforeach
                    </select>
            </div>        
            <div class="col-md-5">
                <label for="codigo">Codigo</label>
                <input type="text"required  minlength="3" maxlength="20" class="form-control" value="{{$producto->codigo}}" name="codigo" placeholder="Codigo del producto...">
            </div>
            <div class="col-md-5">
                <label for="Stock">Stock</label>
                <input type="text" required maxlength="30" class="form-control" value="{{$producto->stock}}" name="stock" placeholder="Stock...">
            </div>
           
            <div class="col-md-5">
                <label for="precio">precio</label>
                <input type="text" required maxlength="4" class="form-control" name="precio" value="{{$producto->precio}}" placeholder="precio...">
            </div>
            <div class="col-md-5">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="{{$producto->descripcion}}" placeholder="Descripcion del producto...">
            </div>

            
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{url('productos')}}">
                    <button type="" class="btn btn-danger">Cancelar</button>
                </a>
            </div>   
        </form>

</div>
@endsection