@extends('layouts.app')
@section('content')
<div class="container">
	<div class="alert alert-success alert-dismissible">
		@if(Session::has('mensaje')){{
			Session::get('mensaje')}}

		@endif
		
	</div>

	<a href="{{url('plagas/create')}}" class="btn btn-success">Registrar nuevo plaguicida</a>
	<br>
	<br>
	<table class="table table-light">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Nombre comercial</th>
				<th>Ingrediente Activo</th>
				<th>Concentracion</th>
				<th>Fecha de registro</th>
				<th>Acciones</th>		
			</tr>
		</thead>
		<tbody>
			@foreach($plagas as $plaga)
			<tr>
				<td>
					{{$plaga->id}}
				</td>
				<td>
					{{$plaga->Nombre}}
				</td>
				<td>
					{{$plaga->ingrediente}}
				</td>
				<td>
					{{$plaga->concentracion}}
				</td>
				<td>
					{{$plaga->fecha}}
				</td>
				<td><a href="{{url('/plagas/'.$plaga->id.'/edit')}}" class="btn btn-warning">Editar</a> 

					<form action="{{ url('/plagas/'.$plaga->id)}}" method="post" class="d-inline">
						@csrf
						{{method_field('DELETE')}}
						<input type="submit" onclick="return confirm('¿deseas borrar este articulo?')" value="Borrar" 
						name="" class="btn btn-danger">
					</form>

				</td>
			</tr>
			@endforeach
		</tbody>
			
		
	</table>

</div>
@endsection