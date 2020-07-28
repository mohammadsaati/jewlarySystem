<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Temp extends Model
{
    protected $fillable = ['price', 'ayar', 'fi', 'weight', 'productInfo', 'type'];

    public static function CalculateTotalPrice()
    {
        $tempProducts = Temp::all()->sortDesc();
        $total = 0;
        foreach ($tempProducts as $tempProduct) {
            $total += (int)$tempProduct->price;
        }

        return $total;
    }
    
    public function addData(Request $request)
    {
        $validation = $request->validate([
            'weight' => 'required',
            'ayar' => 'required',
            'fi' => 'required',
            'price' => 'required',
            'productInfo' => 'required',
            'type'=> 'required'
        ]);
        
        if ($validation && $request->customer != '...') {
            if (!session()->exists('customerID')) {
                session(['customerID' => $request->customer]);
            }
    
            $this->weight = $request->weight;
            $this->ayar = $request->ayar;
            $this->fi = $request->fi;
            $this->price = $request->price;
            $this->productInfo = $request->productInfo;
            $this->type = $request->type;
            $this->save();
        }
    }
}
