<template>
    <div v-if="categories">
        <div class="px-0.5 flex justify-between items-center rounded-lg hover:bg-gray-100"
            v-for="category in categories" :key="category.id"
        >
            <p class="flex items-center">
                <span class="h-1.5 w-3 rounded-full mr-2 inline-block box-border" :class="'bg-' + category.color + '-500'"></span>
                <span>{{ category.name }}</span>
            </p>
            <div class="flex items-center" v-show="showEditCategories">
                <button class="border border-transparent transform text-gray-400 rounded-full hover:border-gray-200 hover:text-blue-500 hover:scale-110 focus:outline-none"
                    @click="editCategory(category)"
                >
                    <pencil-icon class="h-4 w-4" />
                </button>
                <button class="border border-transparent transform text-gray-400 rounded-full hover:border-gray-200 hover:text-red-500 hover:scale-110 focus:outline-none"
                    @click="deleteCategory(category)"
                >
                    <trash-icon class="h-4 w-4" />
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import { PencilIcon, TrashIcon } from '@heroicons/vue/solid'

    export default {
        components: {
            PencilIcon,
            TrashIcon
        },
        props: {
            categories: Object,
            showEditCategories: Boolean,
        },
        methods: {
            editCategory(category) {
                window.eventBus.emit('showEditCategoryModal', category)
            },
            deleteCategory(category) {
                window.eventBus.emit('showDeleteCategoryModal', category)
            }
        },
    }
</script>

<style lang="css" scoped>
    .category_dot {
        border-radius: 50%;
    }
</style>