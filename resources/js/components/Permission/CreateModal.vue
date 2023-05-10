<script setup>
// import { ref, watch } from "vue";
// import {
//     TransitionRoot,
//     TransitionChild,
//     Dialog,
//     DialogPanel,
//     DialogTitle,
// } from "@headlessui/vue";
// import Svgs from "@/components/Svgs.vue";
// import { useForm } from "@inertiajs/vue3";
// const form = useForm({
//     id: null,
//     name: null,
//     phone: null,
//     email: null,
//     address: null,
//     feedback: null,
//     prospect: null,
//     country: null,
//     status: null,
//     follow_up_date: null,
//     agent_id: null,
// });

// watch(() => props.lead, (newValue) => {
//     form.id = newValue?.id;
//     form.name = newValue?.name;
//     form.phone = newValue?.phone;
//     form.email = newValue?.email;
//     form.address = newValue?.address;
//     form.feedback = newValue?.feedback;
//     form.prospect = newValue?.prospect;
//     form.country = newValue?.country;
//     form.status = newValue?.status;
//     form.follow_up_date = newValue?.follow_up_date;
//     form.agent_id = newValue?.agent_id;
// })

// const props = defineProps({
//     isOpen: {
//         type: Boolean,
//     },
//     lead: {
//         type: Object,
//         default: {}
//     },
//     leadStatus: {
//         type: Array,
//         default: []
//     },
//     prospects: {
//         type: Array,
//         default: []
//     },
//     countryList: {
//         type: Array,
//         default: []
//     },
//     agents: {
//         type: Array,
//         default: []
//     }
// });

// const emit = defineEmits(['close'])

// const submitForm = () => {
//     form.put(`/leads/${form.id}/update`, {
//         preserveScroll: true,
//         onSuccess: () => {
//             form.reset();
//             emit('close');
//         },
//     })
// }

// const capitalized = (name) => {
//     const capitalizedFirst = name[0].toUpperCase();
//     const rest = name.slice(1);

//     return capitalizedFirst + rest;
// }


</script>
<template>
    <!-- <TransitionRoot :show="isOpen" as="template">
        <Dialog as="div" @close="$emit('close')" class="relative z-10">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto pb-20 lg:pb-0">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95">
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden flex-col flex gap-5 rounded-md bg-white p-6 text-left align-middle shadow-xl transition-all">
                            <DialogTitle as="div" class="flex justify-between items-start">
                                <div class="flex flex-col gap-1">
                                    <h3 class="text-lg font-semibold">
                                        Edit Lead :
                                    </h3>
                                </div>

                                <button type="button"
                                    class="commonButton hover:bg-red-500 text-red-500 border-red-500 p-1 px-2 flex items-center active:translate-y-px p-1 focus:ring-red-800"
                                    @click="$emit('close')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </DialogTitle>

                            <div class="flex flex-col gap-4">
                                <el-form :model="form" class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>

                                            <h4 class="font-">Name</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-input v-model="form.name"></el-input>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                            </svg>

                                            <h4 class="font-">Mobile</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-input v-model="form.phone"></el-input>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                            </svg>

                                            <h4 class="font-">Email</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-input v-model="form.email"></el-input>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                            </svg>

                                            <h4 class="font-">Address</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-input v-model="form.address"></el-input>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                                            </svg>

                                            <h4 class="font-">Feedback</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-input v-model="form.feedback"></el-input>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />
                                            </svg>

                                            <h4 class="font-">Country</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-select v-model="form.country" placeholder="Select your prospect">
                                                    <el-option v-for=" country in countryList" :key="country"
                                                        :label="capitalized(country)" :value="country" />

                                                </el-select>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 6h.008v.008H6V6z" />
                                            </svg>

                                            <h4 class="font-">Prospect</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-select v-model="form.prospect" placeholder="Select your prospect">

                                                    <el-option v-for="prospect in prospects" :key="prospect"
                                                        :label="capitalized(prospect)" :value="prospect" />

                                                </el-select>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                            </svg>

                                            <h4 class="font-">Lead Status</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-select v-model="form.status" placeholder="Select your lead status">
                                                    <el-option v-for="status in leadStatus" :key="status"
                                                        :label="capitalized(status)" :value="status" />

                                                </el-select>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                            </svg>

                                            <h4 class="font-">Follow Up</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-date-picker v-model="form.follow_up_date" type="date"
                                                    placeholder="Pick a day" />
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>

                                            <h4 class="font-">Assigned Employee</h4>
                                        </div>

                                        <el-form-item>
                                            <div class="flex flex-col gap-1 w-full">
                                                <el-select v-model="form.agent_id" placeholder="Assign a employee">
                                                    <el-option v-for="agent in agents" :key="agent?.name"
                                                        :label="capitalized(agent?.name)" :value="agent?.id" />

                                                </el-select>
                                            </div>
                                        </el-form-item>
                                    </div>
                                    <el-form-item>
                                        <el-button @click.prevent="submitForm" type="primary">update</el-button>
                                    </el-form-item>

                                </el-form> 

                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot> -->
</template>