<template>
    <div>
        <div class="grid grid-cols-7 gap-1 text-gray-600">
            <span class="mb-1 text-sm capitalize text-center"
                v-for="(week, index) in $page.props.dayNames.short" :key="index"
            >{{ week }}
            </span>
        </div>
        <div class="grid grid-cols-7 gap-1 rounded-xl hover:bg-gray-100"
            v-for="(days, index) in chunkedDays" :key="index">
            <span class="py-1 text-center hover:bg-blue-200 rounded-xl cursor-pointer"
                :class="day.active ? 'font-bold text-gray-600' : 'text-gray-500'"
                v-for="(day, index) in days" :key="index">
                {{ day.number }}
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            miniCalendar: Object,
        },
        computed: {
            chunkedDays() {
                return _.chunk(this.miniCalendar.days, 7)
            }
        },
    }
</script>
