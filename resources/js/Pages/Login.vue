<template>
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
    <div class="flex justify-center items-center mt-52">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="identity-input mb-4">
                    <label for="identity" class="block text-gray-700 text-sm font-bold mb-2">
                        Email</label>
                    <input id="identity"
                        class="shadow appearance-none borderrounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Email" aria-describedby="emailHelp" v-model="form.email" />
                      
                    <span v-if="form.errors.email" class="text-xs text-red-700" id="emailHelp">{{ form.errors.email }}</span>
                </div>

                <div class="password-input mb-6">
                    <label for="identity" class="block text-gray-700 text-sm font-bold mb-2">Password</label>

                    <input aria-describedby="passwordHelp" v-model="form.password"
                        class="shadow appearance-none borderrounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" placeholder="*******" />

                    <span v-if="form.errors.password" class="text-xs text-red-700" id="passwordHelp">{{ form.errors.password }}</span>
                </div>

                <div class="flex items-center justify-between">
                    <button @click.prevent="submitForm" type="primary"
                        class="bg-blue-600 hover:bg-black text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</template>


<script setup>
import { computed,watch } from "vue";
import { usePage } from '@inertiajs/vue3'
import { useForm } from "@inertiajs/vue3";
import useAlerts from "@/composables/useAlerts.js";

const { addAlert, alerts } = useAlerts();

const alert = computed(() => usePage().props.flash.alert);
watch(alert, (newVal) => {
    console.log(newVal)
    if (newVal) {
        addAlert(newVal);
    }
});

const form = useForm({
    password: null,
    email: null,
});

const submitForm = () => {
    form.post('/login', {
        preserveScroll: true,
    })
}

</script>