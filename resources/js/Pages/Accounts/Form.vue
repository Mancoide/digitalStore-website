<template>
    <div class="card-body">
        <div class="row mb-3">
            <div class="form-group col-md-6">
                <v-select
                    :error-messages="formData.errors.product_id"
                    color="primary"
                    label="Producto"
                    v-model="formData.product_id"
                    :items="products"
                    item-title="name"
                    item-value="id"
                >
                </v-select>
            </div>
            <div class="form-group col-md-6">
                <v-select
                    :error-messages="formData.errors.package_id"
                    color="primary"
                    label="Plan Adquirido"
                    v-model="formData.package_id"
                    :items="productPackages"
                    item-title="name"
                    item-value="id"
                >
                </v-select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-md-6">
                <v-text-field
                    :error-messages="formData.errors.email"
                    v-model="formData.email"
                    color="primary"
                    label="E-mail"
                    placeholder="example@mail.com"
                />
            </div>
            <div class="form-group col-md-6">
                <v-text-field
                    :error-messages="formData.errors.password"
                    v-model="formData.password"
                    color="primary"
                    label="Contraseña"
                    placeholder="******"
                />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <v-text-field
                    :error-messages="formData.errors.subscription_date"
                    v-model="formData.subscription_date"
                    color="primary"
                    label="Fecha de subscripción"
                    placeholder="dd/mm/yyyy"
                >

                </v-text-field>
            </div>
            <div class="form-group col-md-6" v-if="formData.accounts_available">
                <v-text-field
                    :error-messages="formData.errors.accounts_available"
                    v-model="formData.accounts_available"
                    color="primary"
                    label="Perfiles habilitados"
                    type="number"
                />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <v-textarea
                    :error-messages="formData.errors.description"
                    color="primary"
                    label="Descipción"
                    placeholder="Deje una descripción u observación"
                    v-model="formData.description"
                >
                </v-textarea>
            </div>
        </div>
        <div class="row" v-if="statuses">
            <div class="form-group col-md-12">
                <v-select
                    :error-messages="formData.errors.status_id"
                    color="primary"
                    label="Estado"
                    v-model="formData.status_id"
                    :items="statuses"
                    item-title="name"
                    item-value="id"
                >
                </v-select>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            formData: Object,
            products: Object,
            statuses: Object
        },
        computed: {
            productPackages()
            {
                return this.products.find((item) => item.id === this.formData.product_id)?.packages ?? null
            }
        }
    }

</script>
