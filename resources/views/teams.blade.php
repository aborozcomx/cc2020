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
			<table class="table table bg-light">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Equipo</th>
			    </tr>
			  </thead>
			  <tbody>
				@php
					$i = 1;	
				@endphp
			    @foreach ($teams as $team)
			    		@if($team->nombre)
				    		<tr>
					      <th scope="row">{{ $i }}</th>
					      <td>{{$team->nombre}}</td>
					    </tr>
					@endif
					@php
						$i += 1;
					@endphp
			    @endforeach
			  </tbody>
			</table>
		</div>
	</section>
	
@endsection