<template>
    <v-layout>
        <Header />
        <Menu />
        <v-main>
            <!-- <v-app-bar color="grey-lighten-1"> -->
                <slot />
            <!-- </v-app-bar> -->
        </v-main>
    </v-layout>
</template>

<script>
    import Header from './Header.vue';
    import Menu from './Menu.vue';

    export default {
        components: {
            Header,
            Menu
        },
    }
</script>