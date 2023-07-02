<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Accounts extends Authenticatable
{
    use \Stevebauman\EloquentTable\TableTrait;
    use Notifiable;
    protected $guard = 'backend';
    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table = 'accounts';

    public function getGroupNameAttribute()
    {
        return $this->group->name;
    }
    public function denys()
    {
        return $this->hasMany('App\Model\AccountDenys', 'user_id', 'id');
    }
    public function logs()
    {
        return $this->hasMany('App\Model\Logs', 'user_id', 'id');
    }
    public function group()
    {
        return $this->hasOne('App\Model\AccountGroups', 'id', 'group_id');
    }

    public function getRootAttribute()
    {
        return $this->is_root == 1;
    }
    public static function roleUsers($field, $sort, $curentUser)
    {
        return self::where('id', '!=', $curentUser->id)
            ->where('is_root', '!=', '1')
            ->where('hide', 0)
            ->where('status', 1)
            ->where('is_root', '!=', '1')
            ->where('level', '>=', $curentUser->level)
            ->sort($field, $sort)
            ->paginate(20);
    }
}
