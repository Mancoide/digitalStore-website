<template>
    <v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Editar Rol</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.put('/roles/'+role.id)">
                    <FormVue :permissions="permissions" :formData="form" :definitions="definitions" />
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
                                <Link href="/roles" as="button" class="w-100">
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
            role: Object,
            permissions: Object,
            definitions: Object
        },
        setup (props) {
            let actualPermissions = [];
            if(props.role && props.role.permissions.length > 0)
            {
                props.role.permissions.map((permission) => {
                    actualPermissions.push(permission.id);
                })
            }

            const form = useForm({
                permissions: actualPermissions,
                name: props.role.display_name ?? '',
                description: props.role.description ?? ''
            });

            return { form }
        }
    }

</script>
