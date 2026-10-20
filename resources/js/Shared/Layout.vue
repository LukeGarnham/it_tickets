<script setup>
import Nav from "./Nav.vue";
</script>
html
<template>
    <header class="sticky top-0 right-0 left-0 z-10">
        <Nav />
    </header>
    <main class="my-4 md:my-6 relative">
        <slot></slot>
    </main>
    <footer></footer>
</template>
