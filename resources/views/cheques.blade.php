@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($cheques as $cheque)
                <div class="alert alert-info my-4 text-right" role="alert">
                    چک 
                    <b class="text-danger">
                        {{ $cheque->invoice->customer->userName}}
                    </b>
                    به مبلغ
                    <b class="text-danger">
                        {{ $cheque->price}}
                    </b>
                    هزار تومان
                  </div>
                @endforeach
            </div>
        </div>
   </div>
@endsection