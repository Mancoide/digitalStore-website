<template>
    <v-card-text>
        <v-row class="mb-3">
            <v-col class="col-md-4">
                <v-text-field
                    :error-messages="formData.errors.name"
                    v-model="formData.name"
                    color="primary"
                    label="Nombre"
                />
            </v-col>
            <v-col class="col-md-8">
                <v-text-field
                    :error-messages="formData.errors.description"
                    v-model="formData.description"
                    color="primary"
                    label="Descripción"
                />
            </v-col>
        </v-row>
        <v-row>
            <v-col class="col-md-6" v-for="(permissionArrays, permissionTitle) in permissions" :key="permissionTitle">
                <v-card :title="permissionTitle.toString()">
                    <v-divider />
                    <template v-for="permission in permissionArrays" :key="permission.id">
                        <v-checkbox :label="permission.display_name" v-model="formData.permissions" :value="permission.id"></v-checkbox>
                    </template>
                </v-card>
            </v-col>
        </v-row>
    </v-card-text>
</template>

<script>

    export default {
        props: {
            permissions: Object,
            formData: Object
        },
    }

</script>