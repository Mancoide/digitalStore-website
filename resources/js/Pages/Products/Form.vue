<template>
    <div class="card-body">
        <div class="row mb-3 ">
            <div class="form-group col-md-4 text-center">
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
            <div class="form-group col-md-8 d-flex align-items-baseline">
                <v-text-field
                    :error-messages="formData.errors.name"
                    v-model="formData.name"
                    color="primary"
                    label="Nombre"
                    placeholder="Escriba el Nombre del Plan."
                />
            </div> 
        </div>
        <div class="row">
            <div class="form-group" :class="formData.status_id ? 'col-md-6' : 'col-md-12'">
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
            <div class="form-group col-md-6" v-if="statuses">
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

        <h5 class="mt-5">Planes Disponibles</h5>

        <v-divider></v-divider>
        <div class="row">
            <div class="col" v-for="pack in packages" :key="pack.id">
                <v-checkbox
                    v-model="formData.packages"
                    :label="pack.name"
                    :value="pack.id"
                ></v-checkbox>
            </div>
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