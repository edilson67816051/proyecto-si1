@extends('layouts.app')

@section('content')
    <div class="rew">
        <div class="col-12">
            <h1>Nueva Compra<i class="fa fa-cart-plus"></i></h1>
            @include("notificacion")
            <div class="row">
                <div class="col-12 col-md-5">
                    <form action="{{route("terminarOCancelarCompra")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_proveedor">Proveedor</label>
                            <select required class="form-control" name="id_proveedor" id="id_proveedor">
                                @foreach($proveedor as $proveedor)
                                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        @if(session("productos") !== null)
                            <div class="form-group">
                                <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                    venta
                                </button>
                                <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                    venta
                                </button>
                            </div>
                        @endif
                    </form>
                </div>

                <form action="{{route("agregarProductoCompra")}}" method="post" class="row">
                    @csrf
                <div class="col-12 col-md-7">            
                        <div class="form-group">
                            <label for="codigo">Código de barras</label>
                            <select required class="form-control" name="codigo" id="codigo">
                                @foreach($product as $p)
                                    <option value="{{$p->codigo}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>   
                        <div class="form-group">
                            <button name="accion" value="cargar" type="submit" class="btn btn-success">Cargar
                            </button>    
                        </div>                  
                   
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="ci">Cantidad</label>
                        <input type="number" class="form-control" value='1'  name="cantidad" placeholder="cantidad">
                    </div>   
                    <div class="from-group">
                        <label for="ci">Precio</label>
                        <input type="number" class="form-control" value="1" name="precio" placeholder="precio">
                    </div>
                </div>    
              </form>    
            </div>
            @if(session("productos") !== null)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub Total</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <body>
                        @foreach(session("productos") as $producto)
                            <tr>
                                <td>{{$producto->codigo}}</td>
                                <td>{{$producto->name}}</td>
                                <td>{{number_format($producto->precio,2)}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>{{number_format($producto->Subtotal,2)}}</td>
                                <td>
                                    <form action="{{route("quitarProductoDeCompra")}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" name="indice" value="{{$loop->index}}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </body>
                    <body>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{number_format($total,2)}} bs</td>
                        </tr>
                    </body>
                </table>
            </div>
            @endif
        </div>

    </div>
@endsection