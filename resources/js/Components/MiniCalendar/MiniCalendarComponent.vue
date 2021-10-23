<template>
    <div>
        <mini-calendar-control
            :control="miniCalendar.control"
        />
        <mini-calendar-body 
            :days="miniCalendar.days"
            @getDay="getDay"
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

        methods: {
            getDay(TS) {
                this.$inertia.post('/dashboard', { 
                        control: 'day', 
                        timestamp: TS, 
                    }, 
                    { only: ['miniCalendar', 'week'], preserveScroll: true }
                )
            }
        },
    }
</script>

<style lang="css" scoped>
  
</style>