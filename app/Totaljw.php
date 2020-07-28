<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totaljw extends Model
{
    protected $fillable = ['totaljw'];

    public static function NewInc($value)
    {
        if (!empty(Totaljw::find(1))) {
            $newjw = Totaljw::find(1);
            $newjw->totaljw = (float)$newjw->totaljw + (float)$value;
            $newjw->save();
        } else {
            $newjw = new Totaljw();
            $newjw->totaljw = (float)$value;
            $newjw->save();
        }
    }

    public static function Newdec($jw)
    {
        if (!empty(Totaljw::find(1))) {
            $newjw = Totaljw::find(1);
            $newjw->totaljw = (float)$newjw->totaljw - (float)$jw;
            $newjw->save();
        } else {
            $newjw = new Totaljw();
            $newjw->totaljw = (float)0 - (float)$jw;
            $newjw->save();
        }
    }

    public static function ShowTotal()
    {
        if (Totaljw::find(1)) {
           return Totaljw::find(1)->totaljw;
        } else {
            return 0;
        }
    }
}
