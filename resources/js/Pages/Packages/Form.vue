<template>
    <div class="card-body">
        <div class="row mb-3">
            <div class="form-group col-md-8">
                <v-text-field
                    :error-messages="formData.errors.name"
                    v-model="formData.name"
                    color="primary"
                    label="Nombre"
                    placeholder="Escriba el Nombre del Plan."
                />
            </div> 
            <div class="form-group col-md-4">
                <v-text-field
                    :error-messages="formData.errors.cost"
                    v-model="formData.cost"
                    color="primary"
                    label="Costo"
                    placeholder="Ej.: $10"
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