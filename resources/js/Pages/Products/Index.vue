<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Poductos</h5>
				<Link href="products/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Nuevo Producto
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
								<td></td>
								<td>Producto</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="product in products.data" :key="product.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="product.id" />
								</td>
								<td>{{ product.id }} </td>
								<td>
									<v-avatar>
										<v-icon v-if="!product.media[0]" icon="mdi-account-circle"></v-icon>
										<v-img v-if="product.media[0]"
										  :src="product.media[0].original_url"
										  :alt="product.name"
										></v-img>
									</v-avatar>
								</td>
								<td>{{ product.name }}</td>
								<td class="text-center text-white">
									<v-badge 
										:color="product.status.badge"
										:content="product.status.name"
									/>
								</td>
							</tr>			
						</tbody>
					</v-table>
					<pagination :links="products.links" />
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
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"products/:id/edit"}
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
			products: Object
		}
	}
</script>