<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Functions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'pagename' => __('backend.pagename.dashboard'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.dashboard')
            ]
        ];
        return view('backend.contents.backend.dashboard', $data);
    }
    public function accessDeny()
    {
        $data = [
            'pagename' => __('backend.pagename.403'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.403')
            ]
        ];
        return view('backend.contents.backend.403', $data);
    }
    public function notFound()
    {
        $data = [
            'pagename' => __('backend.pagename.404'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.404')
            ]
        ];
        return view('backend.contents.backend.404', $data);
    }
    public function lockScreen(Request $rq)
    {
        session()->put('locksreen', 1);
        return response(['status' => 'success', 'title' => __('backend.lockscreen'), 'msg' => __('backend.success.lockscreen')]);
    }
    public function unLockScreen(\App\Http\Requests\Backend\Accounts\LoginRequest $rq)
    {
        $rq->validated();
        if (Hash::check($rq->pwd, Auth::guard('backend')->user()->password)) {
            session()->put('locksreen', 0);
            $data = ['status' => 'success', 'title' => __('backend.unlockscreen'), 'msg' => __('backend.success.unlockscreen')];
        } else {
            $data = ['status' => 'danger', 'title' => __('backend.unlockscreen'), 'msg' => __('backend.error.unlockscreen')];
        }
        return response($data);
    }
    private function getnameFuncwithParent($f)
    {
        if ($f->parent_id == 0) {
            return __($f->name);
        } else {
            $fp = Functions::where('id', $f->parent_id)->first();
            $pname = $this->getnameFuncwithParent($fp);
            return $pname . '-' . __($f->name);
        }
    }
    private function getallchild($f,&$fs)
    {
        $fp = Functions::where('parent_id', $f->id)->get();
        if($fp)
        {
            foreach($fp as $f1)
            {
                $f1->name = __($f->name).'->'.__($f1->name);
                $fs->push($f1);
                $this->getallchild($f1,$fs);
            }
        }
    }
    public function getlistfuncs()
    {
        $fs = Functions::where(['parent_id'=>0])->get();
        foreach ($fs as $f) {
            $f->name = __($f->name);
            $this->getallchild($f,$fs);
        }
        return response()->json($fs, 200);
    }
    public function getfunc(Request $rq)
    {
        $f = Functions::where('id', $rq->id)->first();
        return response()->json($f, 200);
    }
    public function createfunc(Request $rq)
    {
        $rs = DB::table('functions')->insertGetId([
            'name' => $rq->ten,
            'icon' => $rq->icon,
            'parent_id' => $rq->parent_id,
            'display'=>$rq->hienmenu,
            'position' => $rq->vitri,
            'route_name' => $rq->routename,
            'controller' => $rq->ctrname,
            'allow' => $rq->allow,
            'fb' => $rq->fb,
            'action' => $rq->action
        ]);
        if ($rs) {
            DB::table('roles')->insert([
                'function_id' => $rs,
                'group_id' => Auth::guard('backend')->user()->group_id
            ]);
            return back()->with(['msg' => 'Thêm chức năng thành công', 'type' => 'success']);
        }
    }
    public function updatefunc(Request $rq)
    {
        DB::table('functions')->where('id', $rq->fid)->update([
            'icon' => $rq->icon,
            'parent_id' => $rq->parent_id,
            'display'=>$rq->hienmenu,
            'position' => $rq->vitri,
            'route_name' => $rq->routename,
            'allow' => $rq->allow,
            'fb' => $rq->fb,
            'controller' => $rq->ctrname,
            'action' => $rq->action
        ]);
        return back()->with(['msg' => 'Thêm chức năng thành công', 'type' => 'success']);
    }
    public function getallRoutes()
    {
        $routelist = Route::getRoutes()->getRoutes();
        return response()->json($routelist,200);
    }
}
