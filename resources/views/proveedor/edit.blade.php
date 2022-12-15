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
    <form action="{{route('proveedor.update',$proveedor->id)}}" method="POST"  class="row g-3" >
      @method('PATCH')
        @csrf
        <div class="col-md-4">
            <label for="ci">Ci</label>
            <input type="text" value='{{$proveedor->ci}}' required minlength="3" maxlength="10" class="form-control" name="ci" placeholder="Escribe su ci">
        </div>
        <div class="col-md-4">
            <label for="nombre">Nombre</label>
            <input type="text" value='{{$proveedor->nombre}}' required minlength="3" maxlength="10" class="form-control" name="nombre" placeholder="Escribe su nombre">
        </div>
        <div class="col-md-4">
            <label for="apellido">Apellido Paterno</label>
            <input type="text" value='{{$proveedor->apellido}}' required minlength="3" maxlength="10" class="form-control" name="apellido" placeholder="Escribe su Apellido">
        </div>
          <div class="col-md-4">
            <label for="telefono">Telefono</label>
            <input type="text" value='{{$proveedor->telefono}}' required minlength="3" maxlength="10" class="form-control" name="telefono" placeholder="Escribe su telefono">
          </div>
          <div class="col-md-2">
              <label for="ciudad" class="form-label">Ciudad</label>
              <select name="ciudad" class="form-control">
                <option selected disabled> selecione un ciudad ..</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="La Paz">La Paz</option>
                <option value="Cochabamba">Cochabamba</option>
                <option value="Beni">Beni</option>
                <option value="Cotoca">Cotoca</option>
                <option value="Montero">Montero</option>
                <option value="Warnes">Warnes</option>
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