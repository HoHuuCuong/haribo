@extends('backend.master')
@section('container')
<!-- start: page -->
<style>
    .del-time-open {
        cursor: pointer;
        position: absolute;
        top: 40px;
        font-weight: bold;
        font-size: 15px;
    }
    .row-time-open,.vi_row-time-open {
        position: relative;
    }
</style>
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                </div>

                <h2 class="card-title">{{$pagename}}</h2>
            </header>
            {!!msg(session('msg'),session('type'),session('title'))!!}
            <div class="card-body">
                <form class="needs-validation" method="POST" action="{{$action}}" novalidate>
                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a class="nav-link" href="#en" data-toggle="tab"><i class="fas fa-star"></i>
                                    English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#vi" data-toggle="tab">Vietnamese</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="en" class="tab-pane active">
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <label class="col-form-label" for="name">{{__('Store Name')}}</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="{{__('Store Name')}}" required
                                                value="{{$item->name??old('name')}}">
                                            <span id="helpname"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Store Name')])}}"
                                                class="text-danger">{{$errors->first('name')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group @error('address') has-danger @enderror">
                                            <label class="col-form-label" for="address">{{__('Address')}}</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="{{__('Address')}}" required
                                                value="{{$item->address??old('address')}}">
                                            <span id="helpaddress"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Address')])}}"
                                                class="text-danger">{{$errors->first('address')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="main_open_times">
                                    @if (isset($item->open_times) && $item->open_times)
                                    @php
                                    $times = json_decode($item->open_times);
                                    @endphp
                                    @foreach ($times as $idtime=>$time)
                                    <div class="row form-group row-time-open" id="item_open_{{$idtime}}">
                                        <div class="col-lg-4">
                                            <div class="form-group @error('dayopen') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="dayopen_{{$idtime}}">{{__('Day open')}}</label>
                                                <input type="text" class="form-control" id="dayopen_{{$idtime}}"
                                                    name="open_times[{{$idtime}}][dayopen]"
                                                    placeholder="{{__('Day open')}}" required
                                                    value="{{$time->dayopen}}">
                                                <span id="helpdayopen"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Day open')])}}"
                                                    class="text-danger">{{$errors->first('dayopen')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group @error('opentime') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="opentime_{{$idtime}}">{{__('Opening time')}}</label>
                                                <input type="text" class="form-control" id="opentime_{{$idtime}}"
                                                    name="open_times[{{$idtime}}][opentime]"
                                                    placeholder="{{__('Opening time')}}" required
                                                    value="{{$time->opentime}}">
                                                <span id="helpopentime"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Opening time')])}}"
                                                    class="text-danger">{{$errors->first('opentime')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group @error('closetime') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="closetime_{{$idtime}}">{{__('Closing time')}}</label>
                                                <input type="text" class="form-control" id="closetime_{{$idtime}}"
                                                    name="open_times[{{$idtime}}][closetime]"
                                                    placeholder="{{__('Closing time')}}" required
                                                    value="{{$time->closetime}}">
                                                <span id="helpclosetime"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Closing time')])}}"
                                                    class="text-danger">{{$errors->first('closetime')}}</span>
                                            </div>
                                        </div>
                                        <span class="text-danger del-time-open" data-id="{{$idtime}}"><i
                                                class="fa fa-times"></i></span>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="row form-group row-time-open" id="item_open_0">
                                        <div class="col-lg-4">
                                            <div class="form-group @error('dayopen') has-danger @enderror">
                                                <label class="col-form-label" for="dayopen_0">{{__('Day open')}}</label>
                                                <input type="text" class="form-control" id="dayopen_0"
                                                    name="open_times[0][dayopen]" placeholder="{{__('Day open')}}"
                                                    required value="Monday">
                                                <span id="helpdayopen"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Day open')])}}"
                                                    class="text-danger">{{$errors->first('dayopen')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group @error('opentime') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="opentime_0">{{__('Opening time')}}</label>
                                                <input type="text" class="form-control" id="opentime_0"
                                                    name="open_times[0][opentime]" placeholder="{{__('Opening time')}}"
                                                    required value="8:30">
                                                <span id="helpopentime"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Opening time')])}}"
                                                    class="text-danger">{{$errors->first('opentime')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group @error('closetime') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="closetime_0">{{__('Closing time')}}</label>
                                                <input type="text" class="form-control" id="closetime_0"
                                                    name="open_times[0][closetime]" placeholder="{{__('Closing time')}}"
                                                    required value="19:00">
                                                <span id="helpclosetime"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Closing time')])}}"
                                                    class="text-danger">{{$errors->first('closetime')}}</span>
                                            </div>
                                        </div>
                                        <span class="text-danger del-time-open" data-id="0"><i
                                                class="fa fa-times"></i></span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div id="vi" class="tab-pane">
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <div class="form-group @error('vi_name') has-danger @enderror">
                                            <label class="col-form-label" for="vi_name">{{__('Store Name')}}</label>
                                            <input type="text" class="form-control" id="vi_name" name="vi_name"
                                                placeholder="{{__('Store Name')}}" required
                                                value="{{isset($item)?$item->translate('vi')->name:old('vi_name')}}">
                                            <span id="helpvi_name"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Store Name')])}}"
                                                class="text-danger">{{$errors->first('vi_name')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group @error('vi_address') has-danger @enderror">
                                            <label class="col-form-label" for="vi_address">{{__('Address')}}</label>
                                            <input type="text" class="form-control" id="vi_address" name="vi_address"
                                                placeholder="{{__('Address')}}" required
                                                value="{{isset($item)?$item->translate('vi')->address:old('vi_address')}}">
                                            <span id="helpvi_address"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Address')])}}"
                                                class="text-danger">{{$errors->first('vi_address')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="vi_main_open_times">
                                    @if (isset($item) && $item->translate('vi')->open_times)
                                    @php
                                    $times = json_decode($item->translate('vi')->open_times);
                                    @endphp
                                    @foreach ($times as $idtime=>$time)
                                    <div class="row form-group vi_row-time-open" id="vi_item_open_{{$idtime}}">
                                        <div class="col-lg-4">
                                            <div class="form-group @error('dayopen') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="dayopen_{{$idtime}}">{{__('Day open')}}</label>
                                                <input type="text" class="form-control" id="dayopen_{{$idtime}}"
                                                    name="vi_open_times[{{$idtime}}][dayopen]"
                                                    placeholder="{{__('Day open')}}" required
                                                    value="{{$time->dayopen}}">
                                                <span id="helpdayopen"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Day open')])}}"
                                                    class="text-danger">{{$errors->first('dayopen')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group @error('opentime') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="opentime_{{$idtime}}">{{__('Opening time')}}</label>
                                                <input type="text" class="form-control" id="opentime_{{$idtime}}"
                                                    name="vi_open_times[{{$idtime}}][opentime]"
                                                    placeholder="{{__('Opening time')}}" required
                                                    value="{{$time->opentime}}">
                                                <span id="helpopentime"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Opening time')])}}"
                                                    class="text-danger">{{$errors->first('opentime')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group @error('closetime') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="closetime_{{$idtime}}">{{__('Closing time')}}</label>
                                                <input type="text" class="form-control" id="closetime_{{$idtime}}"
                                                    name="vi_open_times[{{$idtime}}][closetime]"
                                                    placeholder="{{__('Closing time')}}" required
                                                    value="{{$time->closetime}}">
                                                <span id="helpclosetime"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Closing time')])}}"
                                                    class="text-danger">{{$errors->first('closetime')}}</span>
                                            </div>
                                        </div>
                                        <span class="text-danger del-time-open" data-id="{{$idtime}}"><i
                                                class="fa fa-times"></i></span>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="row form-group vi_row-time-open" id="vi_item_open_0">
                                        <div class="col-lg-4">
                                            <div class="form-group @error('dayopen') has-danger @enderror">
                                                <label class="col-form-label" for="dayopen_0">{{__('Day open')}}</label>
                                                <input type="text" class="form-control" id="dayopen_0"
                                                    name="vi_open_times[0][dayopen]" placeholder="{{__('Day open')}}"
                                                    required value="Monday">
                                                <span id="helpdayopen"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Day open')])}}"
                                                    class="text-danger">{{$errors->first('dayopen')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group @error('opentime') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="opentime_0">{{__('Opening time')}}</label>
                                                <input type="text" class="form-control" id="opentime_0"
                                                    name="vi_open_times[0][opentime]" placeholder="{{__('Opening time')}}"
                                                    required value="8:30">
                                                <span id="helpopentime"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Opening time')])}}"
                                                    class="text-danger">{{$errors->first('opentime')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group @error('closetime') has-danger @enderror">
                                                <label class="col-form-label"
                                                    for="closetime_0">{{__('Closing time')}}</label>
                                                <input type="text" class="form-control" id="closetime_0"
                                                    name="vi_open_times[0][closetime]" placeholder="{{__('Closing time')}}"
                                                    required value="19:00">
                                                <span id="helpclosetime"
                                                    data-msg="{{__('backend.validate.requied',['name'=>__('Closing time')])}}"
                                                    class="text-danger">{{$errors->first('closetime')}}</span>
                                            </div>
                                        </div>
                                        <span class="text-danger del-time-open" data-id="0"><i
                                                class="fa fa-times"></i></span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2"><a class="btn btn-sm btn-success text-light" id="addtimeopen"><i
                        class="fa fa-plus"></i> {{__('Add time open')}}</a></div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <div class="form-group @error('StoreID') has-danger @enderror">
                                <label class="col-form-label" for="StoreID">{{__('Store ID')}}</label>
                                <input type="text" class="form-control" id="StoreID" name="StoreID"
                                    placeholder="{{__('Store ID')}}" required
                                    value="{{$item->StoreID??old('StoreID')}}">
                                <span id="helpStoreID"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Store ID')])}}"
                                    class="text-danger">{{$errors->first('StoreID')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group @error('status') has-danger @enderror">
                                <label class="col-form-label" for="status">{{__('Status')}}</label>
                                <select class="form-control" id="status" name="status" required>
                                    @foreach ($STATUS as $sitem)
                                    <option @if (isset($item->status) && $item->status == $sitem->id)
                                        selected
                                        @endif value="{{$sitem->id}}">{{$sitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpstatus"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Status')])}}"
                                    class="text-danger">{{$errors->first('status')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group @error('pos') has-danger @enderror">
                                <label class="col-form-label" for="pos">{{__('Position')}}</label>
                                <input type="number" class="form-control" id="pos" name="pos"
                                    placeholder="{{__('Position')}}" required value="{{$item->pos??old('pos')}}">
                                <span id="helppos"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Position')])}}"
                                    class="text-danger">{{$errors->first('pos')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('email') has-danger @enderror">
                                <label class="col-form-label" for="email">{{__('Email')}}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="{{__('Email')}}" required value="{{$item->email??old('email')}}">
                                <span id="helpemail" data-msg="{{__('backend.validate.requied',['name'=>__('Email')])}}"
                                    class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('phone') has-danger @enderror">
                                <label class="col-form-label" for="phone">{{__('Phone')}}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="{{__('Phone')}}" required value="{{$item->phone??old('phone')}}">
                                <span id="helpphone" data-msg="{{__('backend.validate.requied',['name'=>__('Phone')])}}"
                                    class="text-danger">{{$errors->first('phone')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('city') has-danger @enderror">
                                <label class="col-form-label" for="city">{{__('City')}}</label>
                                <select class="form-control" data-api="{{route('b.ajax.getdistricts')}}" id="city"
                                    name="city" required>
                                    <option value="">{{__('Select City')}}</option>
                                    @foreach ($cities as $citem)
                                    <option value="{{$citem->id}}"
                                        {{($item->city_id??old('city'))==$citem->id?'selected':''}}>
                                        {{$citem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpcity" data-msg="{{__('backend.validate.requied',['name'=>__('City')])}}"
                                    class="text-danger">{{$errors->first('city')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('district') has-danger @enderror">
                                <label class="col-form-label" for="district">{{__('District')}}</label>
                                <select class="form-control" id="district" name="district" required>
                                    <option value="">{{__('Select District')}}</option>
                                    @foreach ($districts as $ditem)
                                    <option value="{{$ditem->id}}"
                                        {{($item->district_id??old('city'))==$ditem->id?'selected':''}}>
                                        {{$ditem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpdistrict"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('District')])}}"
                                    class="text-danger">{{$errors->first('district')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('latitude') has-danger @enderror">
                                <label class="col-form-label" for="latitude">{{__('Latitude')}}</label>
                                <input type="text" class="form-control" id="latitude" name="latitude"
                                    placeholder="{{__('Latitude')}}" required
                                    value="{{$item->latitude??old('latitude')}}">
                                <span id="helplatitude"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Latitude')])}}"
                                    class="text-danger">{{$errors->first('latitude')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('longitude') has-danger @enderror">
                                <label class="col-form-label" for="longitude">{{__('Longitude')}}</label>
                                <input type="text" class="form-control" id="longitude" name="longitude"
                                    placeholder="{{__('Longitude')}}" required
                                    value="{{$item->longitude??old('longitude')}}">
                                <span id="helplongitude"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Longitude')])}}"
                                    class="text-danger">{{$errors->first('longitude')}}</span>
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method($method)
                    <div class="form-group row mt-3">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('store.index')}}" class="btn btn-sm btn-default"><i
                                    class="fa fa-reply"></i>
                                {{__('backend.button.cancel')}}</a> <button class="btn btn-sm btn-primary"
                                type="submit"><i class="fa fa-save"></i> {{__('backend.button.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
