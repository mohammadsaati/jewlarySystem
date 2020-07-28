@extends('layouts.app')

@section('content')
    <div class="container box mt-4">
        <div class="row">
            
            <div class="col-12">
                <h2 class="text-right my-4">خریدار : {{ $customerName }}</h2>
            </div>
            <br />
            <div class="col-12">
                <p class="text-right text-success">قیمت قابل پرداخت : {{ $total }}</p>
            </div>
            <br />
            
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead class="bg-warning">
                        <tr>
                            <th class="text-center" scope="col">شرح کالا</th>
                            <th class="text-center" scope="col">قیمت</th>
                            <th class="text-center" scope="col">فی</th>
                            <th class="text-center" scope="col">عیار</th>
                            <th class="text-center" scope="col">وزن</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tempProducts as $tempProduct)
                        <tr>
                                <td class="text-center col-lg-6" scope="col">
                                    {{ $tempProduct->productInfo }}
                                </td>
                                <td class="text-center" scope="col">
                                    {{$tempProduct->price}}
                                </td>
                                <td class="text-center" scope="col">
                                    {{ $tempProduct->fi }} 
                                </td>
                                <td class="text-center" scope="col">
                                    {{ $tempProduct->ayar }}
                                </td>
                                <td class="text-center" scope="col">
                                   {{ $tempProduct->weight }} 
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
              <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" name="finance" value=true id="finance">
                    <label class="custom-control-label text-danger" for="finance">جز فاکتور های دارایی هست</label>
                  </div>
                
                
                <button type="submit" class="btn btn-success">
                    ثبت نهایی فاکتور
                </button>
                
            </form>
            <br />
            </div>
        </div>

    </div>
@endsection