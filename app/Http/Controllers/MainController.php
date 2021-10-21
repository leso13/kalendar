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
        $categories = auth()->user()->categories;
        $selectedDay = '';
        !empty($request->selectedDay) 
            ?  ($selectedDay = $request->selectedDay ) 
            : ( $selectedDay = Carbon::today()->timestamp );

        return Inertia::render('Dashboard', compact('miniCalendar', 'selectedDay', 'categories'));
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
            case 'reload':
                $date = Carbon::createFromDate($request->year, $request->month, 1);
                $miniCalendar = $this->calendar->getCalendar($date->timestamp);
                return Inertia::render('Dashboard', compact('miniCalendar'));
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
}
