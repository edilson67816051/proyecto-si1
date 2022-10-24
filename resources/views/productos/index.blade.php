@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h2>Listar los Productos <a href="productos\create">
          <button type="button" class="btn btn-success">Nuevo</button></a> 
   </h2>
 </div>  
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-borded table-condensed table-hover">
        <thead>
          <th>Id</th>
          <th>Nombre</th>
          <th>Imagen</th>
          <th>Descripcion</th>
          <th>Opciones</th>
        </thead>
        @foreach ($productos as $p)
          <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td>
                  
              <img src="{{asset('imagenes/productos/'.$p->imagen)}}" alt="{{$p->name}}" height="100px" width="100px" class="img-thumbnail">
            </td>
            <td>{{$p->descripcion}}</td>

            <td>
                <form action="{{route('productos.destroy',$p->id)}}" method="POST">
                <a href=""><button type="button" class="btn btn-secondary">Detalle</button></a>
                <a href=""><button type="button" class="btn btn-primary">Editar</button></a>             
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </td>
            
          </tr>
        @endforeach

      </table>
    </div>
  </div>  
</div>


@endsection