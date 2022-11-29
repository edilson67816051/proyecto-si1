@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Detalle venta #{{$producto[0]->nota_id}}  <a href="{{route("ventas.index")}}">
        <button type="button" class="btn btn-success float-right">salir</button></a> </h2>
      <h2>Nombre: {{$persona[0]->nombre}} {{$persona[0]->apellido_p}} </h2>
 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">DETALLE</th>
        <th scope="col">CANTIDAD</th>
        <th scope="col">PRECIO UNIT.</th>
        <th scope="col">TOTAL</th>
      </tr>
    </thead>
    @foreach ($producto as $detalle)
      <tr>
        <th scope="row">{{$detalle->codigo}}</th>
        <td>{{$detalle->name}}</td>
        <td>{{$detalle->cantidad }}</td>
        <td>{{number_format($detalle->precio_venta,2)}}</td>
        <td>{{number_format($detalle->sub_total,2)}}</td>
      </tr>
    @endforeach
    <body>
      <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Total</td>
          <td>{{number_format($persona[0]->total_venta,2)}} bs</td>
      </tr>
  </body> 
  </table>
</div>
@endsection