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

        $currentMonth = $selectedDay->month;
        $tempDay = $selectedDay->copy()->startOfMonth();

        $skip = $tempDay->dayOfWeekIso - 1;
        $skip == 0 ? ( $tempDay->subDays(7) ) : ( $tempDay->subDays($skip) );

        for ( $i = 0; $i < 42; $i ++ )
        {
            $day = new stdClass();
            $day->date = ( date('Y-m-d', $tempDay->timestamp) );
            $day->timestamp = $tempDay->timestamp;
            $day->number = $tempDay->day;
            
            $tempDay->month === $currentMonth ? ( $day->active = true ) : ( $day->active = false );

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

        $control->month = $selectedDay->month;
        $control->year = $selectedDay->year;
        $control->selectedDay = $selectedDay->timestamp;
        $calendar->control = $control;
    }

}