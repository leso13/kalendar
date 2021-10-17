<template>
    <Head title="Domov" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="grid grid-cols-6 p-5">
            <div class="col-span-2 p-4 bg-white text-sm rounded-xl shadow-lg border border-gray-100">
                <mini-calendar-box
                    :miniCalendar="miniCalendar"
                    :selectedDay="selectedDay"
                />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';

import MiniCalendarBox from '@/Components/MiniCalendar/MiniCalendarBox.vue';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        MiniCalendarBox,
    },
    props: {
        miniCalendar: Object,
        selectedDay: Number,
    },
}
</script>
