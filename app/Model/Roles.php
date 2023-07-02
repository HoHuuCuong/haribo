<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Roles extends Model
{
    protected $table = 'roles';
    public static function setDefault($idFuncs)
    {
        if ($idFuncs) {
            foreach ($idFuncs as $fid) {
                self::insert([
                    'function_id' => $fid,
                    'group_id' => 1
                ]);
            }
        }
    }
    public static function check($route)
    {
		//dd($route);
        $user = Auth::guard('backend')->user();
        $userId = $user->id;
        $groupId = $user->group_id;
        $func = Functions::where('route_name', $route)->first();
        if (config('app.roles') || $user->root || ($func && $func->allow == 1))
            return true;
        if ($func) {
            $data = self::where('function_id', $func->id)
                ->where('group_id', $groupId)
                ->first();
            $deny = AccountDenys::where('function_id', $func->id)
                ->where('group_id', $groupId)
                ->where('user_id', $userId)
                ->first();
            if ($data && !$deny)
                return true;
            else
                return false;
        } else{
            return false;
		}
    }
    public static function checked($funcId, $userId = 0, $groupId = 0)
    {

        if ($userId) {
            $user = Accounts::find($userId);
            $userId = $user->id;
            $groupId = $user->group_id;
        } else {
            $group = AccountGroups::find($groupId);
            $groupId = $group->id;
        }
        $data = self::where('function_id', $funcId)
            ->where('group_id', $groupId)
            ->first();

        if ($userId) {
            $deny = AccountDenys::where('function_id', $funcId)
                ->where('group_id', $groupId)
                ->where('user_id', $userId)
                ->first();
            if ($data && !$deny)
                return true;
            else
                return false;
        }
        if ($data)
            return true;
        else
            return false;
    }
    public static function getByGroupId($groupId = 0)
    {
        $user = AccountGroups::find($groupId);
        $groupId = $user->group_id;
        $data = self::where('group_id', $groupId)
            ->get();
        return $data;
    }
    public static function grant($funcs, $groupId)
    {
        $group = AccountGroups::find($groupId);
        if ($group->count()) {
            $groupId = $group->id;
            self::where('group_id', $groupId)->delete();
            $data = [];
            foreach ($funcs as $func) {
                $data[] = [
                    'function_id' => $func,
                    'group_id' => $groupId,
                ];
            }
            self::insert($data);
            return true;
        } else
            return false;
    }
}
