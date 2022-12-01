<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Roles</h5>
				<Link href="roles/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Agregar
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
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="rol in roles.data" :key="rol.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="rol.id" />
								</td>
								<td>{{ rol.id }}</td>
								<td>{{ rol.display_name }}</td>
							</tr>			
						</tbody>
					</v-table>
					<pagination :links="roles.links" />
				</v-card-text>
			</v-card>
		</v-responsive>
	</v-container>
</template>

<script>
	import Pagination from '../shared/Paginator.vue'
	import { Link } from '@inertiajs/inertia-vue3';
	import TableActionsVue from '../shared/TableActions.vue';

	export default {
		data() {
			let items = [
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"roles/:id/edit"}
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
			roles: Object
		}
	}
</script>