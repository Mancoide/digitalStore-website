<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Planes</h5>
				<Link href="packages/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Nuevo Plan
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
								<td>Plan</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="packagedata in packages.data" :key="packagedata.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="packagedata.id" />
								</td>
								<td>{{ packagedata.id }}</td>
								<td>{{ packagedata.name }}</td>
								<td class="text-center text-white">
									<v-badge 
										:color="packagedata.status.badge"
										:content="packagedata.status.name"
									/>
								</td>
							</tr>			
						</tbody>
					</v-table>
					<pagination :links="packages.links" />
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
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"packages/:id/edit"}
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
			packages: Object
		}
	}
</script>