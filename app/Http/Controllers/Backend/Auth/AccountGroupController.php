<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountGroups;

class AccountGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $data = [
            'pagename' => __('backend.pagename.acccount.groups'),
            'breadcrumbs' => [
                '#' => __('backend.pagename.acccount.groups')
            ],
            'groups' => AccountGroups::where('hide', 0)
                ->sort($rq->field, $rq->sort)
                ->paginate(20)
        ];
        return view('backend.accounts.groups.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $rq)
    {
        $data = [
            'pagename' => __('backend.pagename.acccount.groups'),
            'action' => route('b.account.group.store'),
            'method' => 'POST',
            'breadcrumbs' => [
                '#' => __('backend.pagename.acccount.groups')
            ],
        ];
        return view('backend.accounts.groups.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rs = AccountGroups::insert([
            'name' => $request->ten,
            'description' => $request->mota,
            'status' => $request->status
        ]);
        if ($rs)
            return redirect()->back()->with(['msg' => __('Create new group success'), 'type' => 'success','title'=>'Group action']);
        //
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
        $item = AccountGroups::where('id', $id)->first();
        $data = [
            'pagename' => __('Update group') . ' - ' . $item->name,
            'action' => route('b.account.group.update',$id),
            'method' => 'PUT',
            'breadcrumbs' => [
                '#' => __('Update admin group')
            ],
            'item' => $item
        ];
        return view('backend.accounts.groups.form', $data);
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
        $rs = AccountGroups::where('id', $id)->update([
            'name' => $request->ten,
            'description' => $request->mota,
            'status' => $request->status
        ]);
        if ($rs)
            return redirect()->back()->with(['msg' => __('Update success'), 'type' => 'success','title'=>'Group action']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = AccountGroups::where('id', $id)->update(['hide' => 1]);
        if ($rs) return redirect()->back()->with(['msg' => __('Delete success'), 'type' => 'success','title'=>'Group action']);
    }
}
