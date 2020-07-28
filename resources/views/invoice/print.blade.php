<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <title>چاپ فاکتور</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-12 box-print mt-4">
                
              <div class="border-f">
                  <h3 class="text-center invoice-f">به نام خدا</h3>
                  <div class="row">
                    <div class="col-4">
                        <p class="text-right invoice-f" style="font-size: 25px">
                            <b>
                                شماره : 00272
                            </b>
                        </p>
                        <p class="text-right invoice-f" style="font-size: 25px">
                            <b>
                                09144116115
                            </b>
                        </p>
                        <p class="text-right invoice-f" style="font-size: 25px">
                            <b>
                                32443552
                            </b>
                        </p>
                        <p class="text-right invoice-f" style="font-size: 25px">
                            <b>
                                تاریخ : 
                                {{ $date[0] }}/{{ $date[1] }}/{{ $date[2] }}
                            </b>
                        </p>
                        <p class="text-right invoice-f" style="font-size: 25px">
                            <b>
                                قیمت طلای روز(فی) : 
                                {{ $invoice->products[0]->fi }}
                            </b>
                        </p>
                    </div>
                    <div class="col-8">
                        <b>
                            <h2 class="text-right invoice-f" style="font-size: 51px;">زرگری ساعتی</h2>
                        </b>
                        <br/>
                        <p class="text-right invoice-f">
                            <b>
                                فروشنده بهترین طلاجات استاندارد 18 عیار
                            </b>
                        </p>
                        <p class="text-right invoice-f">
                            <b>
                                خسروشاه - بازار بزرگ فرج - طبقه همکف - پلاک 30
                            </b>
                        </p>
                        <p class="text-right invoice-f" style="font-size: 22px">
                                <b>
                                    خریدار : {{ $invoice->customer->userName}}
                                </b>
                        </p>
                    </div>
                  </div>
              </div>
                <br/>
                
                    <table class="table t-border invoice-f " style="font-size: 20px">
                        <thead class="bg-light t-border">
                            <tr class="t-border text-dark" style="background-color: #bfbfbf ">
                                <th class="text-center t-border" scope="col">قیمت</th>
                                <th class="text-center t-border" scope="col">عیار</th>
                                <th class="text-center t-border" scope="col">وزن</th>
                                <th class="text-center t-border" scope="col">شرح کالا</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->products as $product)
                            <tr class="t-border t-border">
                                   
                                    <td class="text-right t-border" dir="rtl" scope="col">
                                        {{$product->price}}
                                        تومان
                                    </td>
                                    <td class="text-center t-border" scope="col">
                                        {{ $product->ayar }}
                                    </td>
                                    <td class="text-center t-border" dir="rtl" scope="col">
                                    {{ $product->weight }} 
                                    گرم
                                    </td>
                                    <td class="text-center col-lg-6" scope="col">
                                        {{ $product->productInfo }}
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>


                    <table class="table t-border invoice-f " style="font-size: 20px">
                        <thead class="bg-light t-border">
                            <tr class="t-border text-dark" style="background-color: #bfbfbf ">
                                <th class="text-center t-border" scope="col">تاریخ</th>
                                <th class="text-center t-border" scope="col">مبالغ داده شده</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->extrapays as $extrapay)
                                <tr class="t-border t-border">
                                    <td  class="text-center t-border" scope="col">{{ $extrapay->created_at }}&nbsp;</td>
                                    <td class="text-right col-lg-6" dir="rtl" scope="col">
                                        {{ $extrapay->payed }}&nbsp;هزار توامان
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($invoice->cheques as $cheque)
                                <tr class="t-border t-border">
                                    <td  class="text-center t-border" scope="col">{{ $cheque->created_at }}</td>
                                    <td class="text-right col-lg-6" dir="rtl" scope="col">
                                        چک
                                        {{ $cheque->price }}&nbsp;هزار توامان
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        به تاریخ 
                                        {{ $cheque->date }}
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($invoice->jwpays as $jw)
                                <tr class="t-border t-border">
                                    <td  class="text-center t-border" scope="col">{{ $jw->created_at }}&nbsp;</td>
                                    <td class="text-right col-lg-6" dir="rtl" scope="col">
                                        طلا
                                        {{ $jw->weight }}&nbsp;گرم
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        به قیمت
                                        {{ $jw->price }}&nbsp;تومان
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                <div class="border-f">
                    <br/>
                    <p class="text-right invoice-f" style="font-size: 22px">
                        <b>مبلغ کل  فاکتو</b> : {{ $invoice->payment->totalPrice }}تومان
                    </p>
                </div>
            </div>
        </div>
    </div>


    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ef781c658e.js"></script>    
</body>
</html>