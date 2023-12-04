<template>
    <div>
        <ListingAddress :listing="listings" />
    </div>
</template>
<script setup>
    import ListingAddress from '@/Components/ListingAddress.vue';
    defineProps({
        listings: Object,
    });
</script>