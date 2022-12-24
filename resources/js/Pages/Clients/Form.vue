<template>
    <div class="card-body">
        <div class="row mb-3">
            <div class="form-group col-md-9">
                <v-text-field
                    :error-messages="formData.errors.fullname"
                    v-model="formData.fullname"
                    color="primary"
                    label="Nombre Completo"
                />
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-md-4">
                <v-text-field
                    :error-messages="formData.errors.email"
                    v-model="formData.email"
                    type="email"
                    color="primary"
                    label="E-mail"
                    placeholder="johndoe@gmail.com"
                />
            </div>
            <div class="form-group col-md-4">
                <v-text-field
                    :error-messages="formData.errors.phone"
                    v-model="formData.phone"
                    color="primary"
                    label="Teléfono"
                    placeholder="(595)99x XXX XXX"
                />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <v-text-field
                    :error-messages="formData.errors.country"
                    v-model="formData.country"
                    color="primary"
                    label="País"
                />
            </div>
            <div class="form-group col-md-3">
                <v-text-field
                    :error-messages="formData.errors.city"
                    v-model="formData.city"
                    color="primary"
                    label="Ciudad"
                />
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            roles: Object,
            formData: Object
        },
    }

</script>
