@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Lista de usuarios regitrados <a href="usuarios\create">
        <button type="button" class="btn btn-success float-right">Agragar Usuario</button></a> </h2>

 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    @foreach ($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->apellido}}</td>
        <td>{{$user->email}}</td>
        <td>
         
          <form action="{{route('usuarios.destroy',$user->id)}}" method="POST">
             <a href="{{route('bitacora.show',$user->id)}}"><button type="button" class="btn btn-secondary">Detalle</button></a>
            
           </form>
        </td>
      </tr>
    @endforeach
     
  </table>
</div>
@endsection