<template>
    <v-app-bar>
        <v-app-bar-nav-icon variant="text" @click.stop="(menuDrawer = !menuDrawer)"></v-app-bar-nav-icon>

        <v-spacer></v-spacer>

        <v-menu transition="fab-transition">
            <template v-slot:activator="{ props }">
              <v-btn
                color="secondary"
                icon="mdi-account-circle"
                v-bind="props"
                size="x-large"
              >
              </v-btn>
            </template>
            <v-list>
                <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
            </v-list>
        </v-menu>

    </v-app-bar>
</template>

<script>
import { CIcon } from '@coreui/icons-vue';
import { cilUser } from '@coreui/icons';

export default {
    components:{
        CIcon,
    },
    setup() {
        return {
            cilUser
        }
    }
}

</script>