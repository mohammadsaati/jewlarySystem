<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Totalojw extends Model
{
    protected $fillable = ['totalojw'];

    public function increase(Request $request)
    {
        
        if (!empty($this->find(1))) {
            $oldjw = $this->find(1);
            $oldjw->totalojw = (double)$oldjw->totalojw + (double)$request->oldin;
            $oldjw->save();
        } else {
            $this->totalojw = (double)$request->oldin;
            $this->save();
        }
        
    }

    public function descrise(Request $request)
    {
        if (!empty($this->find(1))) {
            $oldjw = $this->find(1);
            $oldjw->totalojw = (double)$oldjw->totalojw - (double)$request->oldin;
            $oldjw->save();
        }
    }

    public static function ShowTotal()
    {
        if (Totalojw::find(1)) {
            return Totalojw::find(1)->totalojw;
        } else {
            return 0;
        }
    }
}
