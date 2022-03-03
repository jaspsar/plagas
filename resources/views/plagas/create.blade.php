@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/plagas')}}" method="post" enctype="multipart/form-data">
	@csrf
	@include('plagas.form',['modo'=>'Agregar'])
</form>
</div>
@endsection