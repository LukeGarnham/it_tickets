<script setup>
import Layout from "@/Shared/Layout.vue";
import { Link } from "@inertiajs/vue3";
import Pagination from "@/Shared/Pagination.vue";
import StatusBadge from "@/Shared/Ticket/StatusBadge.vue";
defineProps({
    tickets: Object,
    currentTicket: Object,
});
defineOptions({ layout: Layout });
</script>
<template>
    <div class="grid place-content-center">
        <ul class="list bg-base-100 rounded-box shadow-md w-4xl max-w-4xl">
            <li v-for="ticket in tickets.data" :key="ticket.id">
                <Link
                    :href="`/tickets/${ticket.id}?page=${tickets.current_page}`"
                    :class="{ active: currentTicket?.id === ticket.id }"
                    class="list-row"
                >
                    <div>
                        <div>{{ ticket.formatted_id }}: {{ ticket.title }}</div>
                        <div class="text-xs uppercase font-semibold opacity-60">
                            {{ ticket.description_trimmed }}
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-3">
                        <StatusBadge :ticket-status="ticket.status" />
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-[1.2em]"
                            aria-label="Select ticket"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m8.25 4.5 7.5 7.5-7.5 7.5"
                            />
                        </svg>
                    </div>
                </Link>
            </li>
        </ul>
        <Pagination
            :links="tickets.links"
            :preserveScroll="true"
            class="mt-4 flex justify-center"
        />
    </div>
</template>
