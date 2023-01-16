<template>
    <v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Editar Usuario</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.put('/users/'+user.id)">
                    <FormVue :roles="roles" :formData="form" />
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
                                <Link href="/users" as="button" class="w-100">
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
            roles: Object,
            user: Object
        },
        setup (props) {

            const form = useForm({
                document_number: props.user?.document_number ?? null,
                email: props.user?.email ?? null,
                fullname: props.user?.fullname ?? null,
                username: props.user?.username ?? null,
                phone: props.user?.phone ?? null,
                password: null,
                rol_id: props.user?.roles[0]?.id ?? null,
            });

            return { form }
        }
    }

</script>
