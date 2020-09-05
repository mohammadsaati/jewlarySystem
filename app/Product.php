<?php

namespace App;

use App\Http\Requests\Products\ProductsRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $fillable = ['weight', 'ayar', 'fi', 'price', 'type', 'product_info' , 'user_id'];

    function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function scopeFilters($query , $user_id)
    {
        if (!empty($filters))
        {
            if (!empty($filters['user_id']))
            {
                $query->where('user_id' , $filters['user_id']);
            }
        }    
    }

    public function addNewProduct(ProductsRequest $request)
    {
        $totaljw = 0;

        $this->type = $request->type;
        $this->weight = $request->weight;
        $this->price = $request->price;
        $this->fi = $request->fi;
        $this->ayar = $request->ayar;
        $this->product_info = $request->product_info;
        $this->user_id = $request->user_id;
        $this->save();
        $totaljw += (float)$request->weight;
        /*In react side we sould save : 
            1.  save total jw in local storage
            2. save products id in local storage to send in to invoice_product table
            session(['jw' => $totaljw]);
            session()->push('proIDs', $this->id);
        */


        Totaljw::Newdec($totaljw);
    }

    public function showfi($fi)
    {
        return $fi;
    }
}
