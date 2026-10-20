<script setup>
import { Link } from "@inertiajs/vue3";

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
                <svg
                    v-if="index === 0 || index === links.length - 1"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-[1em]"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        :d="
                            index === 0
                                ? 'M15.75 19.5 8.25 12l7.5-7.5'
                                : 'M8.25 4.5 15.75 12l-7.5 7.5'
                        "
                    />
                </svg>
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
                <svg
                    v-if="index === 0 || index === links.length - 1"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-[1em]"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        :d="
                            index === 0
                                ? 'M15.75 19.5 8.25 12l7.5-7.5'
                                : 'M8.25 4.5 15.75 12l-7.5 7.5'
                        "
                    />
                </svg>
                <span v-else v-html="link.label"></span>
            </span>
        </template>
    </div>
</template>
