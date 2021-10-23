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
        $modalCalendar = $miniCalendar;
        $week = $this->calendar->getWeek();
        $categories = auth()->user()->categories;
        $selectedDay = '';
        !empty($request->selectedDay) 
            ?  ($selectedDay = $request->selectedDay ) 
            : ( $selectedDay = Carbon::today()->timestamp );

        return Inertia::render('Dashboard', compact('miniCalendar', 'modalCalendar', 'week', 'selectedDay', 'categories'));
    }

  
    public function api(Request $request)
    {
        

        switch ( $request->control ) {
            case 'prev':
                $date = Carbon::createFromDate($request->year, $request->month, 1);
                $miniCalendar = $this->getPrevMonth($date);
                return Inertia::render('Dashboard', compact('miniCalendar'));
                break;
            case 'next':
                $date = Carbon::createFromDate($request->year, $request->month, 1);
                $miniCalendar = $this->getNextMonth($date);
                return Inertia::render('Dashboard', compact('miniCalendar'));
            break;
            case 'prevWeek':
                $date = Carbon::createFromTimestamp($request->selectedDay);
                $week = $this->getPrevWeek($date);
                return Inertia::render('Dashboard', compact('week'));
                break;
            case 'nextWeek':
                $date = Carbon::createFromTimestamp($request->selectedDay);
                $week = $this->getNextWeek($date);
                return Inertia::render('Dashboard', compact('week'));
                break;
            case 'reload':
                $date = Carbon::createFromDate($request->year, $request->month, 1);
                $miniCalendar = $this->calendar->getCalendar($date->timestamp);
                $week = $this->calendar->getWeek($request->weekTS);
                return Inertia::render('Dashboard', compact('miniCalendar', 'week'));
                break;
            case 'day':
                $miniCalendar = $this->calendar->getCalendar($request->timestamp);
                $week = $this->calendar->getWeek($request->timestamp);
                return Inertia::render('Dashboard', compact('miniCalendar', 'week'));
                break;
            case 'modalCalendar' :
                $modalCalendar = $this->calendar->getCalendar($request->selectedDay);
                return Inertia::render('Dashboard', compact('modalCalendar'));
            break;
                break;
            default:
                return redirect()->route('dashboard');
        }
        
        
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

    public function getPrevWeek($date)
    {
        $date->subWeek();
        $week = $this->calendar->getWeek($date->timestamp);

        return $week;
    }

    public function getNextWeek($date)
    {
        $date->addWeek();
        $week = $this->calendar->getWeek($date->timestamp);

        return $week;
    }
}
