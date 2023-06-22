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
        if (preg_match("/^[0-9]{4}-[0-1][0-9]$/",$year_month) == 0) {
            return "Year and month format error!";
        }        
        if ((int)explode("-", $year_month)[1] > 13) {
            return "Your month must be under 12!";
        }
        $dates = CalendarService::getcalendarjson($year_month);
        $month_year = Carbon::parse($year_month)->format('M-Y');
        // return $dates;
    	return view('calendar::show', compact('dates', 'month_year'));
    }
}
