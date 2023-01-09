<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Cuentas</h5>
				<Link href="accounts/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Nueva Cuenta
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
								<td>Fecha</td>
								<td>E-mail</td>
								<td>Paquete</td>
								<td>Disponible</td>
								<td>Creado por</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="account in accounts.data" :key="account.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="account.id" />
								</td>
								<td>{{ account.id }}</td>
								<td>{{ formaterDate(account.created_at) }}</td>
								<td>{{ account.email }}</td>
								<td>{{ account.product.name }}</td>
								<td>{{ account.accounts_available }}</td>
								<td>{{ account.created_by.fullname }}</td>
								<td class="text-center text-white">
									<span :class="[account.status.badge]">
										{{ account.status.name }}
									</span>
								</td>
							</tr>
						</tbody>
					</v-table>
					<pagination :links="accounts.links" />
				</v-card-text>
			</v-card>
		</v-responsive>
	</v-container>
</template>

<script>
	import Pagination from '../shared/Paginator.vue'
	import { Link } from '@inertiajs/inertia-vue3';
	import TableActionsVue from '../shared/TableActions.vue';
    import * as dayjs from 'dayjs';

	export default {
		data() {
			let items = [
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"accounts/:id/edit"}
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
			accounts: Object
		},
        methods: {
            formaterDate(date)
            {
                return dayjs(date).format('DD/MM/YYYY')
            }
        }
	}
</script>
