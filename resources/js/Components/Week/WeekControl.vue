<template>
    <div class="flex justify-between items-center">
        <div class="inline-block">
            <button class="focus:outline-none align-middle" @click="getPrevWeek()">
                <chevron-left-icon class="h-9 w-9 text-gray-500 hover:text-blue-500"/>
            </button>
            <button class="focus:outline-none align-middle" @click="getNextWeek()">
                <chevron-right-icon class="h-9 w-9 text-gray-500 hover:text-blue-500"/>
            </button>
            
            <p class="text-2xl text-gray-500 font-bold align-middle inline-block">
                <span class="capitalize ">{{ monthName(control.firstMonth) }} {{ control.firstDay }} - </span>
                <span v-show="checkMonthDifference" class="capitalize ">{{ monthName(control.lastMonth) }} </span>
                <span class="pl-1">  {{ control.lastDay }}</span>
            </p>
            
        </div>
        <div class="">
            <modal-button class="bg-gradient-to-b from-blue-500 to-blue-600 text-gray-200" type="button"
                @click="addEvent"    
            >
                <plus-sm-icon class="w-4 h-4" />Pridať
            </modal-button>
        </div>
    </div>
</template>

<script>
    import calendarNames from '@/Mixins/calendarNames.js'
    import { ChevronLeftIcon, ChevronRightIcon, PlusSmIcon } from '@heroicons/vue/solid'
    import { Inertia } from '@inertiajs/inertia'
    import ModalButton from '../Forms/ModalButton.vue'

    export default {
        mixins: [calendarNames],
        components: {
            ChevronLeftIcon, ChevronRightIcon, PlusSmIcon,
            ModalButton,
        },
        props: {
            control: Object,
        },
        computed: {
            checkMonthDifference() {
                if(this.control.firstMonth === this.control.lastMonth) {
                    return false;
                }
                return true;
            }
        },
        methods: {
            getPrevWeek() {
                Inertia.post('/dashboard', { control: 'prevWeek', selectedDay: this.control.selectedDay }, { only: ['week'], preserveScroll: true })
            },
            getNextWeek() {
                Inertia.post('/dashboard', { control: 'nextWeek', selectedDay: this.control.selectedDay }, { only: ['week'], preserveScroll: true })
            },
            addEvent() {
                Inertia.post('/dashboard', { control: 'modalCalendar', selectedDay: this.control.selectedDay }, { 
                    only: ['modalCalendar'],
                    preserveScroll: true,
                    onSuccess: () => {
                        window.eventBus.emit('showAddEventModal')
                    } 
                })
                
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>