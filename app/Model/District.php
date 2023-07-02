<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name'];
    public static function options($city_id=1)
    {
        return self::where(['status'=>1,'hide'=>0,'city_id'=>$city_id])->orderBy('pos','ASC')->orderBy('id','ASC')->get();
    }
}
