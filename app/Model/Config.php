<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    use \App\Traits\FilterTrait;
    use \Dimsav\Translatable\Translatable;
    protected $likeFilterFields = ['content'];
    protected $table = 'configs';
    public $translatedAttributes = ['content'];
    public static function getByKey($key,$status = [1])
    {
        return self::where(['hide'=>0,'name'=>$key])->whereIn('status',$status)->first();
    }
}
