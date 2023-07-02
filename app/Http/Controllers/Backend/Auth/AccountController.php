<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\Accounts\LoginRequest;
use App\Http\Requests\Backend\Accounts\ChangePassRequest;
use App\Http\Requests\Backend\Accounts\ChangeProfileRequest;
use App\Model\Accounts;
use App\Model\AccountGroups;
use App\Model\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $data = [
            'pagename' => __('backend.pagename.acccount.users'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.acccount.users')
            ],
            'users' => Accounts::where('hide', 0)
                ->where('username', '!=', 'admin')
                ->where('id', '!=', 1)
                ->sort($rq->field, $rq->sort)
                ->paginate(20)
        ];
        return view('backend.accounts.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pagename' => __('backend.pagename.acccount.add'),
            'action' => route('b.account.store'),
            'method' => 'POST',
            'breadcrumbs' => [
                '#' => __('backend.pagename.acccount.add')
            ],
            'groups' => AccountGroups::options(),
            'stores' => Store::options()
        ];
        return view('backend.accounts.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:accounts,email',
            'username' => 'unique:accounts,username',
            'phone' => 'unique:accounts,phone',
        ]);
        $rs = Accounts::insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
            'group_id' => $request->group_id,
            'StoreID' => $request->StoreID,
            'status' => $request->status
        ]);
        if ($rs)
            return redirect()->back()->with(['msg' => __('Create new success'), 'type' => 'success','title'=>'Account action']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Accounts::where('id', $id)->first();
        $data = [
            'pagename' => __('Update information ') . '-' . $item->name,
            'action' => route('b.account.update',$id),
            'method' => 'PUT',
            'breadcrumbs' => [
                '#' => __('Update information')
            ],
            'groups' => AccountGroups::options(),
            'stores' => Store::options(),
            'item' => $item
        ];
        return view('backend.accounts.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rs = Accounts::where('id', $id)->update($request->password?[
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
            'group_id' => $request->group_id,
            'StoreID' => $request->StoreID,
            'status' => $request->status
        ]:[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'group_id' => $request->group_id,
            'StoreID' => $request->StoreID,
            'status' => $request->status
        ]);
        if ($rs)
            return redirect()->back()->with(['msg' => __('Update info success'), 'type' => 'success','title'=>'Account action']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = Accounts::where('id', $id)->update(['hide' => 1,'status' => 2]);
        if ($rs) return redirect()->back()->with(['msg' => __('Delete account success'), 'type' => 'success','title'=>'Account action']);
    }
    /**
     * render login form backend
     *
     */
    public function login()
    {
        return view('backend.auth.login');
    }
    /**
     * post login form backend
     *
     */
    public function loginPost(LoginRequest $request)
    {
        $request->validated();
        if (Auth::guard('backend')->attempt(['username' => $request->username, 'password' => $request->pwd, 'hide' => 0], $request->rememberme)) {
            $status = Auth::guard('backend')->user()->status;
            if ($status == 1) {
                return redirect()->route('b.home');
            } else {
                Auth::guard('backend')->logout();
                session()->flush();
                return redirect()->route('b.account.showlogin')->with(['type' => 'warning', 'title' => __('backend.button.login'), 'msg' => __('backend.login.msg.' . $status)]);
            }
        } else
            return redirect()->back()->with(['type' => 'error', 'title' => __('backend.button.login'), 'msg' => __('backend.login.msg.error')]);
    }
    public function changePass()
    {
        $data = [
            'pagename' => __('backend.pagename.changepass'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.changepass')
            ]
        ];
        return view('backend.auth.changepass', $data);
    }
    public function changePassPost(ChangePassRequest $request)
    {
        $request->validated();
        $rs = Accounts::where('id', Auth::guard('backend')->user()->id)->update(
            [
                'password' => Hash::make($request->pwd)
            ]
        );
        // echo $rs;
        if ($rs) {
            return redirect()->route('b.account.changepass')->with(['type' => 'ok', 'title' => __('backend.button.edit'), 'msg' => __('backend.account.changepass.ok')]);
        } else {
            return  redirect()->route('b.account.changepass')->with(['type' => 'error', 'title' => __('backend.button.edit'), 'msg' => __('backend.account.changepass.error')]);
        }
    }
    public function profile()
    {
        $data = [
            'pagename' => __('backend.pagename.profile'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.profile')
            ],
            'user' => Auth::guard('backend')->user()
        ];
        return view('backend.auth.profile', $data);
    }
    public function profilePost(ChangeProfileRequest $request)
    {
        $request->validated();
        $user  = auth('backend')->user();
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if ($request->pwd) {
                $pwdValidate = new ChangePassRequest;
                Validator::make($request->all(), $pwdValidate->rules(), $pwdValidate->messages())->validate();
                $user->password = Hash::make($request->pwd);
            }
            $user->save();
            return redirect()->route('b.account.profile')->with(['type' => 'success', 'title' => __('backend.button.edit'), 'msg' => __('backend.success.profile')]);
        } else {
            return redirect()->route('b.account.profile')->with(['type' => 'error', 'title' => __('backend.button.edit'), 'msg' => __('backend.error.profile')]);
        }
    }
    public function logout()
    {
        Auth::guard('backend')->logout();
        session()->flush();
        return redirect()->route('b.account.showlogin')->with(['type' => 'info', 'title' => __('backend.button.logout'), 'msg' => __('backend.logout.msg')]);
    }
    public function pass(Request $request)
    {
        return Hash::make($request->pass);
    }
}
