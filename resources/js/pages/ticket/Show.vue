<script setup>
defineProps({
    currentTicket: Object,
});
</script>

<template>
    <p>
        {{ currentTicket.description }}
    </p>
</template>
