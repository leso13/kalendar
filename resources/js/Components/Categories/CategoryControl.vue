<template>
    <div class="flex justify-between items-center mb-2">
        <div>
            <h1 class="font-bold text-lg">Kategórie</h1>
        </div>
        <div class="flex items-center">
            <button class="p-1 h-full border border-transparent transform rounded-full hover:border-gray-200 hover:text-gray-500 hover:scale-110 focus:outline-none"
                :class="showEditCategories ? 'bg-gray-100 border-gray-200 text-gray-500 scale-105' : 'text-blue-500'"
                @click="editCategoryList"
            >
                <pencil-alt-icon class="h-4 w-4"/>
            </button>
            <button class="p-1 h-full border border-transparent transform text-blue-500 rounded-full hover:border-gray-200 hover:text-gray-500 hover:scale-110 focus:outline-none"
                @click="showModalAddCategory"
            >
                <plus-icon class="h-4 w-4"/>
            </button>
        </div>
    </div>
</template>

<script>
    import { PencilIcon, PlusIcon, PencilAltIcon, TrashIcon } from '@heroicons/vue/solid'

    export default {
        components: {
            PencilIcon,
            PlusIcon,
            PencilAltIcon,
            TrashIcon
        },
        props: {
            showEditCategories: Boolean,
        },
        methods: {
            showModalAddCategory() {
                // this.$emit('showModalAddCategory')
            },
            editCategoryList() {
                this.$emit('toggleEditCategories')
            },
            deleteCategory(category) {
                
            },
            editCategory(category) {
                // window.eventBus.emit('editCategory', category)
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>