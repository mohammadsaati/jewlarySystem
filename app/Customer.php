<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Customer extends Model
{
    protected $fillable = ['userName', 'phoneNumber'];

    function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    function users()
    {
        return $this->hasMany(User::class);
    }

    public static function FindBySession()
    {
        if (session()->exists('customerID')) {
            return Customer::find(session()->get('customerID'))->userName;
        } else {
            return 'Session was not seted';
        }
    }

    function addDate(Request $request)
    {
        $isValid = $request->validate([
            'userName' => 'required|min:4',
            'phoneNumber' => 'required|min:11'
        ]);
        if ($isValid) {
            $this->userName = $request->userName;
            $this->phoneNumber = $request->phoneNumber;
            $this->user_id = auth()->id();
            $this->save();
        }
    }

    public function scopeUserCustomer($query)
    {
        return $query->where('user_id', auth()->id())->get();
    }

}
