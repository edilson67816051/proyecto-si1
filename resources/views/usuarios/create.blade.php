@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <form  action="/usuarios" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ci">Ci</label>
                    <input type="text" required minlength="3" maxlength="10" class="form-control" name="ci" placeholder="Escribe tu nombre">
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" required minlength="3" maxlength="20" class="form-control" name="name" placeholder="Escribe tu nombre">
                </div>
                <div class="form-group">
                    <label for="username">Nombre</label>
                    <input type="text" required minlength="3" maxlength="20" class="form-control" name="username" placeholder="Escribe tu username">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text"required  minlength="3" maxlength="20" class="form-control" name="apellido" placeholder="Escribe tu apellido">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" required maxlength="30" class="form-control" name="email" placeholder="Escribe tu imail">
                </div>
                <div class="form-group">
                    <label for="email">Rol</label>
                    <select name="rol" class="form-control">
                        <option selected disabled> Elige un rol ...</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}" >{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>
         </div>
    </div>
</div>
@endsection