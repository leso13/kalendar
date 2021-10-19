<template>
    <modal-layout>
        <template #header>
            <h1 class="">Pridať kategoriu</h1>
        </template>
        <div>
            <form>
                <form-layout>
                    <template #label>
                        <label>Nazov</label>
                    </template>
                    <template #input>
                        <text-input class="p-1 block w-full"/>
                    </template>
                </form-layout>
            </form>
        </div>
    </modal-layout>
</template>

<script>
    import ModalLayout from '@/Layouts/Modal.vue'
    import FormLayout from '@/Layouts/Form.vue'
    import TextInput from '@/Components/Input.vue'

    export default {
        components: {
            ModalLayout,
            FormLayout,
            TextInput,
        },
    }
</script>
