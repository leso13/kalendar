<template>
    <div class="py-4 grid grid-cols-7 divide-x divide-gray-300">
        <div class="flex flex-col justify-between text-center w-full relative"
            v-for="(day, dayIndex) in days" :key="dayIndex"
        >
            <div>
                <h1 class="uppercase text-sm">
                    {{ dayName(day.index) }}
                </h1>
            </div>
            <div>
                <h1 class="text-2xl font-bold" :class="day.today ? 'text-blue-700' : 'text-gray-900'">
                    {{ day.number }}
                </h1>
            </div>
        </div>
    </div>
</template>

<script>
    import calendarNames from '@/Mixins/calendarNames.js'

    export default {
        mixins: [calendarNames],
        props: {
            days: Object,
        },
    }
</script>

<style lang="scss" scoped>

</style>