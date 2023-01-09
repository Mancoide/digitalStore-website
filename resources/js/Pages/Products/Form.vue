<template>
    <div class="row">
        <div class="col-md-4">
            <v-card>
                <v-card-title>
                    Detalles del producto
                </v-card-title>
                <v-divider></v-divider>
                <div class="card-body">
                    <div class="row mb-3 ">
                        <div class="form-group col text-center">
                            <v-avatar
                                size="100"
                            >
                                <v-icon v-if="!formData.previewImage" icon="mdi-shape-plus" size="100"></v-icon>
                                <v-img
                                    v-if="formData.previewImage"
                                    width="100"
                                    id="logoImgSection"
                                    :src="formData.previewImage"
                                    contain
                                >
                                </v-img>
                            </v-avatar>

                            <input
                                id="logoFile"
                                type="file"
                                accept="image/*"
                                class="invisible h-0"
                                @input="formData.logo = $event.target.files[0]"
                                v-on:change="changeFile"
                            />
                            <a href="#" class="fileText" >
                                <label for="logoFile">
                                    Seleccionar Imagen
                                </label>
                            </a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col d-flex align-items-baseline">
                            <v-text-field
                                :error-messages="formData.errors.name"
                                v-model="formData.name"
                                color="primary"
                                label="Nombre"
                                placeholder="Escriba el Nombre del Producto."
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <v-select
                                :error-messages="formData.errors.category_id"
                                color="primary"
                                label="Categoria"
                                v-model="formData.category_id"
                                :items="categories"
                                item-title="name"
                                item-value="id"
                            >
                            </v-select>
                        </div>
                        <div class="form-group col-md-12" v-if="statuses">
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
            </v-card>
        </div>
        <div class="col-md-8 mt-3">
            <v-card>
                <v-card-title>
                    Planes Disponibles
                </v-card-title>
                <v-divider></v-divider>
                <v-card-subtitle>
                    <div class="row text-center">
                        <div class="col">
                            Paquete
                            <v-divider></v-divider>
                        </div>
                        <div class="col">
                            Cantidad
                            <v-divider></v-divider>
                        </div>
                        <div class="col">
                            Costo
                            <v-divider></v-divider>
                        </div>
                    </div>
                </v-card-subtitle>
                <v-card-text>
                    <div class="row" v-for="(pack, index) in packages" :key="pack.id">
                        <div class="col-md-4">
                            <v-checkbox
                                v-model="formData.packages"
                                :label="pack.name"
                                :value="pack.id"
                            ></v-checkbox>
                        </div>
                        <div class="col-md-4">
                            <v-text-field
                                :error-messages="formData.errors.quatity"
                                v-model="formData.quatity[index]"
                                color="primary"
                                type="text"
                                :maxlength="2"
                                label="Ej.: para 5 personas"
                            />
                        </div>
                        <div class="col-md-4">
                            <v-text-field
                                :error-messages="formData.errors.costs"
                                v-model="formData.costs[index]"
                                color="primary"
                                type="text"
                                :maxlength="6"
                                label="Ej.: $10"
                            />
                        </div>
                    </div>
                </v-card-text>
            </v-card>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            formData: Object,
            packages: Object,
            categories: Object,
            statuses: Object
        },
        methods: {
            changeFile: function(e)  {
                const file = e.target.files[0];

                if(file)
                {
                    const reader = new FileReader;

                    reader.onload = e => {
                        this.formData.previewImage = e.target.result
                    }
                    reader.readAsDataURL(file)
                }
            }
        }
    }

</script>
