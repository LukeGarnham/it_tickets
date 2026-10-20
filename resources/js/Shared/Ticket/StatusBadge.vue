<script setup>
import { computed } from "vue";
const props = defineProps({
    ticketStatus: Object,
});
const badgeColour = computed(() => {
    const colours = {
        Closed: "badge-success",
        Ongoing: "badge-primary",
        New: "badge-error",
    };

    return colours[props.ticketStatus?.name] ?? "badge-info";
});
</script>

<template>
    <div class="badge" :class="badgeColour">{{ ticketStatus.name }}</div>
</template>
