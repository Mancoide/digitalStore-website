<template>
    <Link 
        class="sidebar-link text-muted"
        :class="{ 'active': active}"
    >
        <slot />
    </Link>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default{
        components: {
            Link
        },
        props: {
            active: Boolean
        }
    }
</script>