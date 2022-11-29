@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Lista de los clientes registrado <a href="clientes\create">
        <button type="button" class="btn btn-success float-right">Agregar cliente</button></a> </h2>

 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">CI</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Genero</th>
        <th scope="col">Telefono</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    @foreach ($clientes as $cliente)
      <tr>
        <th scope="row">{{$cliente->ci}}</th>
        <td>{{$cliente->nombre}}</td>
        <td>{{$cliente->apellido_p}} {{$cliente->apellido_m}}</td>
        <td>{{$cliente->genero}}</td>
        <td>{{$cliente->telefono}}</td>
        <td>
         
          <form action="{{route('clientes.destroy',$cliente->id)}}" method="POST">
             <a href="{{route('clientes.edit',$cliente->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>
            
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