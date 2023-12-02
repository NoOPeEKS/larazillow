<template>
    <MainLayout>
        <h1>This is the message: {{ message }}</h1>
    </MainLayout>
</template>

<script setup>
    import MainLayout from '../../Layouts/MainLayout.vue';
    defineProps({
        message: String
    });
</script>