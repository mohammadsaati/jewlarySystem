<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\Temp;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');   
    }
    function store(Request $request)
    {
        
        $tempDatas = Temp::all();
       
        $customerID = session()->get('customerID');
        session()->forget('proIDs');
        session()->forget('invoID');
        //dd(session()->get('invoID'));

        
        foreach ($tempDatas as $tempData) {
            $product = new Product();
            $product->add($tempData);
        }


        $invoice = new Invoice();
        $invoice->addData($request , $customerID);
        
        $productIds = session()->get('proIDs');

        foreach ($productIds as $productId) {
            $product = Product::find($productId);
            $invo = Invoice::find(session()->get('invoID'));
            $product->invoices()->attach($invo);
        }

        session()->forget('jw');
        session()->forget('proIDs');



        return view('payment.create')
                ->with('totalPrice' , session()->get('totalPrice'));
    }

}
