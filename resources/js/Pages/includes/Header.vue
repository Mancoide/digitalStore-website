<template>
    <v-app-bar app>
        <!-- <v-app-bar-nav-icon variant="text"></v-app-bar-nav-icon> -->

        <v-spacer></v-spacer>

        <span class="fw-bold">
            Saldo  ${{ this.$page.props.auth.amount }}
        </span>

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
    },
}

</script>
