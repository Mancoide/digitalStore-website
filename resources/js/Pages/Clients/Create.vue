<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Nuevo Usuario</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.post('/clients')">
                    <FormVue :roles="roles" :formData="form" />
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
                                <Link href="/clients" as="button" class="w-100">
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
    import { Inertia, Link, useForm } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            FormVue,
            Link
        },
        props: {
            roles: Object
        },
        setup () {
            const form = useForm({
                email: null,
                phone:null,
                fullname: null,
                country: null,
                city: null,
            });

            return { form }
        },
    }

</script>
