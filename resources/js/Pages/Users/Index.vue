<template>
	<v-container>
		
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Usuarios</h5>
				<Link href="users/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Agregar
					</v-btn>
				</Link>
			</v-row>
			<v-card class="p-0 m-0">
				<v-card-text>
					<v-table class="table table-striped card-text">
						<thead>
							<tr>
								<td></td>
								<td>#</td>
								<td>Documento</td>
								<td>Nombre</td>
								<td>Usuario</td>
								<td>E-mail</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="user in users.data" :key="user.id" >
								<td class="text-left">
									<div class="btn-group dropend">
										<button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fas fa-ellipsis-v"></i>
										</button>
										<ul class="dropdown-menu align-items-center">
											<li>
												<Link
													class="dropdown-item align-self-center"
													@click="editRedirect(user.id)"
												>
													<v-icon icon="fas fa-edit"></v-icon> 
													Editar
												</Link>
											</li>
										</ul>
									</div>
								</td>
								<td>{{ user.id }}</td>
								<td>{{ user.document_number }}</td>
								<td>{{ user.fullname }}</td>
								<td>{{ user.username }}</td>
								<td>{{ user.email }}</td>
								<td class="text-center text-white">
									<span :class="[user.status.badge]">
										{{ user.status.name }}
									</span>
								</td>
							</tr>			
						</tbody>
					</v-table>
					<pagination :links="users.links" />
				</v-card-text>
			</v-card>
			<!-- <div class="container-fluid px-md-4 px-md-5">
				<div class="row">
					<div class="col-md-12">
						<div class="card p-0 m-0">
							<div class="card-header p-3">
								<div class="d-flex justify-content-between">
									<h4 class="card-heading">Usuarios</h4>
									<Link href="users/create" class="btn btn-outline-success btn-sm">
										<i class="fas fa-plus"></i> Agregar
									</Link>
								</div>
							</div>
							<div class="card-body p-0">
								
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</v-responsive>
	</v-container>
</template>

<script>
	import Pagination from '../shared/Paginator.vue'
	import { Link } from '@inertiajs/inertia-vue3';
	import { Inertia } from '@inertiajs/inertia';

	export default {
		components: {
			Pagination,
			Link
		},
		props: {
			users: Object
		}, 
		methods: {
			editRedirect(id){
				Inertia.visit('users/' + id + '/edit');
			}
		}
	}
</script>