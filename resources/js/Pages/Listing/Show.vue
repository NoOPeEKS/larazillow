<template>
    <div>{{ listings.street }} {{ listings.street_nr }}, 
    {{ listings.city }}, for {{ listings.price }}€</div>
</template>
<script setup>
    defineProps({
        listings: Object,
    });
</script>