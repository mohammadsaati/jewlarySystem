<?php

namespace App;

use App\Http\Requests\Products\TempProductRequest;
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

    public function scopeFilter($query, $user_id)
    {
        $query->where('user_id', $user_id);
    }

    public function addData(TempProductRequest $request)
    {

        $this->weight = $request->weight;
        $this->ayar = $request->ayar;
        $this->fi = $request->fi;
        $this->price = $request->price;
        $this->product_info = $request->product_info;
        $this->type = $request->type;
        $this->user_id = $request->user_id;
        $this->save();
    }
}
