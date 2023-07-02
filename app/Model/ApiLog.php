<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    protected $table = 'api_logs';
    use \Stevebauman\EloquentTable\TableTrait;
    use \App\Traits\FilterTrait;
    protected $likeFilterFields = ['api','body','rpbody','msg'];
    public static function write($api,$body,$rpbody,$api_status,$msg,$status,$actor,$uid)
    {
        self::insert([
            'actor'=>$actor,
            'api'=>$api,
            'body'=>$body,
            'api_status'=>$api_status,
            'msg'=>$msg,
            'status'=>$status,
            'userid'=>$uid,
            'rpbody'=>$rpbody
        ]);
    }
}
