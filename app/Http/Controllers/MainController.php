<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stubs\Calendar;
use Carbon\Carbon;
use Inertia\Inertia;

class MainController extends Controller
{
    protected $calendar;

    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    public function index(Request $request)
    {
        $miniCalendar = $this->calendar->getCalendar();
        $selectedDay = '';
        !empty($request->selectedDay) 
            ?  ($selectedDay = $request->selectedDay ) 
            : ( $selectedDay = Carbon::today()->timestamp );

        return Inertia::render('Dashboard', compact('miniCalendar', 'selectedDay'));
    }

  
    public function api(Request $request)
    {
        $date = Carbon::createFromDate($request->year, $request->month, 1);

        switch ( $request->control ) {
            case 'prev':
                $miniCalendar = $this->getPrevMonth($date);
                break;
            case 'next':
                $miniCalendar = $this->getNextMonth($date);
                break;
            default:
                return redirect()->route('dashboard');
        }
        
        return Inertia::render('Dashboard', compact('miniCalendar'));
    }

    public function getPrevMonth($date)
    {
        $date->subMonth();
        $miniCalendar = $this->calendar->getCalendar($date->timestamp);

        return $miniCalendar;
    }

    public function getNextMonth($date)
    {
        $date->addMonth();
        $miniCalendar = $this->calendar->getCalendar($date->timestamp);

        return $miniCalendar;
    }
}
