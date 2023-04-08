<template>
	<v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Loguearse como</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.get('/users/login-with')">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <v-select
                                    :error-messages="form.errors.user_id"
                                    color="primary"
                                    label="Usuarios"
                                    v-model="form.user_id"
                                    :items="users"
                                    item-title="fullname"
                                    item-value="id"
                                >
                                </v-select>
                            </div>
                        </div>
                    </div>
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
                                    Iniciar Session
                                </v-btn>
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
            users: Object
        },
        setup (props) {

            const form = useForm({
                user_id: props.user?.id ?? null,
            });

            return { form }
        }
    }

</script>
