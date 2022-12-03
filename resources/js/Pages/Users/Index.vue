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
						Nuevo Usuario
					</v-btn>
				</Link>
			</v-row>
			<v-card class="table-responsive border">
				<v-card-text>
					<v-table class="table table-striped">
						<thead>
							<tr>
								<td></td>
								<td>#</td>
								<td>Documento</td>
								<td>Nombre</td>
								<td>Usuario</td>
								<td>Telefono</td>
								<td>E-mail</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="user in users.data" :key="user.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="user.id" />
								</td>
								<td>{{ user.id }}</td>
								<td>{{ user.document_number }}</td>
								<td>{{ user.fullname }}</td>
								<td>{{ user.username }}</td>
								<td>{{ user.phone }}</td>
								<td>{{ user.email }}</td>
								<td class="text-center text-white">
									<v-badge 
										:color="user.status.badge"
										:content="user.status.name"
									/>
								</td>
							</tr>			
						</tbody>
					</v-table>
					<pagination :links="users.links" />
				</v-card-text>
			</v-card>
		</v-responsive>
	</v-container>
</template>

<script>
	import Pagination from '../shared/Paginator.vue'
	import { Link } from '@inertiajs/inertia-vue3';
	import { Inertia } from '@inertiajs/inertia';
	import TableActionsVue from '../shared/TableActions.vue';

	export default {
		data() {
			let items = [
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"users/:id/edit"}
			];

			return {
				items
			}
		},
		components: {
			Pagination,
			TableActionsVue,
			Link
		},
		props: {
			users: Object
		}
	}
</script>