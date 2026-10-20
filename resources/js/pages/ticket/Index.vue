<script setup>
import Layout from "@/Shared/Layout.vue";
import TicketList from "@/Shared/Ticket/TicketList.vue";
defineProps({
    tickets: Object,
});
defineOptions({ layout: Layout });
</script>

<template>
    <TicketList :tickets="tickets" class="grid justify-items-center" />
</template>
