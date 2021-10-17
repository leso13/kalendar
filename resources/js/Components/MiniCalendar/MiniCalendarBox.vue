<template>
    <div>
        <mini-calendar-control
            :selectedDay="selectedDay"
            :year="miniCalendar.year"
            :month="miniCalendar.month"
        />
        <mini-calendar-body :miniCalendar="miniCalendar" />
    </div>
</template>

<script>
    import MiniCalendarBody from './MiniCalendarBody.vue'
    import MiniCalendarControl from './miniCalendarControl.vue'

    export default {
        components: { MiniCalendarBody, MiniCalendarControl },
        
        props: {
            miniCalendar: Object,
            selectedDay: Number,
        },
    }
</script>

<style lang="css" scoped>
  
</style>