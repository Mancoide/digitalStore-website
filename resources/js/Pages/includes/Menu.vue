<template>
    <v-navigation-drawer
        permanent
    >
        <Link href="/" as="button" class="w-100 text-left item-menu-group">
            <v-img src="/assets/images/digitalStore.png" />
        </Link>

        <v-divider></v-divider>

        <v-list nav>
            <Link href="/" as="button" class="w-100 text-left item-menu-group">
                <v-list-item prepend-icon="mdi-view-dashboard" title="Tablero" value="/" />
            </Link>

            <v-divider></v-divider>

            <v-list-group value="ADMINISTRACION">
                <template v-slot:activator="{ props }">
                    <v-list-item
                        v-bind="props"
                        title="ADMINISTRACION"
                        class="menu-title-group"
                    >
                        <template v-slot:prepend>
                            <v-icon icon="mdi-star-minus" size="x-small"></v-icon>
                        </template>
                    </v-list-item>
                </template>
                <Link href="/users" as="button" class="w-100 text-left item-menu-group">
                    <v-list-item prepend-icon="mdi-vector-intersection" title="Productos" value="/users" />
                </Link>
                <Link href="/clients" as="button" class="w-100 text-left item-menu-group">
                    <v-list-item prepend-icon="mdi-account-multiple" title="Clientes" value="/clients" />
                </Link>

            </v-list-group>

            <v-divider></v-divider>

            <v-list-group value="AUTENTICACION">
                <template v-slot:activator="{ props }">
                    <v-list-item
                        v-bind="props"
                        title="AUTENTICACION"
                        class="menu-title-group"
                    >
                        <template v-slot:prepend>
                            <v-icon icon="mdi-lock" size="x-small"></v-icon>
                        </template>
                    </v-list-item>
                </template>

                <Link href="/roles" as="button" class="w-100 text-left item-menu-group">
                    <v-list-item prepend-icon="mdi-account-group" title="Roles de usuarios" value="/roles" />
                </Link>
                <Link href="/users" as="button" class="w-100 text-left item-menu-group">
                    <v-list-item prepend-icon="mdi-account" title="Usuarios" value="/users" />
                </Link>
            </v-list-group>

            <v-divider></v-divider>

            <v-list-group value="DEFINICIONES">
                <template v-slot:activator="{ props }">
                    <v-list-item
                        v-bind="props"
                        title="DEFINICIONES"
                        class="menu-title-group"
                    >
                        <template v-slot:prepend>
                            <v-icon icon="mdi-cog" size="x-small"></v-icon>
                        </template>
                    </v-list-item>
                </template>
                <Link href="/currencies" as="button" class="w-100 text-left item-menu-group">
                    <v-list-item prepend-icon="mdi-currency-usd" title="Monedas" value="/currencies" />
                </Link>

                <Link href="/categories" as="button" class="w-100 text-left item-menu-group">
                    <v-list-item prepend-icon="mdi-shape" title="Categorias" value="/categories" />
                </Link>

            </v-list-group>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components:{
        Link,
    },
}

</script>
