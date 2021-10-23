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
                :class="[ 
                    day.today ? todayClass : 
                        (day.activeMonth ? activeMonthClass : innactiveMonthClass), 
                    day.selected ? selectedClass : '' 
                ]"
                @click="getDay(day.timestamp)"
                v-for="(day, index) in days" :key="index">
                
                {{ day.number }}
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            days: Object,
        },
        data() {
            return {
                selectedClass: 'bg-blue-50 ring-inset ring-2 ring-blue-100',
                activeMonthClass: 'text-gray-700 font-bold',
                todayClass: 'text-blue-500 font-bold',
                innactiveMonthClass: 'text-gray-500',
                // :class="day.today ? 'text-blue-500 font-bold' : day.activeMonth ? 'text-gray-700 font-bold' : 'text-gray-500'"
            }
        },
        computed: {
            chunkedDays() {
                return _.chunk(this.days, 7)
            }
        },
        methods: {
            getDay(TS) {
                this.$emit('getDay', TS)
            }
        },
    }
</script>
