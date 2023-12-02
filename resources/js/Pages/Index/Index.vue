<template>
    <div>Index</div>
    <Link href="/hello">Show Page</Link>
    <h1>This is the message: {{ message }}</h1>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    defineProps({
        message: String
    });
</script>