<template>
    <h1>This is the message: {{ message }}</h1>
</template>

<script setup>
    defineProps({
        message: String
    });
</script>