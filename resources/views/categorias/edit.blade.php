@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Modificar los datos de la Categoria: <br> {{$categoria->name}}</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('categorias.update',$categoria->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" maxlength="30" name="name"  value="{{$categoria->name}}"  placeholder="Escribe el Nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                     <textarea name="descripcion" maxlength="100" class="form-control" cols="30" rows="3">{{$categoria->descripcion}}</textarea>
                     
                </div>         
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>
         </div>
    </div>
</div>
@endsection