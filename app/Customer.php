<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\Customers\CustomerRequest;


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

    function addDate(CustomerRequest $request)
    {
    
        $this->userName = $request->userName;
        $this->phoneNumber = $request->phoneNumber;
        $this->user_id = $request->auth_id;
        $this->save();
    }

    public function scopeFilter($query , $filters)
    {
        if (!empty($filters))
        {
            if (!empty($filters['userName']))
            {
                $query->where('userName' , $filters['userName']);
            }
            if ($filters['user_id'])
            {
                 $query->where('user_id' , $filters['user_id']);
            }
        }
    }
}
