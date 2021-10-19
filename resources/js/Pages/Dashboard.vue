<template>
    <Head title="Domov" />
    
    <authenticated-layout>
        
        <div class="grid grid-cols-10 gap-5 p-5">
            <div class="col-span-3">
                <div class="p-4 bg-white text-sm rounded-xl shadow-lg border border-gray-100">
                    <mini-calendar-component
                        :miniCalendar="miniCalendar"
                        :selectedDay="selectedDay"
                    />
                </div>
                <div class="p-4 mt-5 bg-white text-sm rounded-xl shadow-lg border border-gray-100">
                    <category-component

                    />
                </div>
            </div>
        </div>
        <add-category-modal />
    </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

import MiniCalendarComponent from '@/Components/MiniCalendar/MiniCalendarComponent.vue';
import CategoryComponent from '@/Components/Categories/CategoryComponent.vue';
import AddCategoryModal from '@/Components/Modals/Category/AddCategoryModal.vue';

export default {
    components: {
        AuthenticatedLayout,
        Head,
        MiniCalendarComponent,
        CategoryComponent,
        AddCategoryModal,
    },
    props: {
        miniCalendar: Object,
        selectedDay: Number,
    },
    data() {
        return {
            
        }
    },
}
</script>
