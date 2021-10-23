<template>
    <modal-layout v-show="showModal" @click.self="hideModal">
        <template #header>
            <h1 class="">Odstrániť kategóriu</h1>
        </template>
        <div>
            <form @submit.prevent="submitForm">
                <div class="text-center">Naozaj si želáte odstrániť kategóriu
                    <span class="font-bold" :class="'text-' + formCategory.color + '-500'">{{ formCategory.name }}</span> ?
                </div>
                <form-layout>
                    <template #buttons>
                        <modal-button class="bg-gray-200 text-gray-500" type="button" @click="showModal = false">Zavrieť</modal-button>
                        <modal-button class="bg-green-500 text-gray-100 ml-2">Áno</modal-button>
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
            window.eventBus.on('showDeleteCategoryModal', category => {
                // console.log(category)
                this.formCategory.id = category.id
                this.formCategory.name = category.name
                this.formCategory.color = category.color
                this.showModal = true
            })
        },
        methods: {
            submitForm() {
                console.log('submit')
                this.formCategory.delete(this.route('categories.destroy', this.formCategory.id), {
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
