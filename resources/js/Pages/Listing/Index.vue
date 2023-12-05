<template>
   <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in listings" :key="listing.id" :listing="listing"/>
   </div> 
</template>
<script setup>
    import { Link } from '@inertiajs/vue3';
    import Listing from '@/Pages/Listing/Index/Components/Listing.vue';
    import ListingAddress from '@/Components/ListingAddress.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import Price from '@/Components/Price.vue';
    defineProps({
        listings: Array,
    });
</script>