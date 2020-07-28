<form method="POST" action="{{ route('product.temp') }}">
    @csrf
    <div class="form-row">
        
        <div class="col-lg-4 col-md-12">
            <select name="type" class="form-control text-right">
                <option value="طلا">{{ __('طلا') }}</option>
                <option value="طلای آب شده">طلای آب شده</option>
                <option value="طلای دست دوم">طلای دست دوم</option>
            </select>
        </div>

        <div class="col-lg-4 col-md-12">
          <select name="customer" class="form-control text-right">
                <option value="0">...</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->userName }}</option>
                @endforeach
          </select>
        </div>

    </div>

    <br />
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
            <tr>
                <td class="text-center col-lg-6" scope="col">
                    <input type="text" class="form-control text-right" name="productInfo" /> 
                </td>
                <td class="text-center" scope="col">
                    <input type="text" class="form-control text-right" name="price" /> 
                </td>
                <td class="text-center" scope="col">
                    <input type="text" class="form-control text-right" name="fi" /> 
                </td>
                <td class="text-center" scope="col">
                    <input type="text" class="form-control text-right" name="ayar" /> 
                </td>
                <td class="text-center" scope="col">
                    <input type="text" class="form-control text-right" name="weight"/> 
                </td>
            </tr>
        </tbody>
   </table>
 <input type="submit" class="btn btn-warning" value="ذخیره موقت" />
</form>