<script setup>
import { Link } from "@inertiajs/vue3";
import RightChevron from "./Icons/RightChevron.vue";
import LeftChevron from "./Icons/LeftChevron.vue";

defineProps({
    links: Array,
    preserveScroll: Boolean,
});
</script>

<template>
    <div class="join flex-wrap">
        <template v-for="(link, index) in links" :key="link.url ?? link.label">
            <Link
                v-if="link.url"
                :href="link.url"
                class="join-item btn btn-sm"
                :class="link.active ? 'btn-active' : ''"
                :preserve-scroll="preserveScroll"
                :aria-label="
                    index === 0
                        ? 'Previous page'
                        : index === links.length - 1
                          ? 'Next page'
                          : 'Select page ' + link.label
                "
            >
                <LeftChevron
                    v-if="index === 0"
                    class="size-[1em]"
                    aria-hidden="true" />
                <RightChevron
                    v-else-if="index === links.length - 1"
                    class="size-[1em]"
                    aria-hidden="true" />
                <span v-else v-html="link.label"></span
            ></Link>
            <span
                v-else
                class="join-item btn btn-sm btn-disabled"
                :aria-label="
                    index === 0
                        ? 'Previous page'
                        : index === links.length - 1
                          ? 'Next page'
                          : ''
                "
            >
                <LeftChevron
                    v-if="index === 0"
                    class="size-[1em]"
                    aria-hidden="true"
                />
                <RightChevron
                    v-else-if="index === links.length - 1"
                    class="size-[1em]"
                    aria-hidden="true"
                />
                <span v-else v-html="link.label"></span>
            </span>
        </template>
    </div>
</template>
