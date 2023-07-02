<?php

namespace App\Http\Controllers\Backend\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccessStatus;
use App\Model\Accounts;
use App\Model\AccountDenys;
use App\Model\AccountGroups;
use App\Model\DenyStatus;
use App\Model\Functions;
use App\Model\OrderStatus;
use App\Model\Roles;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function currentUser()
    {
        return Auth::guard('backend')->user();
    }
    public function users(Request $rq)
    {
        $data = [
            'pagename' => __('backend.pagename.roleusers'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.roleusers')
            ],
            'users' => Accounts::roleUsers($rq->field, $rq->sort, $this->currentUser())
        ];
        return view('backend.roles.users', $data);
    }
    public function groups(Request $rq)
    {
        $data = [
            'pagename' => __('backend.pagename.rolegroups'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.rolegroups')
            ],
            'groups' => AccountGroups::roleGroups($rq->field, $rq->sort, $this->currentUser())
        ];
        return view('backend.roles.groups', $data);
    }
    public function user($id)
    {
        $user = Accounts::find($id);
        if ($user) {
            $data = [
                'pagename' => __('backend.pagename.roleuser :name', ['name' => $user->username]),
                'breadcrumbs' => [
                    '#' => __('backend.pagename.roleuser :name', ['name' => $user->username])
                ],
                'scripts' => ['/vendor/jstree/jstree.js', '/js/role.js'],
                'styles' => ['/vendor/jstree/themes/default/style.css'],
                'user' => $user
            ];
            return view('backend.roles.user', $data);
        } else
            return redirect()->route('b.role.users')->with(['msg' => __('backend.error.usernotfound'), 'type' => 'danger']);
    }
    public function group($id)
    {
        $group = AccountGroups::find($id);
        $data = [
            'pagename' => __('backend.pagename.rolegroup :name', ['name' => $group->name]),
            'breadcrumbs' => [
                '#' => __('backend.pagename.rolegroup :name', ['name' => $group->name])
            ],
            'scripts' => ['/vendor/jstree/jstree.js', '/js/role.js'],
            'styles' => ['/vendor/jstree/themes/default/style.css'],
            'group' => $group
        ];
        return view('backend.roles.group', $data);
    }
    public function userUpdate(Request $request, $id)
    {
        if (AccountDenys::deny($request->funcs ? $request->funcs : [], $id)) {
            $data = ['status' => 'success', 'title' => __('backend.pagename.roleusers'), 'msg' => __('backend.success.setrole')];
        } else {
            $data = ['status' => 'danger', 'title' => __('backend.pagename.roleusers'), 'msg' => __('backend.error.setrole')];
        }
        return response($data, 200);
    }
    public function groupUpdate(Request $request, $id)
    {
        if (Roles::grant($request->funcs ? $request->funcs : [], $id)) {
            $data = ['status' => 'success', 'title' => __('backend.pagename.rolegroups'), 'msg' => __('backend.success.setrole')];
        } else {
            $data = ['status' => 'danger', 'title' => __('backend.pagename.rolegroups'), 'msg' => __('backend.error.setrole')];
        }
        return response($data, 200);
    }
    public function groupStatus($id)
    {
        $group = AccountGroups::find($id);
        $status = OrderStatus::where(['hide'=>0,'status'=>1])->orderBy('pos','ASC')->get();
        $data = [
            'pagename' => __('backend.pagename.rolegroup :name', ['name' => $group->name]),
            'breadcrumbs' => [
                '#' => __('backend.pagename.rolegroup :name', ['name' => $group->name])
            ],
            'scripts' => ['/vendor/jstree/jstree.js', '/js/rolestatus.js'],
            'styles' => ['/vendor/jstree/themes/default/style.css'],
            'group' => $group,
            'status'=>$status
        ];
        return view('backend.roles.groupstatus', $data);
    }
    public function groupUpdateStatus(Request $request, $id)
    {
        if (AccessStatus::grant($request->status ? $request->status : [], $id)) {
            $data = ['status' => 'success', 'title' => __('backend.pagename.rolegroups'), 'msg' => __('backend.success.setrole')];
        } else {
            $data = ['status' => 'danger', 'title' => __('backend.pagename.rolegroups'), 'msg' => __('backend.error.setrole')];
        }
        return response($data, 200);
    }
    public function userStatus($id)
    {
        $user = Accounts::find($id);
        $status = OrderStatus::getForGroupId($user->group_id);
        if ($user) {
            $data = [
                'pagename' => __('backend.pagename.roleuser :name', ['name' => $user->username]),
                'breadcrumbs' => [
                    '#' => __('backend.pagename.roleuser :name', ['name' => $user->username])
                ],
                'scripts' => ['/vendor/jstree/jstree.js', '/js/rolestatus.js'],
                'styles' => ['/vendor/jstree/themes/default/style.css'],
                'user' => $user,
                'status'=>$status
            ];
            return view('backend.roles.userstatus', $data);
        } else
            return redirect()->route('b.role.users')->with(['msg' => __('backend.error.usernotfound'), 'type' => 'danger']);
    }
    public function userUpdateStatus(Request $request, $id)
    {
        if (DenyStatus::deny($request->status ? $request->status : [], $id)) {
            $data = ['status' => 'success', 'title' => __('backend.pagename.roleusers'), 'msg' => __('backend.success.setrole')];
        } else {
            $data = ['status' => 'danger', 'title' => __('backend.pagename.roleusers'), 'msg' => __('backend.error.setrole')];
        }
        return response($data, 200);
    }
}
