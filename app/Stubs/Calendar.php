<?php

namespace App\Stubs;

use Carbon\Carbon;
use stdClass;

use function PHPUnit\Framework\isNull;

class Calendar
{
    protected $calendar;

    public function getCalendar($TS = '')
    {
        $calendar = new Calendar();
        $control = new stdClass();
        $selectedDay = new Carbon();
        $calendar->days = [];
        $today = Carbon::today();
        
        !empty($TS) ? ( $selectedDay = Carbon::createFromTimestamp($TS)->startOfDay() ) : ( $selectedDay = $today );

        $control->month = $selectedDay->month;
        $control->year = $selectedDay->year;
        $control->selectedDay = $selectedDay->timestamp;
        $calendar->control = $control;

        $tempDay = $selectedDay->copy()->startOfMonth();

        $skip = $tempDay->dayOfWeekIso - 1;
        $skip == 0 ? ( $tempDay->subDays(7) ) : ( $tempDay->subDays($skip) );

        for ( $i = 0; $i < 42; $i ++ )
        {
            $day = new stdClass();
            $day->timestamp = $tempDay->timestamp;
            $day->date = ( date('Y-m-d', $day->timestamp) );
            $day->number = $tempDay->day;
            $day->timestamp === $today->timestamp ? ( $day->today = true ) : ( $day->today = false );
            $day->timestamp === $selectedDay->timestamp ? ( $day->selected = true ) : ( $day->selected = false );
            $tempDay->month === $control->month ? ( $day->activeMonth = true ) : ( $day->activeMonth = false );

            array_push( $calendar->days, $day );
            $tempDay->addDay();
        }
        return $calendar;
    }

    public function getWeek($TS = '')
    {
        $calendar = new Calendar();
        $control = new stdClass();
        $selectedDay = new Carbon();
        $calendar->days = [];
        $today = Carbon::today();

        !empty($TS) ? ( $selectedDay = Carbon::createFromTimestamp($TS)->startOfDay() ) : ( $selectedDay = $today );
        
        $tempDay = $selectedDay->copy()->startOfWeek();

        $control->selectedDay = $selectedDay->timestamp;
        $control->month = $tempDay->month;
        $control->year = $tempDay->year;

        $control->firstDay = $tempDay->day;
        $control->firstMonth = $tempDay->month;

        $control->lastDay = $tempDay->copy()->addDays(6)->day;
        $control->lastMonth = $tempDay->copy()->addDays(6)->month;

        $calendar->control = $control;

        for ( $i = 0; $i < 7; $i ++ )
        {
            $day = new stdClass();
            $day->date = ( date('Y-m-d', $tempDay->timestamp) );
            $day->timestamp = $tempDay->timestamp;
            $day->number = $tempDay->day;
            $day->index = $i;

            array_push( $calendar->days, $day );
            $tempDay->addDay();
        }
        return $calendar;
    }

}