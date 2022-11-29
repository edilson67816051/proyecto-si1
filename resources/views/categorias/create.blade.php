@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Nueva Categoria</h1>
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
            <form action="/categorias" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" maxlength="30" class="form-control" name="name" placeholder="Escribe el Nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                     <textarea name="descripcion" maxlength="100" class="form-control" cols="30" rows="3"></textarea>
                     
                </div>     
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>
         </div>
    </div>
</div>
@endsection