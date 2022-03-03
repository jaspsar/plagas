	<h1>{{ $modo }} plaga</h1>
@if(count($errors)>0)

	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error}}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="form-group">
	<label for="Nombrecom">Nombre comercial</label>
	<input type="text" class="form-control" name="Nombre" id="Nombre" value="{{isset($plaga->Nombre)?$plaga->Nombre:old('Nombre')}}">
	
</div>

<div class="form-group">
	<label for="IngredienteAct">Ingrediente Activo</label>
	<input type="text" class="form-control" name="Ingrediente" id="Ingrediente" value="{{isset($plaga->ingrediente)?$plaga->ingrediente:old('Ingrediente')}}">
	
</div>
	<label for="Activo">Concentracion</label>
	<input type="number" class="form-control" name="Concentracion" id="Concentracion" value="{{isset($plaga->concentracion)?$plaga->concentracion:old('Concentracion')}}">
	
<div class="form-group">
	<label for="Fecha">fecha</label>
	<input type="date" class="form-control" name="fecha" id="fecha" value="{{isset($plaga->fecha)?$plaga->fecha:''}}">
	<br>
</div>




	<input type="submit" class="btn btn-success" value="{{ $modo }} Datos" >
	
	<a href="{{url('plagas/')}}" class="btn btn-danger">Cancelar / regresar </a>

