<?php

namespace App\Http\Controllers;

use App\cheque;
use App\Customer;
use App\Extrapay;
use App\Invoice;
use App\Jwpay;
use App\Payment;
use App\Sessions;
use App\SessionsModel;
use App\Temp;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $tempProducts = Temp::all()->sortDesc();

  
        $total = Temp::CalculateTotalPrice();

        $customerName = Customer::FindBySession();

        return view('payment.show')
            ->with('tempProducts', $tempProducts)
            ->with('total', $total)
            ->with('customerName', $customerName);
    }

    function store(Request $request)
    {
        $pay = 0;

        $totalPrice = SessionsModel::TotalPriceSession();

        /*
            We're gonna check if customer give mony,cheque or jwlary
            each class will be initioalis whene ever the input is not null
        */
        if ($request->payed != null) {
            $extraPay = new Extrapay();
            (float)$pay += (float)$extraPay->addDate($request);
        }
        if ($request->payedCheque != null) {
            $cheque = new cheque();
            (float)$pay += (float)$cheque->addData($request);
        }

        if ($request->payedJw != null) {
            $jwpay = new Jwpay();
            (float)$pay += (float)$jwpay->addData($request);
        }

        //Finally we should update our payment to show left of the money for user

        $left = (float)$totalPrice - (float)$pay;
        $payment = new Payment();
        $payment->addData($totalPrice, $pay, $left);


        SessionsModel::SetTodayTotalPrice($totalPrice);
        SessionsModel::Forget();

        // Delete all the temprary table information
        Temp::truncate();

        return redirect()->route('home');
    }

    function extraShow(Invoice $invoice)
    {
        return view('payment.extra')->with('invoiceID', $invoice->id);
    }

    function extraPay(Invoice $invoice, Request $request)
    {
        $payment = Payment::find($invoice->payment->id);
        // Request variables
        $pay = 0;

        /*
            We're gonna check if customer give mony,cheque or jwlary
            each class will be initioalis whene ever the input is not null
        */
        if ($request->payed != null) {
            $extraPay = new Extrapay();
            (float)$pay += (float)$extraPay->addDate($request);
        }
        if ($request->payedCheque != null) {
            $cheque = new cheque();
            (float)$pay += (float)$cheque->addData($request);
        }

        if ($request->payedJw != null) {
            $jwpay = new Jwpay();
            (float)$pay += (float)$jwpay->addData($request);
        }

        //Finally we should update our payment to show left of the money for user

        $payment->updateData((float)$payment->payed + $pay, $payment->totalPrice - $payment->payed);
        // $payment->payed =  (double)$payment->payed + $pay;
        // $payment->left = $payment->totalPrice - $payment->payed;
        // $payment->save();



        return redirect()->route('invoice.index');
    }
}
