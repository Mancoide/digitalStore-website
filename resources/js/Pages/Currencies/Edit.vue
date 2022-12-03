<template>
    <v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Editar Moneda</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.put('/currencies/'+currency.id)">
                    <FormVue :statuses="statuses" :formData="form" />
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <v-btn
                                    type="submit"
                                    rounded="lg"
                                    color="success"
                                    class="w-100"
                                >
                                    Guardar
                                </v-btn>
                            </div>
                            <div class="col-6">
                                <Link href="/currencies" as="button" class="w-100">
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

    export default {
        components: {
            FormVue,
            Link
        },
        props: {
            statuses: Object,
            currency: Object
        },
        setup (props) {
            const form = useForm({
                symbol: props.currency?.symbol ?? null,
                code: props.currency?.code ?? null,
                name: props.currency?.name ?? null,
                status_id: props.currency?.status_id ?? null
            });
            
            return { form }
        }
    }

</script>