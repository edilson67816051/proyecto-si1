@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Lista de usuarios regitrados </h2>

 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Actividad</th>
        <th scope="col">Fecha</th>
      </tr>
    </thead>
    @foreach ($bitacoras as $bitacora)
      <tr>
        <th scope="row">{{$bitacora->id}}</th>
        <td>{{$bitacora->actividad}}</td>
        <td>{{$bitacora->fecha}}</td>
      </tr>
    @endforeach
     
  </table>
</div>
@endsection