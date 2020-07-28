<?php
namespace App\Traits;

use Morilog\Jalali\Jalalian;

trait SesstionTrait 
{
    public static function Forget()
    {
        session()->forget('InvoID');
        session()->forget('totalPrice');
        session()->forget('customerID');
    }

    public static function ForgetWithName($sessionName)
    {
        session()->forget($sessionName);
    }

    public static function SetTodayTotalPrice($totalPrice)
    {
        $todayTotal = 0;
        if (session()->exists('todayTotal')) {
            $todayTotal = (double)session()->get('todayTotal');
        }

        $todayTotal += $totalPrice;

        session(['todayTotal' => $todayTotal]);
    }

    public static function InvoiceIDSession()
    {
        return (int)session()->get('invoID')[0];
    }

    public static function TotalPriceSession()
    {
        return (double)session()->get('totalPrice');
    }

    public static function TodayDate()
    {
        $today = Jalalian::now();
        session(['todayY' => $today->getYear()]);
        session(['todayM' => $today->getMonth()]);
        session(['todayD' => $today->getDay()]);
    }

}

