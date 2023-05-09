<template>
    <AppLayout>
        <template #header>
            <h1>Here might be a page title</h1>
        </template>

        <template #default>
            <p>A paragraph for the main content.</p>
            <p>And another one.</p>
        </template>

      
    </AppLayout>
</template>
<script setup>
import AppLayout from '../Layouts/App.vue'
</script>
