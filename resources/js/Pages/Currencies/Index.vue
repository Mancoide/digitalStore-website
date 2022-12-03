<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Monedas</h5>
				<Link href="currencies/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Nueva Moneda
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
								<td>Símbolo</td>
								<td>Nombre</td>
								<td>Codigo</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="currency in currencies.data" :key="currency.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="currency.id" />
								</td>
								<td>{{ currency.id }}</td>
								<td>{{ currency.symbol }}</td>
								<td>{{ currency.name }}</td>
								<td>{{ currency.code }}</td>
								<td class="text-center text-white">
									<span :class="[currency.status.badge]">
										{{ currency.status.name }}
									</span>
								</td>
							</tr>			
						</tbody>
					</v-table>
					<pagination :links="currencies.links" />
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
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"currencies/:id/edit"}
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
			currencies: Object
		}
	}
</script>