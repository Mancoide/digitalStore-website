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
            <v-card class="mx-auto" max-width="300" tile>
                <v-list dense>
                    <v-list-item-group v-model="selectedItem" color="primary" >
                        <v-list-item>
                            <v-btn color="black" dark href="/#">
                            <!-- <v-btn color="black" dark href="/password"> -->
                                <v-icon>mdi-key-change</v-icon>
                                <span color="white">Contraseña</span>
                            </v-btn>
                        </v-list-item>
                        <v-list-item>
                            <v-btn class="w-100 justify-content-start" color="black" dark href="/logout">
                                <v-icon>mdi-logout-variant</v-icon> &nbsp;
                                <span color="white">Salir</span>
                            </v-btn>
                        </v-list-item>
                    </v-list-item-group>
                </v-list>
            </v-card>
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
