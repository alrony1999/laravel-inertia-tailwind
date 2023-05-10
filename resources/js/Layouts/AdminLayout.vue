<template>
    <div class="min-h-full">
      <div class="flex space-x-2 pl-5">
        <Link :href="route('admin.dashboard.index')" class="mx-2">Dashboard</Link>
        <Link :href="route('admin.roles.index')" class="mx-2">Roles</Link>
        <Link :href="route('admin.permissions.index')" class="mx-2">Permissions</Link>
        <Link :href="route('logout')" method="post" as="button" type="button">Logout</Link>
      </div>
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