<script setup>
    import { formatDate } from '../../helper.js';
</script>
<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Mis Compras</h5>
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
								<td>Cuenta</td>
								<td>Contraseña</td>
                                <td>Decripción</td>
                                <td>Fecha</td>
								<td>Estado</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="account in myAccounts.data" :key="account.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="account.id" />
								</td>
								<td>{{ account.id }}</td>
                                <td>
									<v-avatar>
										<v-icon v-if="!account.product.media[0]" icon="mdi-account-circle"></v-icon>
										<v-img v-if="account.product.media[0]"
										  :src="account.product.media[0].original_url"
										  :alt="account.product.name"
										></v-img>
									</v-avatar>
								</td>
								<td>{{ account.product.name }}</td>
								<td>{{ account.email }}</td>
								<td>{{ account.password }}</td>
                                <td>{{ account.description }}</td>
                                <td>{{ formatDate(account.subscription_date) }}</td>
								<td class="text-center text-white">
									<v-badge
										:color="account.status.badge"
										:content="account.status.name"
									/>
								</td>
							</tr>
						</tbody>
					</v-table>
					<pagination :links="myAccounts.links" />
					<!-- <Pagination :data="myAccounts" /> -->
				</v-card-text>
			</v-card>
		</v-responsive>
	</v-container>
</template>

<script>
	import Pagination from '../shared/Paginator.vue';
	import { Link } from '@inertiajs/inertia-vue3';
	import TableActionsVue from '../shared/TableActions.vue';

	export default {
		/*data() {
			let items = [
				// {name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"categories/:id/edit"}
			];

			return {
				items
			}
		},*/
		components: {
			Pagination,
			TableActionsVue,
			Link
		},
		props: {
			myAccounts: Object
		}
	}
</script>
