@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        @include('jewlary.new' , ['totaljw' => $totaljw])
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        @include('jewlary.old' , ['totalojw' => $totalojw])
    </div>
    <br/>
    @if ($errors->any())

        <div class="alert alert-danger text-right" role="alert">
            لطفا تمامی فیلد ها را پر کنید
        </div>
    @endif
    <br />
    <div class="row" style="padding: 1rem">
      <div class="col-lg-4 col-md-12">
            {{-- news user --}}
            @include('user.create')
            @include('homeBtn.btn')
      </div>

      <div class="col-lg-8 col-md-12">
            @include('homeBtn.invoiceSearch')
      </div>

    </div>
    <br /><br />
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-right">فاکتور جدید</h2>
            <hr class="my-4" />
            
            {{-- new invoice --}}
            @include('invoice.create' , ['customers' => $customers])
        </div>
        @if ($customerName)
        <div class="col-12">
            <br/>
            @include('products.temp' , [
                'tempProducts' => $tempProducts  ,
                'totalPrice' => $totalPrice ,
                'customerName' => $customerName
                ])
        </div>
        @endif
    </div>
</div>
@endsection
