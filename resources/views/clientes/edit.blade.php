@extends('layouts.app')

@section('content')

<div class="container">
  @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form action="{{route('clientes.update',$cliente->id)}}" method="POST"  class="row g-3" >
      @method('PATCH')
        @csrf
        <div class="col-md-4">
            <label for="ci">Ci</label>
            <input type="text" value='{{$cliente->ci}}' required minlength="3" maxlength="10" class="form-control" name="ci" placeholder="Escribe su ci">
        </div>
        <div class="col-md-4">
            <label for="nombre">Nombre</label>
            <input type="text" value='{{$cliente->nombre}}' required minlength="3" maxlength="10" class="form-control" name="nombre" placeholder="Escribe su nombre">
        </div>
        <div class="col-md-4">
            <label for="apellido_p">Apellido Paterno</label>
            <input type="text" value='{{$cliente->apellido_p}}' required minlength="3" maxlength="10" class="form-control" name="apellido_p" placeholder="Escribe su Apellido paterno">
        </div>
        <div class="col-md-4">
            <label for="apellido_m">Apellido Materno</label>
            <input type="text" value='{{$cliente->apellido_m}}' required minlength="3" maxlength="10" class="form-control" name="apellido_m" placeholder="Escribe su Apellido Materno">
          </div>
          <div class="col-md-4">
            <label for="telefono">Telefono</label>
            <input type="text" value='{{$cliente->telefono}}' required minlength="3" maxlength="10" class="form-control" name="telefono" placeholder="Escribe su telefono">
          </div>
          <div class="col-md-2">
              <label for="genero" class="form-label">Genero</label>
              <select name="genero" class="form-control">
                <option selected disabled> selecione un genero ..</option>
                <option value='M'> Masculino</option>
                <option value='F'> Femenino</option>

            </select>
          </div>
        <div class="col-12">
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>

      </form>
</div>
@endsection