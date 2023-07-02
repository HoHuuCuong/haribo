<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountDenys extends Model
{
    protected $table = 'account_denys';
    public static function deny($funcs, $userId)
    {
        $user = Accounts::find($userId);
        if ($user->count()) {
            $userId = $user->id;
            $groupId = $user->group_id;
            self::where('user_id', $userId)->delete();
            $denyFuncs = Roles::where('group_id', $groupId)
                ->whereNotIn(
                    'function_id',
                    $funcs
                )->get();
            if ($denyFuncs) {
                foreach ($denyFuncs  as $func) {
                    self::insert([
                        'function_id' => $func->function_id,
                        'user_id' => $userId,
                        'group_id' => $groupId,
                    ]);
                }
            }
            return true;
        } else
            return false;
    }
}