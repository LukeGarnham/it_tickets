<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: Array,
    preserveScroll: Boolean,
});
</script>

<template>
    <div class="join">
        <template v-for="link in links">
            <Link
                v-if="link.url"
                v-html="link.label"
                :href="link.url"
                class="join-item btn btn-sm"
                :class="link.active ? 'btn-active' : ''"
                :preserve-scroll="preserveScroll"
            ></Link>
            <span
                v-else
                v-html="link.label"
                class="join-item btn btn-sm"
                :class="link.url ? '' : 'btn-disabled'"
            ></span>
        </template>
    </div>
    <!-- <pre>{{ JSON.stringify(links, null, 2) }}</pre> -->
</template>
