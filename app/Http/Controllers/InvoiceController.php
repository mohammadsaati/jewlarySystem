<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Date\Jdate;
use App\Invoice;
use App\SessionsModel;
use App\Temp;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class InvoiceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all()->sortDesc();
        /*
        foreach($invoices as $invoice) {
            dd($invoice->payment);
        }
        */
        return view('invoice.all')->with('invoices', $invoices);
    }

    function print(Invoice $invoice)
    {
        $date = Jdate::InvoiceDate($invoice);      

        return view('invoice.print')
            ->with('invoice', $invoice)
            ->with('date' , $date);
    }

    function search(Request $request)
    {
        $isvalid = $request->validate([
            'search' => 'required|min:3'
        ]);

        if ($isvalid) {
            $user = Customer::whereUsername($request->search)->first();

            if ($user) {
                return view('invoice.all')->with('invoices', $user->invoices);
            } else {
                return back();
            }
        }
    }
    function finance()
    {
        $invoices = Invoice::whereFinance(true)->get()->sortDesc();

        return view('invoice.all')->with('invoices', $invoices);
    }
    function userInvoice(Customer $user)
    {
        return view('invoice.all')->with('invoices', $user->invoices);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function storeTemprary(Request $request)
    {
        $temp = new Temp();
        $temp->addData($request);
        return redirect()->back();
    }

    public function deleteTemprary(Temp $temp)
    {
        $temp->delete();
        SessionsModel::ForgetWithName('customerID');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
