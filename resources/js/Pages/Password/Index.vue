<template>
    <v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Cambiar Contraseña</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.post('/Password')">
                    <FormVue :formData="form" />
                    <div class="row">
                        <div class="form-group col-md-4">
                            <v-text-field
                                :error-messages="formData.errors.password"
                                v-model="formData.password"
                                color="primary"
                                type="password"
                                label="Contraseña"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <v-text-field
                                :error-messages="formData.errors.ConfirmPassword"
                                v-model="formData.ConfirmPassword"
                                color="primary"
                                type="password"
                                label="Confirmar Contraseña"
                            />
                        </div>
                    </div>
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
    import { Link, useForm } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            FormVue,
            Link
        },
        props: {
            user: Object
        },
        setup (props) {
            const form = useForm({
                id: props.user.id ?? null,
                password: null
            });

            return { form }
        }
    }

</script>
