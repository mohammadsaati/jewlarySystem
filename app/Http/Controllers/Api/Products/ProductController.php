<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductsRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Products\product as productResource;
use App\Product;
use App\Temp;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    protected $filterable = ['user_id'];

    public function index(Request $request)
    {
        if ($request->has('filters'))
        {
            $filters = Arr::only($request->filters , $this->filterable);
            $r = Product::query()->filters($filters)->get();
            return productResource::collection($r);
        }
    }
    
    public function store(ProductsRequest $request)
    {
        $product = new Product();
        $product->addNewProduct($request);
        
        return productResource::make($product);
    }

    public function update(Product $product , Request $request)
    {
        $response = Gate::allows('update' , $product);

        if ($response)
        {
            $product->update(Arr::only($request->all() , $product->getFillable()));

            return productResource::make($product);
        }
        return response([
            'message' => 'This products is not you product' , 
            'code' => '400'
        ],500);
    }

    public function destroy(Product $product)
    {
        $response = Gate::allows('delete' , $product);

        if ($response)
        {
            $product->delete();
            return response(
                ['message'=>'product.delete.successful']
                ,200);
        }
        return response([
            'message' => 'This products is not you product' , 
            'code' => '400'
        ],500);
    }
}
