<template>
    <div class="card-body">
        <div class="row mb-3">
            <div class="row">
                <div class="form-group col-lg-8">
                    <v-text-field
                        :error-messages="form.errors.password"
                        v-model="form.password"
                        color="primary"
                        type="password"
                        label="Contraseña"
                    />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-8">
                    <v-text-field
                        :error-messages="form.errors.ConfirmPassword"
                        v-model="form.ConfirmPassword"
                        color="primary"
                        type="password"
                        label="Confirmar Contraseña"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: Object,
            formData: Object
        },
    }
</script>
