@extends('layout_admin')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="/ccadmin">
	  	<img src="/images/logo_cc.png" width="75" height="75" alt="">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <!--<li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>-->
	      <li class="nav-item">
	        <a class="nav-link" href="/ccadmin/equipos">Equipos</a>
	      </li>
	      
	      <li class="nav-item">
	        <a class="nav-link" href="/logout">Cerrar Sesion</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<section class="p-5">
		<div class="container">
            <div class="row d-flex">
                <div class="col-8">
                @if(!$team->pagado)
                    <form action="/ccadmin/equipos/" method="POST">
                            <div class="form-row">
                                <div class="col form-group">
                                    <select for="nombre" class="form-control" name="id_subcategoria">
                                        @foreach ($subcs as $s)
                                            <option value={{$s->id}}>{{ $s->nom_subcategoria}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
        
                                <div class="col">
                                    <select for="nombre" class="form-control" name="id_rama">
                                        @foreach ($ramas as $r)
                                            <option value={{$r->id}}>{{ $r->nom_rama}}</option>
                                        @endforeach
                                    </select>
                                </div>                            
                            </div>
                            
                            <input type="hidden" class="form-control" id="nombre" name="id_equipo" value={{$id}}>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            
                        </form>
                    @endif
                    @if($team)    
                        <h2 class="text-white">{{$team->nombre}}</h2>
                        <hr>
                        
                    @endif
                </div>
                <div class="col-4">   
                    <h2 class="text-white">
                        Resumen
                        @if($team->pagado)
                            <span class="badge badge-success">Pagado</span>
                        @else
                            <span class="badge badge-danger">Pago pendiente</span>
                        @endif
                    </h2>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                          
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($teams as $t)
                                <tr class="text-white">
                                    <td>{{ $t->nom_subcategoria}} {{ $t->nom_rama}}</td>
                                    <td>&nbsp;</td>
                                    <td>${{ $t->costo}}</td>
                                </tr>
                                @php
                                    $total += $t->costo;
                                @endphp
                            @endforeach
                            <tr class="text-white">
                                <td><b>Total</b></td>
                                <td>&nbsp;</td>
                                <td>${{ $total}}</td>
                            </tr>
                        </tbody>
                      </table>
                      <hr>
                      <h2 class="text-white">
                        Pagos
                      </h2>
                      <hr>
                      <form action="/ccadmin/pagos/" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-row">
                            <div class="col-3 form-group">
                                <input type="text" class="form-control" id="nombre" name="monto" placeholder="Monto">
                            </div>
    
                            <div class="col form-group">
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="comprobante">
                                <label for="exampleFormControlFile1" class="text-white">Comprobante</label>
                            </div> 
                        </div>
                        
                        <input type="hidden" class="form-control" id="nombre" name="id_equipo" value={{$id}}>
                        <button type="submit" class="btn btn-primary">Agregar Pago</button>
                        
                    </form>
                   @foreach ($pagos as $p)

                    <div class="d-block mt-2">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal_{{$p->id}}">
                            ${{$p->monto}}
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal_{{$p->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <img class="img-fluid" src="/uploads/{{$p->comprobante}}" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                   @endforeach 
                </div>
            </div>
			
		</div>
	</section>
	
@endsection