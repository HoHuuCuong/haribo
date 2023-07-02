<?php

namespace App\Http\Controllers\Backend\Systems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Customer;
use App\Model\District;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $data = [
            'pagename' => __('Customers'),
            'breadcrumbs' => [
                '#' => __('Customers')
            ],
            'list' => Customer::where('hide', 0)
                ->filter($rq->all())
                ->sort($rq->field, $rq->sort)
                ->paginate(20)
        ];
        return view('backend.customers.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pagename' => __('Create Customer'),
            'action' => route('customer.store'),
            'method' => 'POST',
            'breadcrumbs' => [
                '#' => __('Create Customer')
            ],
        ];
        return view('backend.customers.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $item = Customer::create();
        // if ($item) {
        //     $item->code = $request->code;
        //     $item->gift = $request->gift?$request->gift:0;
        //     $item->pos = $request->pos;
        //     $item->status = $request->status;
        //     $item->save();
        //     return redirect()->back()->with(['type' => 'success', 'msg' => 'Create Bonus Code success', 'title' => 'Bonus Code action']);
        // } else {
        //     return redirect()->back()->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Bonus Code action']);
        // }
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
        $item = Customer::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $data = [
                'pagename' => __('Update customer'),
                'action' => route('customer.update', $id),
                'method' => 'PUT',
                'cities' => City::options(),
                'districts' => District::options($item->city_id ? $item->city_id : 1),
                'item' => $item,
                'breadcrumbs' => [
                    '#' => __('Update customer')
                ],
            ];
            return view('backend.customers.form', $data);
        } else {
            return redirect()->route('customer.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'customer action']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, $id)
    {
        //dd($request->all());
        $item = Customer::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->first_name = $rq->first_name;
            $item->last_name = $rq->last_name;
            $item->email = $rq->email;
            $item->phone = $rq->phone;
            $item->address = $rq->address;
			$item->cmnd = $rq->cmnd;
            $item->city_id = $rq->city;
            $item->district_id = $rq->district;
            $item->bonus_code = $rq->bonus_code;
            $item->status = $rq->status;
            if($rq->hasFile('attach'))
            {
                $item->attach= $rq->file('attach')->store('attach','public');
            }
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Update customer successful', 'title' => 'customer action']);
        } else {
            return redirect()->route('customer.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'customer action']);
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
        $item = Customer::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->status = 2;
            $item->hide = 1;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Delete customer success', 'title' => 'customer action']);
        } else {
            return redirect()->route('customer.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'customer action']);
        }
    }
}
