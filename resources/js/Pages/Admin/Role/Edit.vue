<script setup>
import AdminLayout from '../../../Layouts/AdminLayout.vue'
import Svgs from "../../../components/Svgs.vue";
import useAlerts from "../../../composables/useAlerts.js";
import { ref, computed, watch } from "vue";
import { router, Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    role: {
        type: Object,
        default: {}
    },

    permissions: {
        type: Array,
        default: []
    }
});
const form = useForm({
    role: props.role?.name,
    permission: null
});

let permission = ref(null);

const { addAlert, alerts } = useAlerts();

const alert = computed(() => usePage().props.flash.alert);



watch(alert, (newVal) => {
    if (newVal) {
        addAlert(newVal);
    }
});







const emit = defineEmits(['close'])

const updateRole = () => {
    form.put(route('admin.roles.update', { role: props.role.id }), {
        preserveScroll: true,
        onSuccess: () => {
            form.clearErrors();
            alert('Role updated successfully!');
        },
    })
}

const revokePermission = (id) => {
    if (confirm('Are you sure?') && id != null) {
        router.delete(route('admin.roles.permissions.revoke', { role: props.role.id, permission: id }), {
            preserveScroll: true,
            onSuccess: () => {
                form.clearErrors();
                alert('Permission revoked.');
            },
        })
    }

}

const givePermission = () => {
    if (confirm('Are you sure?') && permission.value != null) {
        router.post(route('admin.roles.permissions', { role: props.role.id }),
            {
                permission: permission.value
            },
            {
                preserveScroll: true,
                onSuccess: () => {
                    form.clearErrors();
                    alert('Permission added.');
                },
            })
    }

}

const closeModal = () => {
    form.reset();
    form.clearErrors();
    emit('close');
}

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
            <div class="flex flex-col gap-4">
                                <div class="py-12 w-full">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                                            <div class="flex flex-col p-2 bg-slate-100">
                                                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-1">
                                                    <form>
                                                        <div class="sm:col-span-6">
                                                            <label for="name"
                                                                class="block text-sm font-medium text-gray-700"> Role name
                                                            </label>
                                                            <div class="mt-1">
                                                                <input type="text" id="name" name="name" v-model="form.role"
                                                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                                <span v-if="form.errors.role" class="bg-red-100">{{
                                                                    form.errors.role }}</span>
                                                            </div>

                                                        </div>
                                                        <div class="sm:col-span-6 pt-5">
                                                            <button @click.prevent="updateRole" type="button"
                                                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="mt-6 p-2 bg-slate-100">
                                                <h2 class="text-2xl font-semibold">Role Permissions</h2>
                                                <div v-if="role.permissions" class="flex space-y-2 w-3/4 flex-col mt-4 p-2">
                                                    <form v-for="permission in role.permissions"
                                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
                                                        <button @click.prevent="revokePermission(permission.id)"
                                                            type="button" class="flex">{{
                                                                permission.name }}<span class="ml-10">X</span></button>
                                                    </form>

                                                </div>
                                                <div class="max-w-xl mt-6">
                                                    <form>
                                                        <div class="sm:col-span-6">
                                                            <label for="permission"
                                                                class="block text-sm font-medium text-gray-700">Permission</label>
                                                            <select id="permission" name="permission" v-model="permission"
                                                                autocomplete="permission-name" 
                                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                                                <option v-for="permission in permissions"
                                                                    :value="permission.name">{{ permission.name }}</option>

                                                            </select>
                                                            <span v-if="form.errors.permission" class="bg-red-100">{{
                                                                form.errors.permission }}</span>
                                                        </div>
                                                        <span class="text-red-400 text-sm"></span>
                                                        <div class="sm:col-span-6 pt-5">
                                                            <button @click.prevent="givePermission" type="button"
                                                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </template>


    </AdminLayout>
</template>
