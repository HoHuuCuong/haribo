<?php

namespace App\Http\Controllers\Backend\Systems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Productkm;
use Illuminate\Support\Facades\Auth;

class ProductkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $data = [
            'pagename' => __('Items'),
            'breadcrumbs' => [
                '#' => __('Items')
            ],
            'list' => Productkm::where('hide', 0)
                ->filter($rq->all())
                ->sort($rq->field, $rq->sort)
                ->paginate(20)
        ];
        return view('backend.kmproducts.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pagename' => __('Create Item'),
            'action' => route('product.store'),
            'method' => 'POST',
            'breadcrumbs' => [
                '#' => __('Create Item')
            ],
        ];
        return view('backend.kmproducts.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Productkm::create();
        if ($item) {
            $item->content = $request->content;
            $item->name = $request->name;
            $item->is_new = $request->is_new;
            $item->image = $request->image;
            $item->pos = $request->pos;
            $item->status = $request->status;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Create Item success', 'title' => 'Item action']);
        } else {
            return redirect()->back()->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Item action']);
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
        $item = Productkm::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $data = [
                'pagename' => __('Update Item'),
                'action' => route('product.update', $id),
                'method' => 'PUT',
                'item' => $item,
                'breadcrumbs' => [
                    '#' => __('Update Item')
                ],
            ];
            return view('backend.kmproducts.form', $data);
        } else {
            return redirect()->route('product.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Item action']);
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
        $item = Productkm::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->content = $request->content;
            $item->is_new = $request->is_new;
            $item->name = $request->name;
            $item->image = $request->image;
            $item->pos = $request->pos;
            $item->status = $request->status;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Update Item success', 'title' => 'Item action']);
        } else {
            return redirect()->route('product.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Item action']);
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
        $item = Productkm::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->status = 2;
            $item->hide = 1;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Delete Item success', 'title' => 'Item action']);
        } else {
            return redirect()->route('product.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Item action']);
        }
    }
}
