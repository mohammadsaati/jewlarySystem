<?php

namespace App\Date;

use App\Invoice;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Jdate {

    public static function InvoiceDate(Invoice $invoice)
    {
        $gy = (int)$invoice->created_at->format('Y');
        $gm = (int)$invoice->created_at->format('m');
        $gd = (int)$invoice->created_at->format('d');
        return CalendarUtils::toJalali($gy,$gm,$gd);
    }
}