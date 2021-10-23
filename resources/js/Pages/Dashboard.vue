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
            <div class="col-span-7">
                <week-component
                    :week="week"
                />
            </div>
        </div>
        
        <add-category-modal />
        <add-event-modal :categories="categories" :modalCalendar="modalCalendar" />
        <edit-category-modal :control="miniCalendar.control" :controlWeek="week.control" />
        <delete-category-modal :control="miniCalendar.control" :controlWeek="week.control" />
    </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

import MiniCalendarComponent from '@/Components/MiniCalendar/MiniCalendarComponent.vue';
import CategoryComponent from '@/Components/Categories/CategoryComponent.vue';
import WeekComponent from '@/Components/Week/WeekComponent.vue';
import AddCategoryModal from '@/Components/Modals/Category/AddCategoryModal.vue';
import AddEventModal from '@/Components/Modals/Event/AddEventModal.vue';
import EditCategoryModal from '@/Components/Modals/Category/EditCategoryModal.vue';
import DeleteCategoryModal from '@/Components/Modals/Category/DeleteCategoryModal.vue';

export default {
    components: {
        AuthenticatedLayout, Head,
        MiniCalendarComponent, CategoryComponent, WeekComponent,
        AddCategoryModal, AddEventModal,
        EditCategoryModal,
        DeleteCategoryModal,
    },
    props: {
        miniCalendar: Object,
        modalCalendar: Object,
        week: Object,
        selectedDay: Number,
        categories: Object,
    },
    data() {
        return {
            
        }
    },
}
</script>
