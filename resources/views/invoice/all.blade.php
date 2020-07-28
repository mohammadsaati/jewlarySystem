@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('invoice.search')
            </div>
            <br />
            <div class="col-12 my-4">
                <a href="{{ route('invoice.finance') }}" class="btn btn-warning">
                    نمایش همه ی فاکتور های دارایی
                </a>
            </div>
        </div>
        <br />
        <div class="row">
            @foreach ($invoices as $invoice)
                <div class="col-12 mb-4">
                    <ul class="list-group">
                        <li class="list-group-item bg-sp">
                            <div class="row">
                                <div class="col-2">
                                    <a href="{{ route('invoice.print' , ['invoice' => $invoice->id]) }}" class="btn btn-light">
                                        چاپ
                                    </a>
                                </div>
                                <div class="col-3">
                                    <p class="text-red">
                                        <b class="text-dark">بدهکار : </b> 
                                       @if ($invoice->payment->left == 0)
                                        {{ $invoice->payment->left }}
                                        @else
                                        <a href="{{ route('payment.extraShow' , ['invoice' => $invoice->id]) }}" class="btn btn-danger bg-red">
                                            <small>
                                                پرداخت
                                                {{ $invoice->payment->left }}
                                            </small>    
                                        </a>
                                       @endif
                                    </p>    
                                </div>
                                <div class="col-3">
                                    <p class="text-success">
                                        <b class="text-dark">تسویه شده : </b> {{ $invoice->payment->payed }}
                                    </b>
                                </div>
                                <div class="col-3">
                                    <p class="text-dark">
                                        کل مبلغ فاکتور : {{ $invoice->payment->totalPrice }}
                                    </p>
                                </div>
                                <div class="col-1">
                                    <a href="{{ route('invoice.user' , ['user' =>$invoice->customer->id ]) }}"  class="btn btn-warning text-center" style="font-size: 13px">
                                        {{ $invoice->customer->userName}}
                                    </a>
                                </div>
                            </div>
                        </li>
                        @foreach ($invoice->products as $product)
                            <li class="list-group-item">
                                <p class="text-right">
                                    {{ $product->type }}
                                    به وزن
                                    {{ $product->weight }}
                                    و با عیار
                                    {{ $product->ayar }}
                                    وفی
                                    {{ $product->fi }}
                                    با توضیحات
                                    {{ $product->productInfo }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection