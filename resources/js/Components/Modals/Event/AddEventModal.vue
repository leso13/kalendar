<template>
    <modal-layout v-show="showModal" @click.self="hideModal">
        <template #header>
            <h1 class="">Pridať udalosť
                <button class="float-right text-gray-500 hover:text-blue-500">    
                    <x-circle-icon class="w-6 h-6"/>
                </button>
            </h1>
        </template>
        <div class="grid grid-cols-2">
            <div class="col-span-1 p-3 text-sm bg-white rounded-xl">
                <mini-calendar-body :days="modalCalendar.days" @getDay="getDay"/>
            </div>
            <div class="col-span-1">
                <form @submit.prevent="submitForm">
                    <form-layout>
                        <template #label>
                            <label>Názov</label>
                        </template>
                        <template #input>
                            <text-input type="text" class="p-2 block w-full bg-gray-200 border-transparent" v-model="formEvent.name" />
                        </template>
                    </form-layout>
                    <form-layout>
                        <template #input>
                            <errors-inline v-if="formEvent.errors.name" :errors="formEvent.errors.name"/>
                        </template>
                    </form-layout>
                    <form-layout>
                        <template #buttons>
                            <modal-button class="bg-gray-200 text-gray-500" type="button" @click="showModal = false">Zavriet</modal-button>
                            <modal-button class="bg-gray-500 text-gray-100 ml-2">Pridať</modal-button>
                        </template>
                    </form-layout>
                </form>
            </div>
        </div>
    </modal-layout>
</template>

<script>
    import ModalLayout from '@/Layouts/Modal.vue'
    import FormLayout from '@/Layouts/Form.vue'
    import TextInput from '@/Components/Forms/TextInput.vue'
    import RadioColor from '@/Components/Forms/RadioColor.vue'
    import ModalButton from '@/Components/Forms/ModalButton.vue'
    import ErrorsInline from '@/Components/Forms/ErrorsInline.vue'
    import MiniCalendarBody from '@/Components/MiniCalendar/MiniCalendarBody.vue'
    import { XCircleIcon } from '@heroicons/vue/outline'

    export default {
        components: {
            ModalLayout,
            FormLayout,
            TextInput,
            RadioColor,
            ModalButton,
            ErrorsInline,
            MiniCalendarBody,
            XCircleIcon,
        },
        props: {
            categories: Object,
            modalCalendar: Object,
        },
        data() {
            return {
                formEvent: this.$inertia.form({
                    name: null,
                    color: null,
                }),
                showModal: false
            }
        },
        mounted () {
            window.eventBus.on('showAddEventModal', showModal => {
                this.showModal = true;
            })
        },
        methods: {
            getDay(TS) {
                console.log(TS)
                this.$inertia.post('/dashboard', { 
                        control: 'modalCalendar', 
                        timestamp: TS, 
                    }, 
                    { only: ['modalCalendar'], preserveScroll: true }
                )
            },
            submitForm() {
                // this.formCategory.post(this.route('categories.store'), {
                //     only: ['categories', 'errors'],
                //     onSuccess: () => {
                //         this.hideModal()
                //     },
                   
                // })
            },
            hideModal() {
                this.formEvent.clearErrors(),
                this.formEvent.reset(),
                this.showModal = false
            }
        },
    }
</script>
