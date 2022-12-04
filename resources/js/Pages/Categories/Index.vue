<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Categorias</h5>
				<Link href="categories/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Nueva Categoria
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
								<td>Categoria</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="category in categories.data" :key="category.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="category.id" />
								</td>
								<td>{{ category.id }}</td>
								<td>{{ category.name }}</td>
								<td class="text-center text-white">
									<v-badge 
										:color="category.status.badge"
										:content="category.status.name"
									/>
								</td>
							</tr>			
						</tbody>
					</v-table>
					<pagination :links="categories.links" />
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
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"categories/:id/edit"}
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
			categories: Object
		}
	}
</script>