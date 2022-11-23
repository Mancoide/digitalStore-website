<template>
	<div class="container-fluid px-md-4 px-md-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card p-0 m-0">
					<div class="card-header p-3">
						<div class="d-flex justify-content-between">
							<!-- <h4 class="card-heading">{{ __('resources.titles.users') }}</h4> -->
							<!-- <a class="btn btn-outline-success btn-sm" href="{{ url('users/create') }}"><i class="fas fa-plus"></i> {{ __('resources.buttons.add') }}</a> -->
						</div>
					</div>
					<div class="card-body p-0">
						<table class="table table-striped card-text">
							<thead>
								<tr>
									<td>#</td>
									<td>Documento</td>
									<td>Nombre</td>
									<td>Usuario</td>
									<td>E-mail</td>
									<td>Estado</td>
									<td></td>
								</tr>
							</thead>
							<tbody v-for="user in users.data" :key="user.id">
								<tr>
									<td>{{ user.id }}</td>
									<td>{{ user.document_number }}</td>
									<td>{{ user.fullname }}</td>
									<td>{{ user.username }}</td>
									<td>{{ user.email }}</td>
									<td class="text-right">
										{{ user.status }}
									</td>
									<td></td>
								</tr>			
							</tbody>
						</table>
						<!-- {{ $users->links() }} -->
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		props: {
			users: Object
		}
	}
</script>
