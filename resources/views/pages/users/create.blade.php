@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="card p-0 m-0">
		<div class="card-header">
			<h5 class="card-heading">Agregar Usurario</h5>
		</div>
		{{ Form::open(['route' => 'users.store']) }}
			<div class="card-body">
				<div class="row mb-3">
					<div class="form-group col-md-3">
						<label class="form-label text-uppercase">Nro. de Documento</label>
						<input type="text" name="document_number" class="form-control" value="{{ old('document_number') }}">
					</div> 
					<div class="form-group col-md-3">
						<label class="form-label text-uppercase">Nombre/s</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}">
					</div> 
					<div class="form-group col-md-3">
						<label class="form-label text-uppercase">Apellido/s</label>
						<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
					</div> 
					<div class="form-group col-md-3">
						<label class="form-label text-uppercase">Usuario</label>
						<input type="text" name="username" class="form-control" value="{{ old('username') }}">
					</div> 
				</div>
				<div class="row mb-3">
					<div class="form-group col-md-3">
						<label class="form-label text-uppercase">Contraseña</label>
						<input type="password" name="password" class="form-control">
					</div> 
					<div class="form-group col-md-3">
						<label class="form-label text-uppercase">Correo</label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}">
					</div> 
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						{{ Form::select('role_ids[]', $roles, old('roles', []), ['data-placeholder' => 'Seleccione roles' , 'class' => 'form-select', 'select2', 'multiple']) }}
					</div>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" class="btn btn-primary" value="Guardar">
				<a href="{{ url('users') }}" class="btn btn-danger">Cancelar</a>
			</div>
		{{ Form::close() }}
	</div>
</div>
@endsection