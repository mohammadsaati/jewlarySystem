<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class cheque extends Model
{
    protected $fillable = ['price', 'date', 'invoice_id'];

    function invoice()
    {
        
        return $this->belongsTo(Invoice::class);
    }
    public function getCreatedAtAttribute($value)
    {
        $both = explode(' ' , $value);
        $date = explode('-' , $both[0]);
        $jdate = CalendarUtils::toJalali((int)$date[0] , (int)$date[1] , (int)$date[2]);
        
        return $jdate[0]."/".$jdate[1]."/".$jdate[2];
    }

    public function addData(Request $request)
    {
        $payedCheque = (double)$request->payedCheque;
        $dateCheque = $request->dateCheque;


        $invoiceID = SessionsModel::InvoiceIDSession();
        $invoice = Invoice::find($invoiceID);

        $this->price = $payedCheque;
        $this->date = $dateCheque;
        $this->invoice_id = $invoice->id;
        $this->save();

        return $payedCheque;
    }

    public function scopeToday()
    {
        $cheques = array();
        $today = Jalalian::now();
        $all = $this->all();
        foreach ($all as $cheque) {
            $date = explode('/', $cheque->date);
        
            if ((int)$date[0] == $today->getYear() && (int)$date[1] == $today->getMonth() && (int)$date[2] == $today->getDay()) {
                array_push($cheques , $cheque);
            }
        }

        return $cheques;
    }
}
