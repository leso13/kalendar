<template>
    <div>
        <mini-calendar-control
            :control="miniCalendar.control"
        />
        <mini-calendar-body 
            :days="miniCalendar.days"
        />
    </div>
</template>

<script>
    import MiniCalendarBody from './MiniCalendarBody.vue'
    import MiniCalendarControl from './MiniCalendarControl.vue'

    export default {
        components: { MiniCalendarBody, MiniCalendarControl },
        
        props: {
            miniCalendar: Object,
        },
    }
</script>

<style lang="css" scoped>
  
</style>