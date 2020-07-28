@if (count($tempProducts) !=0)
   <div class="row">
       <div class="col-lg-4 col-md-12 my-4">
          
          <a href="{{ route('payment.pay') }}" class="btn btn-outline-primary">
                تسویه حساب
          </a>

       </div>
       <div class="col-lg-5 col-md-12 my-4">
           <h2 class="text-right text-success">
               قیمت کل : {{ $totalPrice }}
            </h2>
        </div>
        <div class="col-lg-3 col-md-12">
            <small>
                <p class="text-right text-danger my-4">
                    مشتری : {{ $customerName }}
                </p>
            </small>
        </div>

   </div>
    @foreach ($tempProducts as $tempProduct)
      <div class="row box mb-4">
          <div class="col-lg-2 pt-1">
              <form method="POST" action="{{ route('product.deleteTemp' , ['temp'=> $tempProduct->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">
                    <i class="fas fa-trash-alt text-danger"></i>
                </button>

              </form>
          </div>
            <div class="col-lg-10 text-right pt-1">
                <p class="text-right">
                    {{ $tempProduct->productInfo }}
                    &nbsp;
                    با عیار {{ $tempProduct->ayar }}

                    &nbsp;
                    با قیمت {{ $tempProduct->price }}
                </p>
            </div>

      </div>
    @endforeach
@endif