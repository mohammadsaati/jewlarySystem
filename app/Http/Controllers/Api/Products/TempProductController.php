<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\TempProductRequest;
use App\Http\Requests\Products\UpdateTemRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Products\TempProduct as TempProductResource;
use App\Temp;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TempProductController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->has('user_id'))
        {
            return response(
                'user id does not exist pleate enter user id',
            500);
        }

        $users_temp_products = Temp::filter($request->input('user_id'))->get();

        return TempProductResource::collection($users_temp_products);
    }

    public function store(TempProductRequest $request)
    {
       if(!$request->validated())
       {
           return response(
               'no valid',
           500);
       }
        $temp = new Temp();
        $temp->addData($request);

        return TempProductResource::make($temp);
    }

    public function destroy(Temp $temp)
    {
        $isDeleted =  $temp->delete();
        if ($isDeleted)
        {
            return response(
                'temp.product.deleted',
            200);
        }
    }

    public function update(Temp $temp , UpdateTemRequest $request)
    {
        $updated = $temp->update(Arr::only($request->all() , $temp->getFillable()));

        if ($updated)
        {
            return response([
                'message' => 'temp.products.updated',
                'data' => TempProductResource::make($temp)
            ],   
            200);
        }
    }

    public function deleteAll(Request $request)
    {
        Temp::filter($request->input('user_id'))->delete();
        return response(
            'all temp products deleted',
        200);
    }
}
