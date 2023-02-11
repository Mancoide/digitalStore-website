<template>
    <v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Cambiar Contraseña</h5>
			</v-row>
			<v-card class="p-0 m-0 col-lg-4 col-sm-12">
                <form @submit.prevent="form.post('/Password')">
                    <FormVue :roles="roles" :formData="form" />
                    <div class="row">
                        <div class="row">
                            <div class="col-4">
                                <v-btn
                                    type="submit"
                                    rounded="lg"
                                    color="success"
                                    class="w-100"
                                >
                                    Guardar
                                </v-btn>
                            </div>
                            <div class="col-4">
                                <Link href="/" as="button" class="w-100">
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
            user: Object
        },
        setup () {
            const form = useForm({
                password: null,
                ConfirmPassword: null
            });

            return { form }
        }
    }

</script>
