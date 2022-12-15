@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Lista Nota Compras <a href="{{route("comprar.index")}}">
        <button type="button" class="btn btn-success float-right">Agregar compras</button></a> </h2>

 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Fecha</th>
        <th scope="col">Proveedor</th>
        <th scope="col">Monto Total</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    @foreach ($notas as $nota)
      <tr>
        <th scope="row">{{$nota->id}}</th>
        <td>{{$nota->fecha}}</td>
        <td>{{ $nota->nombre.' '.$nota->apellido}}</td>
        <td>{{$nota->monto_total}}</td>
        <td>
          <form action="{{route('compras.destroy',$nota->id)}}" method="POST">
                       <a href="{{route('compras.show',$nota->id)}}"><button type="button" class="btn btn-secondary">Detalle</button></a> 
            
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