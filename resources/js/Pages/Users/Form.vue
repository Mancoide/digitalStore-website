<template>
    <div class="card-body">
        <div class="row mb-3">
            <div class="form-group col-md-3">
                <v-text-field
                    :error-messages="formData.errors.document_number"
                    v-model="formData.document_number"
                    color="primary"
                    label="Nro. de Documento"
                />
            </div> 
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
                    :error-messages="formData.errors.username"
                    v-model="formData.username"
                    color="primary"
                    label="Usuario"
                />
            </div> 
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
                    type="phone"
                    label="Contraseña"
                />
            </div> 
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <v-text-field
                    :error-messages="formData.errors.password"
                    v-model="formData.password"
                    color="primary"
                    type="password"
                    label="Contraseña"
                />
            </div> 
            <div class="form-group col-md-8">
                <v-select
                    :error-messages="formData.errors.rol_id"
                    color="primary"
                    label="Rol"
                    v-model="formData.rol_id"
                    :items="roles"
                    item-title="display_name"
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
            roles: Object,
            formData: Object
        },
    }

</script>