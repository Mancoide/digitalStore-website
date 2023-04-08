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
                            <v-btn color="white" dark href="/password">
                                <v-icon>mdi-key-change</v-icon>
                                <span color="black">Contraseña</span>
                            </v-btn>
                        </v-list-item>

                        <v-list-item v-if="mainMenu.AUTENTICACION && mainMenu.AUTENTICACION['users.loginWith']">
                            <v-btn color="white" dark href="/users/login-with">
                                <v-icon>mdi-key-arrow-right</v-icon> &nbsp;
                                <span color="black">Login Como</span>
                            </v-btn>
                        </v-list-item>

                        <v-list-item>
                            <v-btn class="w-100 justify-content-start" color="white" dark href="/logout">
                                <v-icon>mdi-logout-variant</v-icon> &nbsp;
                                <span color="black">Salir</span>
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
    data() {
        let mainMenu = {}
        let authenticationArray = [
            'users.loginWith',
        ]

        this.$page?.props?.authUserPermissions.forEach(item => {
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
        })

        return {
            mainMenu
        }
    },

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
