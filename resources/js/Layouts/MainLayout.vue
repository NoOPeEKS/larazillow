<template>
    <Link href="/">Main Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>
    <div v-if="page.props.flash.success" class="success">
        {{ page.props.flash.success }}
    </div>
    <slot>Default Value</slot>
</template>

<script setup>
    import { Link, usePage } from '@inertiajs/vue3';

    const page = usePage();

</script>

<style scoped>
    .success {
        background-color: green;
        color: white;
    }
</style>