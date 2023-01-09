<template>
	<v-container>

		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Acreditacion de Saldos</h5>
				<Link href="creditTransactions/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Acreditar Saldo
					</v-btn>
				</Link>
			</v-row>
			<v-card class="table-responsive border">
				<v-card-text>
					<v-table class="table table-striped">
						<thead>
							<tr>
								<td>#</td>
								<td>Nombre</td>
								<td>Monto</td>
								<td>Saldo</td>
								<td>Creado por</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="transaction in transactions.data" :key="transaction.id" >
								<td>{{ transaction.id }}</td>
								<td>{{ transaction.user.fullname }}</td>
								<td>{{ transaction.amount }}</td>
								<td>{{ transaction.after }}</td>
								<td>{{ transaction.created_by.fullname }}</td>
							</tr>
						</tbody>
					</v-table>
					<pagination :links="transactions.links" />
				</v-card-text>
			</v-card>
		</v-responsive>
	</v-container>
</template>

<script>
	import Pagination from '../shared/Paginator.vue'
	import { Link } from '@inertiajs/inertia-vue3';

	export default {
		components: {
			Pagination,
			Link
		},
		props: {
			transactions: Object
		}
	}
</script>
