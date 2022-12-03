<template>
    <v-layout>
        <v-app>
            <Menu />
            <Header />
            <v-main>
                <v-content>
                    <slot />
                </v-content>
            </v-main>
        </v-app>
    </v-layout>
</template>

<script>
    import Header from './Header.vue';
    import Menu from './Menu.vue';

    export default {
        components: {
            Header,
            Menu
        }
    }
</script>