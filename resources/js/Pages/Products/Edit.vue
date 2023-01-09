<template>
    <v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Editar Producto</h5>
			</v-row>
            <form @submit.prevent="form.post('/products/'+product.id)">
                <FormVue :statuses="statuses" :categories="categories" :packages="packages" :formData="form" />
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <v-btn
                                :disabled="form.processing"
                                type="submit"
                                rounded="lg"
                                color="success"
                                class="w-100"
                            >
                                Guardar
                            </v-btn>
                        </div>
                        <div class="col-6">
                            <Link href="/products" as="button" class="w-100">
                                <v-btn
                                    rounded="lg"
                                    color="danger"
                                    class="w-100 text-white"
                                >
                                        Cancelar
                                </v-btn>
                            </Link>
                            
                        </div>
                    </div>
                </div>
            </form>
        </v-responsive>
    </v-container>
</template>

<script>
    import FormVue from './Form.vue';
    import { Link, useForm } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            FormVue,
            Link
        },
        props: {
            statuses: Object,
            packages: Object,
            categories: Object,
            product: Object
        },
        setup (props) {
            console.log(props)
            let quantityArray = [];
            let costsArray = [];

            props.packages.map((pack) => {

                quantityArray.push(
                    props.product?.packages?.find((item) => item.id === pack.id)?.pivot.quantity_people
                )

                costsArray.push(
                    props.product?.packages?.find((item) => item.id === pack.id)?.pivot.cost
                )
            })


            const form = useForm({
                logo: null,
                name: props.product?.name ?? null,
                status_id: props.product?.status_id ?? null,
                previewImage: props.product?.media[0]?.original_url,
                category_id: props.product?.category_id,
                packages: props.product?.packages?.map((packageItem) => packageItem.id) ?? [],
                _method: 'put',
                quatity: quantityArray,
                costs: costsArray
             });
            
            return { form }
        }
    }

</script>