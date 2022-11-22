@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="card p-0 m-0">
		<div class="card-header">
			<h5 class="card-heading">Crear Rol</h5>
		</div>
		{{ Form::open(['route' => 'roles.store']) }}
			<div class="card-body">
				<div class="row">
					<div class="form-group col-md-4">
						<label>Nombre</label>
						<input class="form-control" name="name" type="text">
					</div>
					<div class="form-group col-md-8">
						<label>Descripción</label>
						<input class="form-control" name="description" type="text">
					</div>
				</div>
			</div>
			<hr class="bg-gray-400 my-4">
			<div class="card-body">
				@foreach(config('constants.roles_permisions') as $key => $permission_header)
					<div class="row">
						<div class="form-group col-md-12 text-left">
							<h5>{{ $permission_header }}</h5>	
						</div>
					</div>
					@if(isset($permissions[$key]))
						@foreach($permissions[$key] as $key2 => $permission)
							<div class="row pb-1">
								<div class="form-group col-md-12 text-left">
									<input type="checkbox" name="permission_ids[]" value="{{ $permission['id'] }}" {{ in_array($permission['id'], old('permission_ids', [])) ? 'checked' : '' }} > {{ $permission['display_name'] }}
								</div>
							</div>
						@endforeach
					@endif
					<hr class="bg-gray-400 my-6">
				@endforeach
			</div>
			<div class="card-footer">
				<input type="submit" class="btn btn-primary" value="Guardar">
				<a href="{{ url('roles') }}" class="btn btn-danger">Cancelar</a>
			</div>
		{{ Form::close() }}
	</div>
</div>
@endsection