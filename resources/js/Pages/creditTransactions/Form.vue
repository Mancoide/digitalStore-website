<template>
    <div class="card-body">
        <div class="row mb-3">
            <div class="form-group col-md-9">
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
        </div>
        <div class="row mb-3">
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
