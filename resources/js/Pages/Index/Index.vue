<template>
    <h1>This is the message: {{ message }}</h1>
</template>

<script setup>
    defineProps({
        message: String
    });
</script>

<script>
    import MainLayout from '../../Layouts/MainLayout.vue';
    export default {
        layout: MainLayout
    }
</script>