<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['totalPrice' , 'payed' , 'left' , 'invoice_id'];

    function invoices()
    {
        return $this->hasOne(Invoice::class);
    }

    public function addData($totla , $payed , $left)
    {
        $invoiceID = SessionsModel::InvoiceIDSession();

        $this->totalPrice = $totla;
        $this->payed = $payed;
        $this->left = $left;
        $this->invoice_id = $invoiceID;
        $this->save();
    }

    public function updateData($payed , $left)
    {
        $this->payed = $payed;
        $this->left = $left;
        $this->save();
    }
}
