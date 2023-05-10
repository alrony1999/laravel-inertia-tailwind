<script setup>
import { ref, computed, watch } from "vue";
import { router, usePage, Link } from '@inertiajs/vue3'
import useAlerts from "../../../composables/useAlerts.js";
import AdminLayout from '../../../Layouts/AdminLayout.vue'
import RoleCreateModal from '../../../components/Role/CreateModal.vue'

const { addAlert, alerts } = useAlerts();

const alert = computed(() => usePage().props.flash.alert);
const showCreateModal = ref(false);

watch(alert, (newVal) => {
    if (newVal) {
        addAlert(newVal);
    }
});

let deleteRole = (id) => {
    router.delete(route('admin.roles.destroy', { role: id }), {
        preserveScroll: true,
    })
};

const props = defineProps({
    roles: Array,
    permissions: Array,
});

</script>

<template>
    <AdminLayout>
        <template #header>
            <h1>Roles</h1>
        </template>

        <template #default>
            <div v-if="alerts.length" class="d-flex justify-center">
                <div v-for="alert in alerts" :key="alert.id">
                    <div :class="{
                        'text-green-600': alert.type === 'success',
                        'text-yellow-600': alert.type === 'warning',
                        'text-red-600': alert.type === 'danger',
                    }" class=" text-md font-medium w-auto border border-gray-200 text-center py-2 px-5 rounded-md">
                        <p> {{ alert.message }}</p>
                    </div>
                </div>
            </div>

            <div class="py-12 w-full">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                        <div class="flex justify-end p-2">
                            <button @click="showCreateModal = true"
                                class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Create Role</button>
                        </div>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name</th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">

                                                <tr v-for="role in roles">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            {{ role.name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex justify-end">
                                                            <div class="flex space-x-2">
                                                                <Link :href="route('admin.roles.edit', { role: role.id })"
                                                                    class="px-4 py-2 bg-yellow-700 hover:bg-yellow-500 rounded-md">
                                                                Edit</Link>
                                                                <button @click.prevent="deleteRole(role.id)"
                                                                    class="px-4 py-2 bg-red-700 hover:bg-red-500 rounded-md">Delete</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <RoleCreateModal :isOpen="showCreateModal" @close="showCreateModal = false" />
        </template>


    </AdminLayout>
</template>
