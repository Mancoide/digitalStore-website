<template>
	<v-container>

		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Clientes</h5>
				<Link href="clients/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Nuevo Cliente
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
								<td>Nombre</td>
								<td>Telefono</td>
								<td>E-mail</td>
								<td>País</td>
								<td>Ciudad</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="client in clients.data" :key="client.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="client.id" />
								</td>
								<td>{{ client.id }}</td>
								<td>{{ client.fullname }}</td>
								<td>{{ client.phone }}</td>
								<td>{{ client.email }}</td>
								<td>{{ client.country }}</td>
								<td>{{ client.city }}</td>
								<td class="text-center text-white">
									<v-badge
										:color="client.status.badge"
										:content="client.status.name"
									/>
								</td>
							</tr>
						</tbody>
					</v-table>
					<pagination :links="clients.links" />
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
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"clients/:id/edit"}
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
			clients: Object
		}
	}
</script>
