<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name'];
    public function districts()
    {
        return $this->hasMany('App\Model\District', 'city_id', 'id');
    }
    public static function options()
    {
        return self::where(['status'=>1,'hide'=>0])->orderBy('pos','ASC')->orderBy('id','ASC')->get();
    }
}
