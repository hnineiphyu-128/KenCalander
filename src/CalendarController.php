<?php

namespace Ken\Calendar;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CalendarController extends Controller
{
    //
    public function getcalender($year_month){
        $dates = CalendarService::getcalendarjson($year_month);
        $month_year = Carbon::parse($year_month)->format('M-Y');
        // return $dates;
    	return view('calendar::show', compact('dates', 'month_year'));
    }
}
