<script setup>
import { Link, router, usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
import Pagination from "@/Shared/Pagination.vue";
import StatusBadge from "@/Shared/Ticket/StatusBadge.vue";
import RightChevron from "../Icons/RightChevron.vue";
import debounce from "lodash/debounce";

const page = usePage();
const tickets = computed(() => page.props.tickets ?? []);
let filters = computed(() => page.props.filters ?? {});
let search = ref(filters.value.search ?? "");
watch(
    search,
    debounce((value) => {
        router.get(
            "/tickets",
            { search: value },
            {
                preserveState: true, // preserveState prevents Vue components from resetting/remounting.
                replace: true, // replace ensures that each time the query string changes, we replace the new entry in the history stack (so hitting back btn doesn't cycle back through search string)
            },
        );
    }, 500),
);

defineProps({
    currentTicket: Object,
});
</script>

<template>
    <div>
        <label class="input">
            <svg
                class="h-[1em] opacity-50"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
            >
                <g
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke-width="2.5"
                    fill="none"
                    stroke="currentColor"
                >
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input
                v-model="search"
                id="ticket-search"
                type="search"
                required
                placeholder="Search"
            />
        </label>
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
                        <RightChevron
                            class="size-[1.2em] hidden @md:block"
                            aria-label="Select ticket"
                        />
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
