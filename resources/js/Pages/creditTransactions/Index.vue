<template>
	<v-container>

		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Saldos</h5>
				<Link href="creditTransactions/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Nuevo Saldo
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
								<td>Monto</td>
								<td>Saldo</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="creditTransaction in creditTransactions.data" :key="creditTransaction.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="creditTransaction.id" />
								</td>
								<td>{{ creditTransaction.id }}</td>
								<td>{{ creditTransaction.user.fullname }}</td>
								<td>{{ creditTransaction.amount }}</td>
								<td>{{ creditTransaction.balance }}</td>
							</tr>
						</tbody>
					</v-table>
					<pagination :links="creditTransactions.links" />
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
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"creditTransactions/:id/edit"}
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
			creditTransactions: Object
		}
	}
</script>
