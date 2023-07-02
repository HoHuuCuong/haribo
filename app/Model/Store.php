<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    use \App\Traits\FilterTrait;
    use \Dimsav\Translatable\Translatable;
    protected $likeFilterFields = ['name'];
    protected $table = 'stores';
    public $translatedAttributes = ['name', 'address','open_times'];
    public static function options()
    {
        return self::where(['status'=>1,'hide'=>0])->orderBy('pos','ASC')->get();
    }
    public static function getForUserId($userId = 0)
    {
        $user = Accounts::find($userId);
        $userId = $user->id;
        $groupId = $user->group_id;
        $data = self:: //where('parent_id', $parentId)
            where('status', 1)
            ->where('hide', 0);
        if(!$user->root)
        {
            $data = $data->where('StoreID',$user->StoreID);
        }

        $data = $data->orderBy('pos', 'asc')
            ->get();
        return $data;
    }
    public function city()
    {
        return $this->hasOne('App\Model\City', 'id', 'city_id');
    }
    public function district()
    {
        return $this->hasOne('App\Model\District', 'id', 'district_id');
    }
}
