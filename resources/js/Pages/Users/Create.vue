<template>
    <div class="container-fluid">
        <div class="card p-0 m-0">
            <div class="card-header">
                <h5 class="card-heading">Agregar Usurario</h5>
            </div>
            <form @submit.prevent="form.post('/users')">
                <FormVue :roles="roles" :formData="form" />
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <v-btn
                                type="submit"
                                rounded="lg"
                                color="primary"
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
        </div>
    </div>
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
                document_number: null,
                email: null,
                fullname: null,
                username: null,
                password: null,
                rol_id: null,
            });
            
            return { form }
        },
    }

</script>