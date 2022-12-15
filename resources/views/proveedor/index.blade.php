@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Lista de los Proveedores registrado <a href="proveedor\create">
        <button type="button" class="btn btn-success float-right">Agregar cliente</button></a> </h2>

 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">CI</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Telefono</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    @foreach ($proveedores as $proveedor)
      <tr>
        <th scope="row">{{$proveedor->ci}}</th>
        <td>{{$proveedor->nombre}}</td>
        <td>{{$proveedor->apellido}}</td>
        <td>{{$proveedor->ciudad}}</td>
        <td>{{$proveedor->telefono}}</td>
        <td>
         
          <form action="{{route('proveedor.destroy',$proveedor->id)}}" method="POST">
             <a href="{{route('proveedor.edit',$proveedor->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>
            
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
           </form>
        </td>
      </tr>
    @endforeach
     
  </table>
</div>
@endsection