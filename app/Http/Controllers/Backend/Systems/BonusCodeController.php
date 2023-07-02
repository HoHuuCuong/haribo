<?php

namespace App\Http\Controllers\Backend\Systems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BonusCode;


class BonusCodeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $data = [
            'pagename' => __('Bonus Code'),
            'breadcrumbs' => [
                '#' => __('Bonus Code')
            ],
            'list' => BonusCode::where('hide', 0)
                ->filter($rq->all())
                ->sort($rq->field, $rq->sort)
                ->paginate(20)
        ];
        return view('backend.bonus.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pagename' => __('Bonus Code'),
            'action' => route('bonus.store'),
            'method' => 'POST',
            'breadcrumbs' => [
                '#' => __('Bonus Code')
            ],
        ];
        return view('backend.bonus.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = BonusCode::create();
        if ($item) {
            $item->code = $request->code;
            $item->gift = $request->gift?$request->gift:0;
            $item->pos = $request->pos;
            $item->status = $request->status;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Create Bonus Code success', 'title' => 'Bonus Code action']);
        } else {
            return redirect()->back()->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Bonus Code action']);
        }
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
        $item = BonusCode::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $data = [
                'pagename' => __('Update bonus code'),
                'action' => route('bonus.update', $id),
                'method' => 'PUT',
                'item' => $item,
                'breadcrumbs' => [
                    '#' => __('Update bonus code')
                ],
            ];
            return view('backend.bonus.form', $data);
        } else {
            return redirect()->route('bonus.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'bonus code action']);
        }
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
        //dd($request->all());
        $item = BonusCode::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->code = $request->code;
            $item->gift = $request->gift?$request->gift:0;
            $item->pos = $request->pos;
            $item->status = $request->status;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Update bonus code success', 'title' => 'bonus code action']);
        } else {
            return redirect()->route('bonus.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'bonus code action']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BonusCode::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->status = 2;
            $item->hide = 1;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Delete bonus code success', 'title' => 'bonus code action']);
        } else {
            return redirect()->route('bonus.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'bonus code action']);
        }
    }
}
