<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountGroups extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    protected $table = 'account_groups';

    public function functions()
    {
        return $this->hasMany('App\Model\Roles', 'group_id', 'id');
    }
    public function accounts()
    {
        return $this->hasMany('App\Model\Accounts', 'group_id', 'id');
    }
    public static function roleGroups($field, $sort, $curentUser)
    {
        return self:: //where('id',  $curentUser->group_id)
            where('level', '>=', $curentUser->group->level)
            ->sort($field, $sort)
            ->paginate(20);
    }
    public static function options()
    {
        return self::where('hide', 0)
                ->where('status', 1)
                ->orderBy('parent_id', 'asc')
                ->get();
    }
}
