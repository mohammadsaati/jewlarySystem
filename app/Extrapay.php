<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class Extrapay extends Model
{
    protected $fillable = ['invoice_id', 'payed'];

    function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function addDate(Request $request)
    {
        $payed = (double)$request->payed;

        $invoiceID = SessionsModel::InvoiceIDSession();
        $invoice = Invoice::find($invoiceID);

        $this->payed = $payed;
        $this->invoice_id = $invoice->id;
        $this->save();

        return $payed;
    }

    public function getCreatedAtAttribute($value)
    {
        $both = explode(' ' , $value);
        $date = explode('-' , $both[0]);
        $jdate = CalendarUtils::toJalali((int)$date[0] , (int)$date[1] , (int)$date[2]);
        
        return $jdate[0]."/".$jdate[1]."/".$jdate[2];
    }
}
