<?php

namespace App\Http\Controllers;

use App\cheque;
use App\Customer;
use App\SessionsModel;
use App\Temp;
use App\Totaljw;
use App\Totalojw;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('mainPage');
    }

    public function mainPage()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //Todays Date
       SessionsModel::TodayDate();

       $customers = Customer::userCustomer();
        $tempProducts = Temp::all()->sortDesc();

        $totaljw = Totaljw::ShowTotal();
        $totalojw = Totalojw::ShowTotal();
        

        $total = Temp::CalculateTotalPrice();

        session(['totalPrice' => $total]);
        //session()->forget('customerID');
        //session(['customerID' => "1"]);

        $customerName = Customer::FindBySession();

        return view('home')
            ->with('customers', $customers)
            ->with('tempProducts', $tempProducts)
            ->with('totalPrice', $total)
            ->with('customerName', $customerName)
            ->with('totaljw', $totaljw)
            ->with('totalojw', $totalojw);
    }
    public function todayCheques()
    {
        $cheques =  cheque::today();
        return view('cheques')->with('cheques', $cheques);
    }
}
