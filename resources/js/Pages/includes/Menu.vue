<template>
    <div class="sidebar py-3" id="sidebar">
        <!-- <h6 class="sidebar-heading">Main</h6> -->
        <ul class="list-unstyled">
            <li class="sidebar-list-item">
                <!-- <x-orchid-icon path="fa.home" class="icon-big svg-icon svg-icon me-3" /> -->
                <NavLink href="/" :active="$page.component === 'Home'">
                    <CIcon class="icon-big svg-icon svg-icon me-3" :icon="icon.cilHouse" size="xl"/>
                    <span class="sidebar-link-title"> Tablero</span>
                </NavLink>
            </li>
            <li class="sidebar-list-item">
                <NavLink href="#" data-bs-target="#configDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"
                    :active="$page.component.startsWith('Users') || $page.component.startsWith('Roles')"
                >
                    <CIcon :icon="icon.cilAppsSettings" size="xl" class="icon-big svg-icon svg-icon me-3"/>
                    <span class="sidebar-link-title">Configuración </span>
                </NavLink>
                <ul id="configDropdown" class="sidebar-menu list-unstyled collapse">
    
                    <li class="sidebar-list-item">
                        <NavLink href="users" :active="$page.component === 'Users/Index'">
                            Usuarios
                        </NavLink>
                    </li>
                    
                    <li class="sidebar-list-item">
                        <NavLink href="roles" :active="$page.component === 'Roles/Index'">
                            Roles
                        </NavLink>
                    </li>
                </ul>
              </li>
        </ul>
    </div>
</template>

<script>
import NavLink  from '../shared/NavLink.vue'
import { CIcon } from '@coreui/icons-vue';
import * as icon from '@coreui/icons';

export default {
    components:{
        CIcon,
        NavLink
    },
    setup() {
        return {
        icon,
        }
    }
}

</script>