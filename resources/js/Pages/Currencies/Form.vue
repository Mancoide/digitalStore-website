<template>
    <div class="card-body">
        <div class="row mb-3">
            <div class="form-group col-md-3">
                <v-text-field
                    :error-messages="formData.errors.symbol"
                    v-model="formData.symbol"
                    color="primary"
                    label="Símbolo"
                    placeholder="Ej. $ o  ₲"
                />
            </div> 
            <div class="form-group col-md-3">
                <v-text-field
                    :error-messages="formData.errors.code"
                    v-model="formData.code"
                    color="primary"
                    label="Codigo"
                    placeholder="Ej. USD o  PYG."
                />
            </div> 
            <div class="form-group col-md-6">
                <v-text-field
                    :error-messages="formData.errors.name"
                    v-model="formData.name"
                    color="primary"
                    label="Nombre"
                    placeholder="Ej. Guarani o  Dolar"
                />
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
            statuses: Object
        },
    }

</script>