<template>
    <v-container>
		<v-responsive aspect-ratio="16 / 9" class="pa-4">
            <v-row justify="space-between pa-4 mb-2">
				<h5>Editar Banner</h5>
			</v-row>
			<v-card class="p-0 m-0">
                <form @submit.prevent="form.put('/banners/'+banner.id)">
                    <FormVue :formData="form" :sections="sections" />
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
                                <Link href="/banners" as="button" class="w-100">
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
            banner: Object,
            sections: Object
        },
        setup (props) {
            console.log(props.banner?.media[0])
            const form = useForm({
                image: null,
                preview: props.banner?.media[0]?.original_url,
                section: props.banner?.section,
                order: props.banner?.order
            });

            return { form }
        }
    }

</script>
