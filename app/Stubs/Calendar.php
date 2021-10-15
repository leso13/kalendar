<?php

namespace App\Stubs;

use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class Calendar
{
    protected $calendar;

    public function getMonth($TS = '')
    {
        $today = Carbon::today();
        !empty($TS) ? ( $firstDay = Carbon::createFromTimestamp($TS)->startOfDay() ) : ( $firstDay = $today );
        dd($firstDay);

        // dd(date('Y-m-d H:i', $firstDay->timestamp));

        return 0;
        
    }

}