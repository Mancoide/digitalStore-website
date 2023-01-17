<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
			<v-row justify="space-between pa-4 mb-2">
				<h5>Banners</h5>
				<Link href="banners/create" as="button">
					<v-btn
						variant="outlined"
						color="success"
						prepend-icon="mdi-plus"
					>
						Nuevo Banner
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
								<td>Sección</td>
								<td>Orden</td>
							</tr>
						</thead>
						<tbody class="align-items-center">
							<tr v-for="banner in banners.data" :key="banner.id" >
								<td class="text-left">
									<TableActionsVue :items="items" :idRegister="banner.id" />
								</td>
								<td>{{ banner.id }}</td>
                                <td class="py-2 text-left">
                                    <v-img v-if="banner.media[0]"
                                        :src="banner.media[0].original_url"
                                        :alt="banner.name"
                                        class="rounded"
                                    ></v-img>
								</td>
								<td>{{ sections.find((item) => item.id === banner.section).section }}</td>
								<td>{{ banner.order }}</td>
							</tr>
						</tbody>
					</v-table>
					<pagination :links="banners.links" />
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
				{name: 'Editar', icon:'mdi-pencil-outline', navigateTo:"banners/:id/edit"}
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
			banners: Object,
            sections: Object
		}
	}
</script>
