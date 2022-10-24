@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
  <h2>Lista de Roles <a href="roles\create">
    <button type="button" class="btn btn-success float-right">Agragar Roles</button></a> </h2>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody> 
          @foreach ($roles as $rol)
          <tr>
              <th scope="row">{{$rol->id}}</th>
              <td>{{$rol->name}}</td>
             
                      
            </tr>
           
          @endforeach
      
      </tbody>
    </table>
</div>
</div>
</div>
  @endsection