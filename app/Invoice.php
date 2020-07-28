<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Invoice extends Model
{
    protected $fillable = ['customer_id' , 'finance'];


    function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function products()
    {
        return $this->belongsToMany(Product::class);
    }

    function payment()
    {
        return $this->hasOne(Payment::class);
    }
    function extraPays()
    {
        return $this->hasMany(Extrapay::class);
    }
    function cheques()
    {
        return $this->hasMany(cheque::class);
    }
    function jwpays()
    {
        return $this->hasMany(Jwpay::class);
    }

    public function addData(Request $request , $customerID)
    {
        $finance = "";
        if ($request->has('finance')) {
            $finance = true;
        } else {
            $finance = false;
        }
        
        $this->customer_id = $customerID;
        $this->finance = $finance;
        $this->user_id = auth()->id();
        $this->save();
        session()->push('invoID' , $this->id);
    }

}
