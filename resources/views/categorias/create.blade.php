@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Nueva Categoria</h1>
    <div class="row">
        <div class="col-sm-3">
            <form action="/categorias" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Escribe el Nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="Escribe una descripcion">
                </div>         
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>
         </div>
    </div>
</div>
@endsection