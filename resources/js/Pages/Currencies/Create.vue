<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Nueva Moneda</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.post('/currencies')">
                    <FormVue :formData="form" />
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
        setup () {
            const form = useForm({
                symbol: null,
                code: null,
                name: null,
            });
            
            return { form }
        },
    }

</script>