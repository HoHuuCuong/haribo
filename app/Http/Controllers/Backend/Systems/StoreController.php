<?php

namespace App\Http\Controllers\Backend\Systems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Store;
use App\Model\City;
use App\Model\District;
use App\Model\Oauth;

class StoreController extends Controller
{
    public function getcities(Request $rq)
    {
        $endpoint = "http://partner.viettelpost.vn/v2/categories/listProvinceById?provinceId=";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint);
        //$statusCode = $response->getStatusCode();
        $content = $response->getBody();
        $rs = json_decode($content);
        if ($rs) {
            if ($rq->trun) {
                City::truncate();
                District::truncate();
            }
            foreach ($rs->data as $c) {
                if ($rq->s && $rq->e && $c->PROVINCE_ID >= $rq->s && $c->PROVINCE_ID <= $rq->e) {
                    $city = City::create();
                    $city->fill([
                        'en' => ['name' => $c->PROVINCE_NAME],
                        'vi' => ['name' => $c->PROVINCE_NAME]
                    ]);
                    $city->code       = $c->PROVINCE_CODE;
                    $city->created_at = now();
                    $city->save();
                    $id = $city->id;
                    $endpoint2 = "http://partner.viettelpost.vn/v2/categories/listDistrict?provinceId=" . $c->PROVINCE_ID;
                    $client2 = new \GuzzleHttp\Client();
                    $response2 = $client2->request('GET', $endpoint2);
                    $content2 = $response2->getBody();
                    $rs2 = json_decode($content2);
                    foreach ($rs2->data as $d) {
                        $district = District::create();
                        $district->fill([
                            'en' => ['name' => $d->DISTRICT_NAME],
                            'vi' => ['name' => $d->DISTRICT_NAME]
                        ]);
                        $district->code = $d->DISTRICT_VALUE;
                        $district->city_id = $id;
                        $district->created_at = now();
                        $district->save();
                    }
                }else{
                    break;
                }
            }
        }
    }
    public function getDistricts(Request $rq)
    {
        $list = District::options($rq->city_id);
        echo '<option value="">' . __('Select District') . '</option>';
        if ($list) {
            foreach ($list as $item) {
                echo '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $data = [
            'pagename' => __('Stores'),
            'breadcrumbs' => [
                '#' => __('Stores')
            ],
            'list' => Store::where('hide', 0)
                ->filter($rq->all())
                ->sort($rq->field, $rq->sort)
                ->paginate(20)
        ];
        return view('backend.stores.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pagename' => __('Create store'),
            'action' => route('store.store'),
            'method' => 'POST',
            'cities' => City::options(),
            'districts' => District::options(),
            'breadcrumbs' => [
                '#' => __('Create store')
            ],
        ];
        return view('backend.stores.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Store::create();
        $open_times = $request->open_times ? json_encode($request->open_times) : '';
        $vi_open_times = $request->vi_open_times ? json_encode($request->vi_open_times) : '';
        if ($item) {
            $item->fill([
                'en'  => [
                    'name' =>  $request->name,
                    'address' =>  $request->address,
                    'open_times' =>  $open_times
                ],
                'vi'  => [
                    'name' =>  $request->vi_name,
                    'address' =>  $request->vi_address,
                    'open_times' =>  $vi_open_times
                ]
            ]);
            $item->StoreID = $request->StoreID;
            $item->district_id = $request->district;
            $item->city_id = $request->city;
            $item->pos = $request->pos;
            $item->phone = $request->phone;
            $item->email = $request->email;
            $item->status = $request->status;
            $item->latitude = $request->latitude;
            $item->longitude = $request->longitude;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Create store success', 'title' => 'Store action']);
        } else {
            return redirect()->back()->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Store action']);
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
        $item = Store::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $data = [
                'pagename' => __('Update store'),
                'action' => route('store.update', $id),
                'method' => 'PUT',
                'cities' => City::options(),
                'districts' => District::options($item->city_id ? $item->city_id : 1),
                'item' => $item,
                'breadcrumbs' => [
                    '#' => __('Update store')
                ],
            ];
            return view('backend.stores.form', $data);
        } else {
            return redirect()->route('store.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Store action']);
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
        $item = Store::where(['id' => $id, 'hide' => 0])->first();
        $vi_open_times = $request->vi_open_times ? json_encode($request->vi_open_times) : '';
        $open_times = $request->open_times ? json_encode($request->open_times) : '';
        if ($item) {
            $item->fill([
                'en'  => [
                    'name' =>  $request->name,
                    'address' =>  $request->address,
                    'open_times' =>  $open_times
                ],
                'vi'  => [
                    'name' =>  $request->vi_name,
                    'address' =>  $request->vi_address,
                    'open_times' =>  $vi_open_times
                ]
            ]);
            $item->StoreID = $request->StoreID;
            $item->district_id = $request->district;
            $item->city_id = $request->city;
            $item->pos = $request->pos;
            $item->phone = $request->phone;
            $item->email = $request->email;
            $item->status = $request->status;
            $item->latitude = $request->latitude;
            $item->longitude = $request->longitude;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Update store success', 'title' => 'Store action']);
        } else {
            return redirect()->route('store.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Store action']);
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
        $item = Store::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->status = 2;
            $item->hide = 1;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Delete store success', 'title' => 'Store action']);
        } else {
            return redirect()->route('store.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Store action']);
        }
    }
}
