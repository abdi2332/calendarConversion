<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ConversionController extends Controller
{
    
    public function gregorianToEthiopian(Request $request)
    {
        $date = $request->input('date');
        $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
        $ethiopianDate = $this->gregorianToEthiopianCalendar($carbonDate);
        return response()->json(['ethiopian_date' => $ethiopianDate]);
    }

  
    public function ethiopianToGregorian(Request $request)
    {
        $date = $request->input('date');
        $ethiopianDate = explode('-', $date);
        $gregorianDate = $this->ethiopianToGregorianCalendar($ethiopianDate[0], $ethiopianDate[1], $ethiopianDate[2]);
        return response()->json(['gregorian_date' => $gregorianDate->format('Y-m-d')]);
    }

    
    public function etbToUsd(Request $request)
    {
        $amount = $request->input('amount');
        $rate = 0.02; 
        $usdAmount = $amount * $rate;
        return response()->json(['usd_amount' => $usdAmount]);
    }

   
    public function usdToEtb(Request $request)
    {
        $amount = $request->input('amount');
        $rate = 50.0; 
        $etbAmount = $amount * $rate;
        return response()->json(['etb_amount' => $etbAmount]);
    }

    
    private function gregorianToEthiopianCalendar(Carbon $date)
    {
        
        $year = $date->year - 8;
        $month = $date->month;
        $day = $date->day;

        return "$year-$month-$day";
    }

    private function ethiopianToGregorianCalendar($year, $month, $day)
    {
      
        return Carbon::create($year + 8, $month, $day);
    }
}
