<template>
    <Header />
    <div class="d-flex align-items-stretch">
        <Menu />
        <div class="page-holder bg-gray-100">
            <slot />
        </div>
    </div>
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