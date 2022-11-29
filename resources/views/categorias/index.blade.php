@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h2>Lista de las Categoria <a href="categorias\create">
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
          <th>Descripcion</th>
          <th>Opciones</th>
        </thead>
        @foreach ($categorias as $p)
          <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->descripcion}}</td>
  
            <td>
              <form action="{{route('categorias.destroy',$p->id)}}" method="POST">
                <a href="{{route('categorias.edit',$p->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>             
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
<div class="row">
  <div class="mx-auto">
   {{$categorias->links()}}
  </div>
</div>

@endsection