<template>
    <v-card-text>
        <v-row class="mb-3">
            <v-col cols="12" md="4">
                <v-text-field
                    :error-messages="formData.errors.name"
                    v-model="formData.name"
                    color="primary"
                    label="Nombre"
                />
            </v-col>
            <v-col cols="12" md="8">
                <v-text-field
                    :error-messages="formData.errors.description"
                    v-model="formData.description"
                    color="primary"
                    label="Descripción"
                />
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12" md="6" v-for="(permissionArrays, permissionTitle) in permissions" :key="permissionTitle">
                <v-card :title="definitions[permissionTitle]">
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
            formData: Object,
            definitions: Object
        },
    }

</script>
