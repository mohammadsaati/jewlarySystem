<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class Jwpay extends Model
{
    protected $fillable = ['price' , 'weight' , 'invoice_id'];

    function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function addData(Request $request)
    {
        $payedJw = (double) $request->payedJw;
        $jwWeight = $request->jwWeight;

        $invoiceID = SessionsModel::InvoiceIDSession();
        $invoice = Invoice::find($invoiceID);

        $this->price = $payedJw;
        $this->weight = $jwWeight;
        $this->invoice_id = $invoice->id;
        $this->save();

        return $payedJw;
    }
    
    public function getCreatedAtAttribute($value)
    {
        $both = explode(' ' , $value);
        $date = explode('-' , $both[0]);
        $jdate = CalendarUtils::toJalali((int)$date[0] , (int)$date[1] , (int)$date[2]);
        
        return $jdate[0]."/".$jdate[1]."/".$jdate[2];
    }
}
