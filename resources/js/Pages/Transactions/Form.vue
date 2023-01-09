<template>
    <div class="card-body">
        <div class="row mb-3">
            <div class="form-group col-md-8">
                <v-select
                    :error-messages="formData.errors.user_id"
                    color="primary"
                    label="Usuarios"
                    v-model="formData.user_id"
                    :items="users"
                    item-title="fullname"
                    item-value="id"
                >
                </v-select>
            </div>
            <div class="form-group col-md-4">
                <v-text-field
                    :error-messages="formData.errors.amount"
                    v-model="formData.amount"
                    color="primary"
                    type="number"
                    label="Monto"
                />
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-md-4">
                <v-checkbox
                    v-model="formData.balance_adjust"
                    label="Ajuste de saldo"
                    value="true"
                ></v-checkbox>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <v-textarea 
                    v-model="formData.observation" 
                    label="Observación" 
                    variant="outlined" 
                    :error-messages="formData.errors.observation"
                >

                </v-textarea>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            users: Object,
            formData: Object
        },
    }

</script>
