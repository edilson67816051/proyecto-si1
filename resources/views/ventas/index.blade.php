@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Lista Nota Ventas <a href="{{route("vender.index")}}">
        <button type="button" class="btn btn-success float-right">Agregar venta</button></a> </h2>

 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Fecha</th>
        <th scope="col">Cliente</th>
        <th scope="col">Monto Total</th>
        <th scope="col">Estado</th>
      </tr>
    </thead>
    @foreach ($notas as $nota)
      <tr>
        <th scope="row">{{$nota->id}}</th>
        <td>{{$nota->fecha}}</td>
        <td>{{ $nota->nombre.' '.$nota->apellido_p }}</td>
        <td>{{$nota->total_venta}}</td>
        <td>
          <form action="{{route('ventas.destroy',$nota->id)}}" method="POST">
            <a href="{{route('ventas.store',$nota->id)}}"><button type="button" class="btn btn-info">Facturar</button></a> 
             <a href="{{route('ventas.show',$nota->id)}}"><button type="button" class="btn btn-secondary">Detalle</button></a> 
            
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