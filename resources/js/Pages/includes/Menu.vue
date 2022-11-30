<template>
    <v-navigation-drawer 
        color="grey-lighten-5"
        permanent
    >
        <v-list nav>
            <Link href="/" as="button" class="w-100 text-left">
                <v-list-item prepend-icon="mdi-view-dashboard" title="Tablero" value="/" />
            </Link>

            <v-list-group value="Configuración">
                <template v-slot:activator="{ props }">
                  <v-list-item
                    v-bind="props"
                    prepend-icon="mdi-account-settings"
                    title="Configuración"
                  ></v-list-item>
                </template>
      
                <Link href="/users" as="button" class="w-100 text-left">
                    <v-list-item title="Usuarios" value="/users" />
                </Link>
                <Link href="/users" as="button" class="w-100 text-left">
                    <v-list-item title="Roles" value="/roles" />
                </Link>
            </v-list-group>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components:{
        Link
    },
    watch: {
      group () {
        this.drawer = false
      },
    },
}

</script>