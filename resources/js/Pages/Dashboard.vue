<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="">
            <mini-calendar />
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import MiniCalendar from '@/Components/MiniCalendar/MiniCalendar.vue';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        MiniCalendar,
    },
}
</script>
