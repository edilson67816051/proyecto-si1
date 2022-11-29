@extends('layouts.app')

@section('content')
<div class="container">
<form action="/clientes" method="POST" >
@csrf
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="cliente" class="form-label">Cliente</label>
                <select name="cliente" class="form-control">
                    <option selected disabled> </option>
                    @foreach ($clientes as $s)
                    <option value="{{$s->id}}" >{{$s->nombre.' '.$s->apellido_p.' '.$s->apellido_m}}</option>
                    @endforeach
                </select>
             </div>
        </div>
        
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group" >
                        <label>Producto</label>
                        <select name="id" class="form-control" id="id">
                            @foreach ($productos as $s)
                            <option value="{{$s->id}}" >{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>  
                </div>      
                <div class="col-lg-12 col-sm-3 col-md-3 col-xs-3">    
                        <div class="form-group" >   
                            <label for="cantidad">Cantidad</label>
                            <input type="text" class="form-control" name="cantidad">
                        </div>    
                </div>    
                <div class="col-lg-12 col-sm-3 col-md-3 col-xs-3">    
                    <div class="form-group" >   
                        <label for="precio venta">Precio Venta</label>
                        <input type="text" class="form-control" name="cantidad">
                    </div>    
                </div>   
                <div class="col-lg-12 col-sm-3 col-md-3 col-xs-3">    
                    <div class="form-group" >   
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>    
                </div>   
                <div class="col-lg-12 col-sm-3 col-md-3 col-xs-3">    
                    <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Opciones</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio venta</th>
                            <th>Sub total</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id='sub total'>S./. 0.00</h4></th>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>    
                </div>  
                                
            </div>
        </div>
       
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </div>
</form>
</div>
@endsection