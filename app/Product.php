<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $fillable = ['weight', 'ayar', 'fi', 'price', 'type', 'productInfo'];

    function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function add($tempData)
    {
        $totaljw = 0; 

        $this->type = $tempData->type;
        $this->weight = $tempData->weight;
        $this->price = $tempData->price;
        $this->fi = $tempData->fi;
        $this->ayar = $tempData->ayar;
        $this->productInfo = $tempData->productInfo;
        $this->save();
        $totaljw += (double)$tempData->weight;
        session(['jw' => $totaljw]);
        session()->push('proIDs', $this->id);

        Totaljw::Newdec($totaljw);
    }

    public function showfi($fi)
    {
       return $fi;
    }
}
