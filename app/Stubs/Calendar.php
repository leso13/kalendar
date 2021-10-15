<?php

namespace App\Stubs;

use Carbon\Carbon;

class Calendar
{
    protected $calendar;

    public function getMonth($day = '')
    {
        $today = Carbon::today()->startOfDay();
        // $firstDay = $today->start
        // isset($day) ? 

        // dd(date('Y-m-d', $today->timestamp));

        return 0;
        
    }

}