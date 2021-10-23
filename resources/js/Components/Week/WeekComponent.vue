<template>
    <div>
        <week-control 
            :control="week.control"
        />
        <week-list class="bg-white rounded-xl shadow-lg border border-gray-100"
            :days="week.days"
        />
    </div>
</template>

<script>
    import WeekControl from './WeekControl.vue'
    import WeekList from './WeekList.vue'

    export default {
        components: { WeekList, WeekControl },
        props: {
            week: Object,
        },    
    }
</script>
