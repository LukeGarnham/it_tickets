<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: Array,
    preserveScroll: Boolean,
});
</script>

<template>
    <div class="join">
        <template v-for="link in links" :key="link.url ?? link.label">
            <Link
                v-if="link.url"
                :href="link.url"
                class="join-item btn btn-sm"
                :class="link.active ? 'btn-active' : ''"
                :preserve-scroll="preserveScroll"
                ><span v-html="link.label"></span
            ></Link>
            <span
                v-else
                v-html="link.label"
                class="join-item btn btn-sm btn-disabled"
            ></span>
        </template>
    </div>
</template>
