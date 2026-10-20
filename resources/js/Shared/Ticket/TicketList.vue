<script setup>
import { Link } from "@inertiajs/vue3";
import Pagination from "@/Shared/Pagination.vue";
import StatusBadge from "@/Shared/Ticket/StatusBadge.vue";

defineProps({
    tickets: Object,
    currentTicket: Object,
});
</script>

<template>
    <div>
        <ul class="list bg-base-100 rounded-box shadow-md w-full max-w-4xl">
            <li v-for="ticket in tickets.data" :key="ticket.id">
                <Link
                    :href="`/tickets/${ticket.id}?page=${tickets.current_page}`"
                    :class="{ active: currentTicket?.id === ticket.id }"
                    class="list-row @container"
                >
                    <div class="list-col-grow">
                        <StatusBadge
                            class="@md:hidden mb-2"
                            :ticket-status="ticket.status"
                        />
                        <div>{{ ticket.formatted_id }}: {{ ticket.title }}</div>
                        <div class="text-xs uppercase font-semibold opacity-60">
                            {{ ticket.description_trimmed }}
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-3">
                        <StatusBadge
                            class="hidden @md:block"
                            :ticket-status="ticket.status"
                        />
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-[1.2em] hidden @md:block"
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
