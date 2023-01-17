<template>
    <v-container>
        <v-row class="mb-5" v-if="banners && banners.length > 0">
            <v-carousel
                cycle
                height="400"
                hide-delimiter-background
                color="#fff"
            >
                <v-carousel-item
                    v-for="(banner, bannerIndex) in banners"
                    :key="bannerIndex"
                    :src="banner.media[0].original_url"
                    cover
                >
                </v-carousel-item>
            </v-carousel>
        </v-row>
        <v-row justify="space-between pa-4 mb-2">
            <h5>Poductos</h5>
        </v-row>
        <v-divider></v-divider>
        <v-row>
            <v-col
                v-for="product in products"
                cols="12"
                md="2"
                :key="product.id"
            >
                <!-- {{ account }} -->
                <v-sheet
                    rounded
                    class="mx-auto p-0 m-0"
                    height="100%"
                    width="100%"
                >
                    <v-card @click="updateModalContent(true, product)" class="w-100">
                        <v-img
                            :src="product.media[0].original_url"
                            :lazy-src="product.media[0].original_url"
                            aspect-ratio="1"
                            cover
                            class="bg-white rounded"
                        ></v-img>
                        <v-card-text class="text-center fw-bold w-100">
                            {{ product.name }}
                        </v-card-text>
                    </v-card>
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>

    <v-dialog
      v-model="dialog"
      persistent
    >
        <v-card v-if="dialog">
            <form @submit.prevent="submit">
                <v-card-title>
                    <span class="text-h5">Comprar Cuenta de {{ modalData.name }}</span>
                </v-card-title>
                <v-card-text
                    v-if="form.errors.balance"
                >
                    <div class="row mx-5">
                        <div class="col-12 text-danger">
                            {{ form.errors.balance }}
                        </div>
                    </div>
                </v-card-text>
                <v-card-text>
                    <v-container>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <v-text-field
                                    :model-value="modalData.name"
                                    label="Producto"
                                    disabled
                                />
                            </div>

                            <div class="col-12 col-md-4">
                                <v-select
                                    :error-messages="form.errors.package_id"
                                    color="primary"
                                    label="Plan"
                                    v-model="form.package_id"
                                    :items="modalData.packages"
                                    item-title="name"
                                    item-value="id"
                                >
                                </v-select>
                            </div>
                            <div class="col-12 col-md-4">
                                <v-text-field
                                    :model-value="getItems.productCost"
                                    label="Costo"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <v-text-field
                                    v-model="form.quantity"
                                    label="Cantidad"
                                    type="number"
                                />
                            </div>
                            <div class="col-12 col-md-4">
                                <v-text-field
                                    :model-value="getItems.totalCost"
                                    label="Total"
                                    disabled
                                />
                            </div>
                        </div>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
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
                                    Comprar
                                </v-btn>
                            </div>
                            <div class="col-6">
                                <v-btn
                                    rounded="lg"
                                    color="danger"
                                    class="w-100 text-white"
                                    @click="updateModalContent(false)"
                                >
                                        Cancelar
                                </v-btn>
                            </div>
                        </div>
                    </div>
                </v-card-actions>
            </form>
        </v-card>
    </v-dialog>
</template>

<script>

import { useForm } from '@inertiajs/inertia-vue3';

export default {
    data: () => ({
      dialog: false,
      modalData: null
    }),
    props:{
        products: Object,
        banners: Object
    },
    methods: {
        updateModalContent(showDialog, modalData = null)
        {
            this.dialog = showDialog;
            this.modalData = modalData;

            this.form.product_id = modalData.id;
        },
        submit() {
            this.form.post('/buy',{
                onSuccess: (response) => {
                    if(response.props.flash.notification?.status === 'success')
                    {
                        this.dialog = false
                        this.modalData = null
                    }
                }
            });
        }
    },
    setup (props) {
        const form = useForm({
            product_id: null,
            package_id: null,
            quantity: 0
        });

        return { form }
    },
    computed: {
        getItems(){
            let productCost = this.modalData.packages.find((item) => item.id === this.form.package_id)?.pivot.cost;
            return {
                productCost: productCost,
                totalCost: productCost && this.form.quantity > 0 ? productCost * this.form.quantity : 0
            }
        }
    }
}

</script>
