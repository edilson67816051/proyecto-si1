@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h2>Lista de los Productos <a href={{url("productos\create")}}>
          <button type="button" class="btn btn-success">Nuevo</button></a> 
   </h2>
 </div>  
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-borded table-condensed table-hover">
        <thead>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Imagen</th>
          <th>Descripcion</th>
          <th>Opciones</th>
        </thead>
        @foreach ($productos as $p)
          <tr>
            <td>{{$p->codigo}}</td>
            <td>{{$p->name}}</td>
            <td>
               @if ($p->imagen)
                  <img src="{{asset('imagenes/productos/'.$p->imagen)}}" alt="{{$p->name}}" height="100px" width="100px" class="img-thumbnail">
               @endif
            </td>
            <td>{{$p->descripcion}}</td>

            <td>
                <form action="{{route('productos.destroy',$p->id)}}" method="POST">
                <a href="{{route('productos.show',$p->id)}}"><button type="button" class="btn btn-secondary"><i class="fa fa-info"></i></button></a>
                <a href="{{route('productos.edit',$p->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>             
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </form>
            </td>
            
          </tr>
        @endforeach

      </table>
    </div>
  </div>  
</div>


@endsection