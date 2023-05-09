<template>
    <div class="min-h-full">
        <Link :href="route('home')">Home</Link>
        <Link :href="route('about')">About</Link>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <slot name="header"></slot>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <slot></slot>
            </div>
        </main>
        
        <footer>
            <slot name="footer"></slot>
        </footer>
    </div>
</template>
  
<script setup>
import { Link } from '@inertiajs/vue3';

</script>