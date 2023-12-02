<template>
    <Link href="/">Main Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>
    <slot>Default Value</slot>
</template>

<script setup>
    import {Link} from '@inertiajs/vue3';
</script>