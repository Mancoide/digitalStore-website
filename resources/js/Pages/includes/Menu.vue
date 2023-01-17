<template>
    <v-navigation-drawer
        permanent
        expand-on-hover
        rail
    >
        <Link href="/" as="button" class="w-100 text-left item-menu-group">
            <v-img src="/assets/images/digitalStore.png" />
        </Link>

        <v-divider></v-divider>

        <v-list nav>
            <Link href="/" as="button" class="w-100 text-left item-menu-group">
                <v-list-item prepend-icon="mdi-cart" title="Comprar" value="/" />
            </Link>

            <v-divider></v-divider>
            <Link href="/purchases" as="button" class="w-100 text-left item-menu-group">
                <v-list-item prepend-icon="mdi-cast-variant" title="Mis Compras" value="/purchases" />
            </Link>
            <v-divider></v-divider>

            <v-list-group value="ADMINISTRACION" v-if="mainMenu.ADMINISTRACION">
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
                <Link href="/products" as="button" class="w-100 text-left item-menu-group" v-if="mainMenu.ADMINISTRACION['products.index']">
                    <v-list-item prepend-icon="mdi-vector-intersection" title="Productos" value="/products" />
                </Link>
                <Link href="/clients" as="button" class="w-100 text-left item-menu-group" v-if="mainMenu.ADMINISTRACION['clients.index']">
                    <v-list-item prepend-icon="mdi-account-multiple" title="Clientes" value="/clients" />
                </Link>
                <Link href="/creditTransactions" as="button" class="w-100 text-left item-menu-group" v-if="mainMenu.ADMINISTRACION['transacctions.index']">
                    <v-list-item prepend-icon="mdi-cash" title="Saldo" value="/creditTransactions" />
                </Link>
                <Link href="/accounts" as="button" class="w-100 text-left item-menu-group" v-if="mainMenu.ADMINISTRACION['accounts.index']">
                    <v-list-item prepend-icon="mdi-account-cash" title="Cuentas" value="/accounts" />
                </Link>
            </v-list-group>

            <v-divider v-if="mainMenu.CMS"></v-divider>

            <v-list-group value="CMS" v-if="mainMenu.CMS">
                <template v-slot:activator="{ props }">
                    <v-list-item
                        v-bind="props"
                        title="CMS"
                        class="menu-title-group"
                    >
                        <template v-slot:prepend>
                            <v-icon icon="mdi-content-duplicate" size="x-small"></v-icon>
                        </template>
                    </v-list-item>
                </template>

                <Link href="/banners" as="button" class="w-100 text-left item-menu-group" v-if="mainMenu.CMS['banners.index']">
                    <v-list-item prepend-icon="mdi-image" title="Banner" value="/banners" />
                </Link>

            </v-list-group>

            <v-divider v-if="mainMenu.AUTENTICACION"></v-divider>

            <v-list-group value="AUTENTICACION" v-if="mainMenu.AUTENTICACION">
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

                <Link href="/roles" as="button" class="w-100 text-left item-menu-group" v-if="mainMenu.AUTENTICACION['roles.index']">
                    <v-list-item prepend-icon="mdi-account-group" title="Roles de usuarios" value="/roles" />
                </Link>
                <Link href="/users" as="button" class="w-100 text-left item-menu-group" v-if="mainMenu.AUTENTICACION['users.index']">
                    <v-list-item prepend-icon="mdi-account" title="Usuarios" value="/users" />
                </Link>
            </v-list-group>

            <v-divider v-if="mainMenu.DEFINICIONES"></v-divider>

            <v-list-group value="DEFINICIONES" v-if="mainMenu.DEFINICIONES">
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
                <Link href="/currencies" as="button" class="w-100 text-left item-menu-group" v-if="mainMenu.DEFINICIONES['currencies.index']">
                    <v-list-item prepend-icon="mdi-currency-usd" title="Monedas" value="/currencies" />
                </Link>

                <Link href="/categories" as="button" class="w-100 text-left item-menu-group"  v-if="mainMenu.DEFINICIONES['category.index']">
                    <v-list-item prepend-icon="mdi-shape" title="Categorias" value="/categories" />
                </Link>

                <Link href="/packages" as="button" class="w-100 text-left item-menu-group"  v-if="mainMenu.DEFINICIONES['packages.index']">
                    <v-list-item prepend-icon="mdi-package-variant-closed" title="Planes" value="/packages" />
                </Link>
            </v-list-group>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    data() {
        let mainMenu = {}
        let administrationArray = [
            'products.index',
            'clients.index',
            'transacctions.index',
            'accounts.index',
        ]
        let cmsArray = [
            'banners.index'
        ]
        let authenticationArray = [
            'users.index',
            'roles.index'
        ]
        let definitionsArray = [
            'currencies.index',
            'category.index',
            'packages.index'
        ]

        this.$page?.props?.authUserPermissions.forEach(item => {
            // ADMINISTRACION
            if(administrationArray.includes(item.name))
            {
                mainMenu = {
                    ...mainMenu,
                    'ADMINISTRACION': {
                        ...mainMenu.ADMINISTRACION,
                        [item.name]: true
                    }
                }
            }

             // CMS
            if(cmsArray.includes(item.name))
            {
                mainMenu = {
                    ...mainMenu,
                    'CMS': {
                        ...mainMenu.CMS,
                        [item.name]: true
                    }
                }
            }

            // AUTENTICACION
            if(authenticationArray.includes(item.name))
            {
                mainMenu = {
                    ...mainMenu,
                    'AUTENTICACION': {
                        ...mainMenu.AUTENTICACION,
                        [item.name]: true
                    }
                }
            }

            // DEFINICIONES
            if(definitionsArray.includes(item.name))
            {
                mainMenu = {
                    ...mainMenu,
                    'DEFINICIONES': {
                        ...mainMenu.DEFINICIONES,
                        [item.name]: true
                    }
                }
            }
        })

        return {
            mainMenu
        }
    },
    components:{
        Link,
    },
}

</script>
