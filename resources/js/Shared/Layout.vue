<script setup>
import Nav from "./Nav.vue";
</script>
html
<template>
    <header>
        <h1 class="font-bold">Tick.IT</h1>
        <Nav />
    </header>
    <main class="my-4 md:my-6">
        <slot></slot>
    </main>
    <footer></footer>
</template>
