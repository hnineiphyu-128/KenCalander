<?php

namespace Kennebula\Calendar;

use Carbon\Carbon;

class CalendarService
{
    public static function getcalendarjson($year_month, $employee=false, $timeTable=false)
    {
        $dates = [];
        if (preg_match("/^[0-9]{4}-[0-1][0-9]$/",$year_month) == 1) {
            if ((int)explode("-", $year_month)[1] > 13) {
                return $dates;
            }
            $year = Carbon::parse($year_month)->format('Y');
            $month = Carbon::parse($year_month)->format('m');
            if ($timeTable) {
                $timeTableMonth = $timeTable['month'];
                $timeTableYear = $timeTable['year'];
                $timeTableShift = $timeTable['first_shift_type'];
                $timeTableHoliday = $timeTable['holiday'];
            } else {
                $timeTableMonth = 0;
                $timeTableYear = 0;
                $timeTableShift = '-';
                $timeTableHoliday = "";
            }

            $firstday = date('w', strtotime($year."-".$month."-01"));
            $days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
            $loopCount = (int)$days + (int)$firstday;
            $dates = [];
            $temp = [];
            $j = 1;
            for ($i=0; $i < $loopCount; $i++) {
                if ($i < $firstday) {
                    array_push($temp, "0");
                }  else {
                    if ($month ==  $timeTableMonth && $year == $timeTableYear) {
                        if (count($dates)%2 == 0) {
                            $shift = $timeTableShift;
                        } else {
                            $shift = $timeTableShift == 'day_shift' ? 'night_shift' : 'day_shift';
                        }
                    } else {
                        $shift = "-";
                    }
                    if ($timeTableShift == 'no_shift') {
                        $shift = "-";
                    }
                    $holiday = explode(', ', $timeTableHoliday);
                    array_push($temp, [
                        'date' => (string)$j,
                        'day' => date('Y-m-d', strtotime($year."-".$month."-". $j)),
                        'shift' => $shift,
                        'close' => (new self())->check_date($timeTable, (string)date('Y-m-d', strtotime($year."-".$month."-". $j))) ? true : false,
                        'holiday' => in_array((string)date('Y-m-d', strtotime($year."-".$month."-". $j)), $holiday) ? true : false
                    ]);
                    $j += 1;
                }
                if (count($temp) == 7 || ($i+1 == $loopCount)) {
                    array_push($dates, $temp);
                    $temp = [];
                }
            }
        }

        // dd($dates);
        return $dates;
    }
    private function check_date($timeTable, $d)
    {
        if ($timeTable) {
            $close_dates = json_decode($timeTable['close_dates']);
            for ($i=0; $i < count($close_dates); $i++) {
                if (strcmp($close_dates[$i], $d) == 0) {
                    return true;
                }
            }
        } else {
            if (Carbon::parse($d)->format('l') == 'Saturday' || Carbon::parse($d)->format('l') == 'Sunday') {
                return true;
            }
        }
    }
}
