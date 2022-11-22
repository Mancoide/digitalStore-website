@extends('layouts.admin')

@section('content')
<div class="container-fluid px-md-4 px-md-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card p-0 m-0">
				<div class="card-header p-3">
					<div class="d-flex justify-content-between">
						<h4 class="card-heading">Roles</h4>
						<a class="btn btn-outline-success btn-sm" href="{{ url('roles/create') }}"><i class="fas fa-plus"></i> Agregar</a>
					</div>
				</div>
				<div class="card-body p-0">
					<table class="table table-striped card-text">
						<thead>
							<tr>
								<td>Nombre</td>
								<td>Descripcion</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $role)
								<tr>
									<td>{{ $role->name }}</td>
									<td>{{ $role->description }}</td>
									<td class="text-end">
										<a href="{{ url('roles/'. $role->id . '/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
									</td>
								</tr>							
							@endforeach
						</tbody>
					</table>
					{{ $roles->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection