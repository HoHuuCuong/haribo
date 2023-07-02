<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Model\Roles;
use App\Model\AccountDenys;
use App\Model\Accounts;

class Functions extends Model
{
    protected $table = 'functions';
    public static function makeDefault()
    {
        //Build default menu function
        $idFuncs = [];
        $idFuncs[] = self::insertGetId([
            'icon' => 'fa fa-home',
            'name' => 'backend.function.dashboard',
            'route_name' => 'b.home',
            'alias' => '/',
            'uri' => '/',
            'namespace' => 'Backend',
            'controller' => 'DashboardController',
            'action' => 'index',
            'parent_id' => 0,
            'level' => 0,
            'position' => 1,
            'allow' => 1
        ]);
        $userId = self::insertGetId([
            'icon' => 'fas fa-users',
            'name' => 'backend.function.user',
            'route_name' => '',
            'alias' => '',
            'uri' => '',
            'namespace' => '',
            'controller' => '',
            'action' => '',
            'parent_id' => 0,
            'level' => 0,
            'position' => 2,
            'allow' => 0
        ]);
        $idFuncs[] = $userId;
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-user',
            'name' => 'backend.function.user.list',
            'route_name' => 'b.account.list',
            'alias' => 'account',
            'uri' => 'account',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'index',
            'parent_id' =>  $userId,
            'level' => 1,
            'position' => 1,
            'allow' => 0
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-user-plus',
            'name' => 'backend.function.user.add',
            'route_name' => 'b.account.add',
            'alias' => 'account/create',
            'uri' => 'account/create',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'create',
            'parent_id' =>  $userId,
            'level' => 1,
            'position' => 2,
            'allow' => 0
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-edit',
            'name' => 'backend.function.user.edit',
            'route_name' => 'b.account.edit',
            'alias' => 'account/edit',
            'uri' => 'account/edit',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'edit',
            'parent_id' =>  $userId,
            'level' => 1,
            'position' => 2,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-user-times',
            'name' => 'backend.function.user.del',
            'route_name' => 'b.account.del',
            'alias' => 'account/delete',
            'uri' => 'account/delete',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'delete',
            'parent_id' =>  $userId,
            'level' => 1,
            'position' => 3,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[] = $profileId = self::insertGetId([
            'icon' => 'fas fa-user-md',
            'name' => 'backend.function.profile',
            'route_name' => 'b.account.profile',
            'alias' => 'profile',
            'uri' => 'profile',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'profile',
            'parent_id' =>  $userId,
            'level' => 1,
            'position' => 4,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-save',
            'name' => 'backend.function.profile',
            'route_name' => 'b.account.profilepost',
            'alias' => 'profile',
            'uri' => 'profile',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'profilePost',
            'parent_id' =>  $profileId,
            'level' => 1,
            'position' => 1,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[] = $changePassId = self::insertGetId([
            'icon' => 'fas fa-key',
            'name' => 'backend.function.changepass',
            'route_name' => 'b.account.changepass',
            'alias' => 'change-pass',
            'uri' => 'change-pass',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'changepass',
            'parent_id' =>  $userId,
            'level' => 1,
            'position' => 5,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-save',
            'name' => 'backend.function.changepass',
            'route_name' => 'b.account.changepasspost',
            'alias' => 'change-pass',
            'uri' => 'change-pass',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'changePassPost',
            'parent_id' =>  $changePassId,
            'level' => 2,
            'position' => 1,
            'allow' => 1,
            'display' => 0
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-power-off',
            'name' => 'backend.function.logout',
            'route_name' => 'b.account.logout',
            'alias' => 'logout',
            'uri' => 'logout',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountController',
            'action' => 'logout',
            'parent_id' =>  $userId,
            'level' => 1,
            'position' => 5,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[] = $groupId = self::insertGetId([
            'icon' => 'fas fa-user-friends',
            'name' => 'backend.function.user.group',
            'route_name' => 'b.account.group',
            'alias' => 'account-group',
            'uri' => 'account-group',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountGroupController',
            'action' => 'index',
            'parent_id' =>  $userId,
            'level' => 1,
            'position' => 3,
            'allow' => 0,
            'display' => 1
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-plus',
            'name' => 'backend.function.user.group.add',
            'route_name' => 'b.account.group.add',
            'alias' => 'account-group/create',
            'uri' => 'account-group/create',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountGroupController',
            'action' => 'create',
            'parent_id' =>  $groupId,
            'level' => 2,
            'position' => 1,
            'allow' => 0,
            'display' => 1
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-edit',
            'name' => 'backend.function.user.group.edit',
            'route_name' => 'b.account.group.edit',
            'alias' => 'account-group/edit',
            'uri' => 'account-group/edit',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountGroupController',
            'action' => 'edit',
            'parent_id' =>  $groupId,
            'level' => 2,
            'position' => 2,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-times',
            'name' => 'backend.function.user.group.del',
            'route_name' => 'b.account.group.del',
            'alias' => 'account-group/delete',
            'uri' => 'account-group/delete',
            'namespace' => 'Backend\Auth',
            'controller' => 'AccountGroupController',
            'action' => 'destroy',
            'parent_id' =>  $groupId,
            'level' => 2,
            'position' => 3,
            'allow' => 0,
            'display' => 0
        ]);
        $systemId = self::insertGetId([
            'icon' => 'fas fa-cogs',
            'name' => 'backend.function.system',
            'route_name' => '',
            'alias' => '#',
            'uri' => '#',
            'namespace' => 'Backend',
            'controller' => '',
            'action' => '',
            'parent_id' => 0,
            'level' => 0,
            'position' => 4,
            'allow' => 0
        ]);
        $idFuncs[] = $systemId;
        $idFuncs[] = self::insertGetId([
            'icon' => 'fas fa-wrench',
            'name' => 'backend.function.system.config',
            'route_name' => 'b.system.config',
            'alias' => 'config',
            'uri' => 'config',
            'namespace' => 'Backend',
            'controller' => 'ConfigController',
            'action' => 'index',
            'parent_id' =>  $systemId,
            'level' => 1,
            'position' => 1,
            'allow' => 0
        ]);
        $roleId = self::insertGetId([
            'icon' => 'fas fa-eye-slash',
            'name' => 'backend.function.role',
            'route_name' => '',
            'alias' => '#',
            'uri' => '#',
            'namespace' => 'Backend\Roles',
            'controller' => '',
            'action' => '',
            'parent_id' => 0,
            'level' => 0,
            'position' => 3,
            'allow' => 0
        ]);
        $idFuncs[] = $roleId;
        $idFuncs[] = $roleUsersId = self::insertGetId([
            'icon' => 'fas fa-user',
            'name' => 'backend.function.role.users',
            'route_name' => 'b.role.users',
            'alias' => 'role-user',
            'uri' => 'role-user',
            'namespace' => 'Backend\Roles',
            'controller' => 'RoleController',
            'action' => 'users',
            'parent_id' =>  $roleId,
            'level' => 1,
            'position' => 1,
            'allow' => 0
        ]);
        $idFuncs[] = $roleGroupsId = self::insertGetId([
            'icon' => 'fas fa-users',
            'name' => 'backend.function.role.groups',
            'route_name' => 'b.role.groups',
            'alias' => 'role-groups',
            'uri' => 'role-groups',
            'namespace' => 'Backend\Roles',
            'controller' => 'RoleController',
            'action' => 'groups',
            'parent_id' =>  $roleId,
            'level' => 1,
            'position' => 2,
            'allow' => 0
        ]);
        $idFuncs[] = $roleUserId = self::insertGetId([
            'icon' => 'fas fa-user',
            'name' => 'backend.function.role.user',
            'route_name' => 'b.role.user',
            'alias' => 'role-user',
            'uri' => 'role-user',
            'namespace' => 'Backend\Roles',
            'controller' => 'RoleController',
            'action' => 'user',
            'parent_id' =>  $roleUsersId,
            'level' => 2,
            'position' => 1,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[] = $roleGroupId = self::insertGetId([
            'icon' => 'fas fa-users',
            'name' => 'backend.function.role.group',
            'route_name' => 'b.role.group',
            'alias' => 'role-group',
            'uri' => 'role-group',
            'namespace' => 'Backend\Roles',
            'controller' => 'RoleController',
            'action' => 'group',
            'parent_id' =>  $roleGroupsId,
            'level' => 2,
            'position' => 1,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[]  = self::insertGetId([
            'icon' => 'fas fa-save',
            'name' => 'backend.function.role.setuser',
            'route_name' => 'b.role.setuser',
            'alias' => 'role-user',
            'uri' => 'role-user',
            'namespace' => 'Backend\Roles',
            'controller' => 'RoleController',
            'action' => 'userUpdate',
            'parent_id' =>  $roleUserId,
            'level' => 3,
            'position' => 1,
            'allow' => 0,
            'display' => 0
        ]);
        $idFuncs[]  = self::insertGetId([
            'icon' => 'fas fa-save',
            'name' => 'backend.function.role.setgroup',
            'route_name' => 'b.role.setgroup',
            'alias' => 'role-group',
            'uri' => 'role-group',
            'namespace' => 'Backend\Roles',
            'controller' => 'RoleController',
            'action' => 'groupUpdate',
            'parent_id' =>  $roleGroupId,
            'level' => 3,
            'position' => 1,
            'allow' => 0,
            'display' => 0
        ]);
        return $idFuncs;
    }
    public static function getFuncsByParent($parentId = 0)
    {
        return self::where('status', 1)
            ->where('hide', 0)
            ->where('parent_id', $parentId)
            ->orderBy('position', 'asc')
            ->get();
    }
    public static function getFuncsByLevel($level = 0)
    {
        return self::where('status', 1)
            ->where('hide', 0)
            ->where('level', $level)
            ->orderBy('position', 'asc')
            ->get();
    }
    public static function getFuncsByUserId($userId = 0, $parentId = 0,$fb='backend')
    {
        $user = Accounts::find($userId);
        $userId = $user->id;
        $groupId = $user->group_id;
        $data = self:: //where('parent_id', $parentId)
            where('status', 1)
            ->where('hide', 0)
            ->where('fb',$fb)
            ->whereIn(
                'id',
                Roles::where('group_id', $groupId)
                    ->select('function_id')
                    ->get()->toArray()
            )
            ->whereNotIn(
                'id',
                AccountDenys::where('user_id', Auth::guard('backend')->user()->id)
                    ->select('function_id')
                    ->get()->toArray()
            )
            ->orderBy('position', 'asc')
            ->get();
        return $data;
    }
    public static function getFuncsByGroupId($groupId = 0, $parentId = 0,$fb='backend')
    {
        $group = AccountGroups::find($groupId);
        $groupId = $group->id;
        $data = self:: //where('parent_id', $parentId)
            where('status', 1)
            ->where('fb',$fb)
            ->where('hide', 0);
        if (!Auth::guard('backend')->user()->root) {
            $data->whereIn(
                'id',
                Roles::where('group_id', $groupId)
                    ->select('function_id')
                    ->get()->toArray()
            );
        }
        return $data->orderBy('position', 'asc')
            ->get();
    }

    public static function getMenuByUserId($parentId = 0,$fb='backend')
    {
        $user = Auth::guard('backend')->user();
        $userId = $user->id;
        $groupId = $user->group_id;
        $data = self:: //where('parent_id', $parentId)
            where('status', 1)
            ->where('hide', 0)
            ->where('fb', $fb)
            ->where('display', 1);
        if (!$user->root) {
            $data->where(function ($query) use ($userId, $groupId) {
                $query->whereIn(
                    'id',
                    Roles::where('group_id', $groupId)
                        ->select('function_id')
                        ->get()->toArray()
                )
                    ->whereNotIn(
                        'id',
                        AccountDenys::where('user_id', $userId)
                            ->where('group_id', $groupId)
                            ->select('function_id')
                            ->get()->toArray()
                    )->orWhere('allow', 1);
            });
        }
        return $data->orderBy('parent_id', 'asc')->orderBy('position', 'asc')
            ->get();
        // dd($data->count());
    }
}
