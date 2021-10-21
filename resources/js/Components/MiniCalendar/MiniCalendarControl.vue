<template>
    <div class="flex justify-between items-center mb-3">
        <div class="">
            <h1 class="capitalize font-bold text-xl">{{ month_name(control.month) }} {{ control.year }}</h1>
        </div>
        <div class="flex">
            <button class="focus:outline-none" @click="getPrevMonth()">
                <chevron-left-icon class="h-8 w-8 text-blue-500"/>
            </button>
            <button class="focus:outline-none" @click="getNextMonth()">
                <chevron-right-icon class="h-8 w-8 text-blue-500"/>
            </button>
        </div>
    </div>
</template>

<script>
    import MonthNames from '@/Mixins/MonthNames.js'
    import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        mixins: [ MonthNames ],
        components: {
            ChevronLeftIcon,
            ChevronRightIcon,
        },
        props: {
            control: Object,
        },
        methods: {
            getPrevMonth() {
                Inertia.post('/dashboard', { control: 'prev', month: this.control.month, year: this.control.year }, { only: ['miniCalendar'], preserveScroll: true })
            },
            getNextMonth() {
                Inertia.post('/dashboard', { control: 'next', month: this.control.month, year: this.control.year }, { only: ['miniCalendar'], preserveScroll: true })
            },
        },
    }
</script>

<style lang="css" scoped>

</style>