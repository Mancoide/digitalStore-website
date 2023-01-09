<template>
    <v-layout>
        <v-app app>
            <Menu />
            <Header/>
            <v-main>
                <v-content>
                    <NotificationBoxVue />
                    <slot />
                </v-content>
            </v-main>
        </v-app>
    </v-layout>
</template>

<script>
    import Header from './Header.vue';
    import Menu from './Menu.vue';
    import NotificationBoxVue from '../shared/NotificationBox.vue';

    export default {
        components: {
            Header,
            Menu,
            NotificationBoxVue
        }
    }
</script>
