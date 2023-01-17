<template>
    <div class="card-body">
        <div class="row mb-3 ">
            <div class="form-group col text-center">
                <v-col cols="12" md="6" offset="3">
                    <v-card>
                        <v-img
                            :src="formData.preview"
                            id="logoImgSection"
                            width="100%"
                            height="250"
                            class="bg-grey-lighten-2"
                        ></v-img>
                    </v-card>
                </v-col>

            </div>
        </div>
        <v-row class="mb-3">
            <v-col cols="12 text-center" md="4" offset-md="4">
                <input
                    id="logoFile"
                    type="file"
                    accept="image/*"
                    class="invisible h-0"
                    @input="formData.image = $event.target.files[0]"
                    v-on:change="changeFile"
                />
                <a href="#" class="fileText" >
                    <label for="logoFile">
                        Seleccionar Imagen
                    </label>
                </a>
            </v-col>
        </v-row>
        <div class="row">
            <div class="form-group col-12 col-md-6">
                <v-select
                    :error-messages="formData.errors.section"
                    color="primary"
                    label="Sección"
                    v-model="formData.section"
                    :items="sections"
                    item-title="section"
                    item-value="id"
                >
                </v-select>
            </div>
            <div class="form-group col-12 col-md-6">
                <v-text-field
                    :error-messages="formData.errors.order"
                    v-model="formData.order"
                    color="primary"
                    type="order"
                    label="Orden"
                />
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            formData: Object,
            sections: Object
        },
        methods: {
            changeFile: function(e)  {
                const file = e.target.files[0];

                if(file)
                {
                    const reader = new FileReader;

                    reader.onload = e => {
                        this.formData.preview = e.target.result
                    }
                    reader.readAsDataURL(file)
                }
            }
        }
    }

</script>
