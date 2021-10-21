<template>
    <Head title="Domov" />
    
    <authenticated-layout>
        
        <div class="grid grid-cols-10 gap-5 p-5">
            <div class="col-span-3">
                <mini-calendar-component class="p-4 bg-white text-sm rounded-xl shadow-lg border border-gray-100"
                    :miniCalendar="miniCalendar"
                />
                <category-component class="p-4 mt-5 bg-white text-sm rounded-xl shadow-lg border border-gray-100"
                    :categories="categories"
                />
            </div>
        </div>
        <add-category-modal />
        <edit-category-modal :control="miniCalendar.control" />
        <delete-category-modal :control="miniCalendar.control" />
    </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

import MiniCalendarComponent from '@/Components/MiniCalendar/MiniCalendarComponent.vue';
import CategoryComponent from '@/Components/Categories/CategoryComponent.vue';
import AddCategoryModal from '@/Components/Modals/Category/AddCategoryModal.vue';
import EditCategoryModal from '@/Components/Modals/Category/EditCategoryModal.vue';
import DeleteCategoryModal from '@/Components/Modals/Category/DeleteCategoryModal.vue';

export default {
    components: {
        AuthenticatedLayout,
        Head,
        MiniCalendarComponent,
        CategoryComponent,
        AddCategoryModal,
        EditCategoryModal,
        DeleteCategoryModal,
    },
    props: {
        miniCalendar: Object,
        selectedDay: Number,
        categories: Object,
    },
    data() {
        return {
            
        }
    },
}
</script>
