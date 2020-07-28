@extends('layouts.app')

@section('content')
    <div class="container box mt-4 ">
        <div class="row">

            <div class="col-lg-12 my-4">
                <h2 class="text-center">لطفا مبلغ پرداخت شده را وارد کنید</h2>
            </div>
            <br />

            <div class="col-lg-12 mb-4">
                <form method="POST" action="{{ route('payment.extraPay' , ['invoice' => $invoiceID]) }}">
                    @csrf
                    <div class="form-row my-4">

                        <div class="col-lg-12 col-md-12 text-right">
                            <label for="payed"><p class="text-right">پول نقد</p></label>
                            <input type="text" id="payed" class="form-control" name="payed" />
                        </div>
                        <br />
                    </div>
                    <div class="form-row my-4">

                         <div class="col-lg-8 col-md-12 text-right">
                             <label for="payedCheque"><p class="text-right">مبلغ چک  </p></label>
                            <input type="text" id="payedCheque" class="form-control" name="payedCheque" />
                        </div>

                        <div class="col-lg-4 col-md-12 text-right">
                            <label for="dateCheque"><p class="text-right">تاریخ چک  </p></label>
                            <input type="text" id="dateCheque" class="form-control" name="dateCheque"  placeholder="فرمت درست : 1399/3/5" />
                         </div>
                         <br />
                    </div>
                    
                    <div class="form-row my-4">
                        <div class="col-lg-8 col-md-12 text-right">
                            <label for="payedJw"><p class="text-right">قیمت طلای داده شده </p></label>
                           <input type="text" id="payedJw" class="form-control" name="payedJw" />
                       </div>

                       <div class="col-lg-4 col-md-12 text-right">
                           <label for="jwWeight"><p class="text-right">وزن طلای داده شده </p></label>
                           <input type="text" id="jwWeight" class="form-control" name="jwWeight" />
                        </div>
                        <br />
                    </div>

                    <br />
                    <button type="submit" class="btn btn-success full-width">
                        پرداخت
                    </button>

                </form>
            </div>

        

        </div>
    </div>
@endsection