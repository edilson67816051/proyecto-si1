@extends('layouts.app')

@section('content')
<div class="container">
    <form class="row g-3">
        <div class="col-md-3">
            <label for="inputZip" class="form-label">Codigo</label>
            <input type="text" class="form-control" value={{$user->id}}>
          </div>
          <div class="col-md-3">
            <label for="inputZip" class="form-label">Username</label>
            <input type="text" class="form-control" value={{$user->username}}>
          </div>
        <div class="col-md-4">
          <label for="inputEmail4" class="form-label">Nombre</label>
          <input type="text" class="form-control"  value={{$user->name}}>
        </div>
        <div class="col-md-4">
          <label for="inputPassword4" class="form-label">Apellido</label>
          <input type="text" class="form-control"  value={{$user->apellido}}>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="text" class="form-control" id="inputEmail4" value={{$user->email}}>
          </div>       
      </form>
    </div>
@endsection