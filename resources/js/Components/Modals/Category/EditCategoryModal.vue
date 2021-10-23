<template>
    <modal-layout v-show="showModal" @click.self="hideModal">
        <template #header>
            <h1 class="">Upraviť kategóriu</h1>
        </template>
        <div>
            <form @submit.prevent="submitForm">
                <form-layout>
                    <template #label>
                        <label>Názov</label>
                    </template>
                    <template #input>
                        <text-input type="text" class="p-2 block w-full bg-gray-200 border-transparent" v-model="formCategory.name"/>
                    </template>
                </form-layout>
                <form-layout>
                    <template #input>
                        <errors-inline v-if="formCategory.errors.name" :errors="formCategory.errors.name"/>
                    </template>
                </form-layout>
                <form-layout class="mt-3">
                    <template #label>
                        <label>Farba</label>
                    </template>
                    <template #input>
                        <div class="flex w-full gap-3">
                            <radio-color name="radioColor" value="red" v-model="formCategory.color" />
                            <radio-color name="radioColor" value="green" v-model="formCategory.color" />
                            <radio-color name="radioColor" value="blue" v-model="formCategory.color" />
                        </div>
                    </template>
                </form-layout>
                <form-layout>
                    <template #input>
                        <errors-inline v-if="formCategory.errors.color" :errors="formCategory.errors.color"/>
                    </template>
                </form-layout>
                <form-layout>
                    <template #buttons>
                        <modal-button class="bg-gray-200 text-gray-500" type="button">Zavriet</modal-button>
                        <modal-button class="bg-gray-500 text-gray-100 ml-2">Upraviť</modal-button>
                    </template>
                </form-layout>

            </form>
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

    export default {
        components: {
            ModalLayout,
            FormLayout,
            TextInput,
            RadioColor,
            ModalButton,
            ErrorsInline,
        },
        props: {
            control: Object,
            controlWeek: Object,
        },
        data() {
            return {
                formCategory: this.$inertia.form({
                    id: null,
                    name: null,
                    color: null,
                }),
                showModal: false
            }
        },
        mounted () {
            window.eventBus.on('showEditCategoryModal', category => {
                // console.log(category)
                this.formCategory.id = category.id
                this.formCategory.name = category.name
                this.formCategory.color = category.color
                this.showModal = true
            })
        },
        methods: {
            submitForm() {
                this.formCategory.put(this.route('categories.update', this.formCategory.id), {
                    only: ['categories', 'errors'],
                    onSuccess: () => {
                        this.$inertia.post('/dashboard', { 
                                control: 'reload', 
                                month: this.control.month, 
                                year: this.control.year,
                                weekTS: this.controlWeek.selectedDay 
                            }, 
                            { only: ['miniCalendar', 'week'], preserveScroll: true }
                        )
                        
                        this.hideModal()
                    },
                   
                })
            },
            hideModal() {
                this.formCategory.reset(),
                this.formCategory.clearErrors(),
                this.showModal = false
            }
        },
    }
</script>
