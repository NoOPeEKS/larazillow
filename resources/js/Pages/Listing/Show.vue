<template>
    <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">
        <Box v-if="listings.images.length" class="md:col-span-7 flex items-center w-full">
            <div class="grid grid-cols-2 gap-1">
                <img v-for="image in listings.images" :key="image.id"
                    :src="image.src"
                />
            </div>
        </Box>
        <EmptyState v-else class="md:col-span-7 flex items-center w-full">No images</EmptyState>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic info:
                </template>
                <Price :price="listings.price" class="text-2xl font-bold"/>
                <ListingSpace :listing="listings" class="text-lg"/>
                <ListingAddress :listing="listings" class="text-gray-500"/>
            </Box>
            <Box>
                <template #header>
                    Monthly payment
                </template>
                <div>
                    <label class="label">Interest Rate ({{ interestRate }}%)</label>
                    <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1" 
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />
                    <label class="label">Duration ({{ duration }} years)</label>
                    <input v-model.number="duration" type="range" min="3" max="35" step="1" 
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />
                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-400">Your monthly payment</div>
                        <Price :price="monthlyPayment" class="text-3xl"/>
                    </div>
                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Total paid</div>
                            <div>
                                <Price :price="totalPaid" class="font-medium"/>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Start price</div>
                            <div>
                                <Price :price="listings.price" class="font-medium"/>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Interests paid</div>
                            <div>
                                <Price :price="totalInterest" class="font-medium"/>
                            </div>
                        </div>
                    </div>
                </div>
            </Box>
            <MakeOffer 
                v-if="user && !offerMade" 
                :listing-id="listings.id" 
                :price="listings.price"
                @offer-updated="offer = $event"
            />
            <OfferMade v-if="user && offerMade" :offer="offerMade"/>
        </div>
    </div>
</template>

<script setup>
    import ListingAddress from '@/Components/ListingAddress.vue';
    import Price from '@/Components/Price.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import Box from '@/Components/UI/Box.vue';
    import MakeOffer from '@/Pages/Listing/Show/Components/MakeOffer.vue';
    import OfferMade from '@/Pages/Listing/Show/Components/OfferMade.vue';
    import { ref, computed } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';
import EmptyState from '@/Components/UI/EmptyState.vue';
    const interestRate = ref(2.5);
    const duration = ref(25);

    const props = defineProps({
        listings: Object,
        offerMade: Object,
    });

    const offer = ref(props.listings.price);

    const { monthlyPayment, totalInterest, totalPaid } = useMonthlyPayment(offer, interestRate, duration)
    const page = usePage();
    const user = computed(() => page.props.user);
</script>