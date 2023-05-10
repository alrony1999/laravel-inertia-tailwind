<script setup>
import { ref, watch } from "vue";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
import Svgs from "../../components/Svgs.vue";
import { useForm } from "@inertiajs/vue3";
const form = useForm({
    name: null,
});

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

const props = defineProps({
    isOpen: {
        type: Boolean,
    },
});

const emit = defineEmits(['close'])

const submitForm = () => {
    console.log(form)
    form.post(route('admin.roles.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            form.clearErrors();
            emit('close');
        },
    })
}

const closeModal = () => {
    form.reset();
    form.clearErrors();
    emit('close');
}

</script>
<template>
    <TransitionRoot :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
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
                                        Create New Lead :
                                    </h3>
                                </div>

                                <button type="button"
                                    class="commonButton hover:bg-red-500 text-red-500 border-red-500 p-1 px-2 flex items-center active:translate-y-px p-1 focus:ring-red-800"
                                    @click="closeModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </DialogTitle>

                            <div class="flex flex-col gap-4">

                                <form method="POST" action="">

                                    <div class="sm:col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700"> Role name
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" id="name" v-model="form.name" name="name"
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                            <span v-if="form.errors.name" class="bg-red-100">{{ form.errors.name }}</span>
                                        </div>

                                    </div>
                                    <div class="sm:col-span-6 pt-5">
                                        <button @click.prevent="submitForm" type="primary"
                                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Create</button>
                                    </div>
                                </form>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>