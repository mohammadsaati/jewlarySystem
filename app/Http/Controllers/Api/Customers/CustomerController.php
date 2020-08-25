<?php

namespace App\Http\Controllers\Api\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\Customers\CustomerRequest;
use App\Http\Resources\Customers\Customer as CustomerResource;
use Illuminate\Support\Arr;

class CustomerController extends Controller
{
    protected $filterable = ['userName' , 'user_id'];

    public function index(Request $request)
    {
        $filters = Arr::only($request->filters , $this->filterable);
        
        return CustomerResource::collection(Customer::filter($filters)->get());
    }
    public function store(CustomerRequest $request)
    {
       $customer = new Customer();
       $customer->addDate($request);
       return CustomerResource::make($customer);
    }

    public function show(Customer $customer)
    {
        return CustomerResource::make($customer);
    }

    public function update(Customer $customer , Request $request)
    {
       $isupdated = $customer->update(Arr::only($request->all() , $customer->getFillable()));

       if ($isupdated)
       {
            return response(
                'customer.update.succsfull',
            200);
       }
    }

    public function destroy(Customer $customer)
    {
        $isDeleted = $customer->delete();

        if ($isDeleted)
        {
            return response(
                'custommer.delete.successful',
            200);
        }
    }
}
