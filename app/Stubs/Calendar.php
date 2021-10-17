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
        $calendar->days = [];
        $today = Carbon::today();
        $selectedDay = new Carbon();
        
        !empty($TS) ? ( $selectedDay = Carbon::createFromTimestamp($TS)->startOfDay() ) : ( $selectedDay = $today );
        $calendar->month = $selectedDay->month;
        $calendar->year = $selectedDay->year;
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

}