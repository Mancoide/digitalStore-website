<template>
    <v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Editar Cuenta</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.put('/accounts/'+account.id)">
                    <FormVue :statuses="statuses" :formData="form" :products="products" />
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
                                <Link href="/accounts" as="button" class="w-100">
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
            </v-card>
        </v-responsive>
    </v-container>
</template>

<script>
    import FormVue from './Form.vue';
    import { Link, useForm } from '@inertiajs/inertia-vue3';
    import * as dayjs from 'dayjs';

    export default {
        components: {
            FormVue,
            Link
        },
        props: {
            statuses: Object,
            account: Object,
            products: Object
        },
        setup (props) {
            const form = useForm({
                email: props.account?.email,
                password: props.account?.password,
                product_id: props.account?.product_id,
                package_id: props.account?.package_id,
                accounts_available: props.account?.accounts_available,
                description: props.account?.description,
                subscription_date: dayjs(props.account.subscription_date).format('DD/MM/YYYY'),
                status_id: props.account?.status_id
            });

            return { form }
        }
    }

</script>
