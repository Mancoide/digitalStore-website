<template>
        
    <v-menu transition="fade-transition">
        <template v-slot:activator="{ props }">
          <v-btn
            color="default"
            v-bind="props"
            icon="mdi-dots-vertical"
            size="small"
          >
          </v-btn>
        </template>
            <v-list min-width="100%">
                <v-list-item v-for="item in items" :key="item.name" active-color="primary">
                    <v-icon :icon="item.icon"></v-icon>  &NonBreakingSpace;
                    <Link :href="item.navigateTo.replace(':id', idRegister)" as="button">
                        <v-list-item-title v-text="item.name"></v-list-item-title>
                    </Link>
                </v-list-item>
            </v-list>
    </v-menu>
  
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Link
        },
        props: {
            items: Array,
            idRegister: Number
        }
    }

</script>