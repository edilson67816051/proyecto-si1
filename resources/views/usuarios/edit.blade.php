@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3">

                 <h3>Editar Usuario:: {{$user->name}}</h3>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <form action="{{route('usuarios.update',$user->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Escribe tu nombre">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="{{$user->username}}" placeholder="Escribe tu nombre">
                </div>
               
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="{{$user->apellido}}" placeholder="Escribe tu Apellido">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Escribe tu imail">
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
                <a href="/usuarios"><button type="reset" class="btn btn-danger">Cancelar</button></a>
            </form>
         </div>
    </div>
</div>
@endsection