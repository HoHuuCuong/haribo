@extends('backend.master')
@section('container')
<!-- start: page -->
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
                <form class="p-3 needs-validation" method="POST" action="{{$action}}" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('StoreID') has-danger @enderror">
                                <label class="col-form-label" for="StoreID">{{__('Store ID')}}</label>
                                <input type="text" class="form-control" id="StoreID" name="StoreID"
                                    placeholder="{{__('Store ID')}}" required value="{{$item->StoreID??old('StoreID')}}">
                                <span id="helpStoreID"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Store ID')])}}"
                                    class="text-danger">{{$errors->first('StoreID')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('name') has-danger @enderror">
                                <label class="col-form-label" for="name">{{__('Store Name')}}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{__('Store Name')}}" required value="{{$item->name??old('name')}}">
                                <span id="helpname"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Store Name')])}}"
                                    class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('brandid') has-danger @enderror">
                                <label class="col-form-label" for="Brand ID">{{__('Brand ID')}}</label>
                                <select  class="form-control" id="brandid" name="brandid" required>
                                    @foreach ($brands as $bitem)
                                    <option @if (isset($item->brandid) && $item->brandid == $bitem->id)
                                        selected
                                    @endif value="{{$bitem->id}}">{{$bitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpbrandid"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Brand ID')])}}"
                                    class="text-danger">{{$errors->first('brandid')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group @error('status') has-danger @enderror">
                                <label class="col-form-label" for="status">{{__('Status')}}</label>
                                <select  class="form-control" id="status" name="status" required>
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
                        <div class="col-lg-3">
                            <div class="form-group @error('pos') has-danger @enderror">
                                <label class="col-form-label" for="name">{{__('Position')}}</label>
                                <input type="number" class="form-control" id="pos" name="pos"
                                    placeholder="{{__('Position')}}" required value="{{$item->pos??old('pos')}}">
                                <span id="helppos"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Position')])}}"
                                    class="text-danger">{{$errors->first('pos')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('address') has-danger @enderror">
                                <label class="col-form-label" for="address">{{__('Address')}}</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="{{__('Address')}}" required value="{{$item->address??old('address')}}">
                                <span id="helpaddress"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Address')])}}"
                                    class="text-danger">{{$errors->first('address')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('district') has-danger @enderror">
                                <label class="col-form-label" for="name">{{__('District')}}</label>
                                <input type="text" class="form-control" id="district" name="district"
                                    placeholder="{{__('District')}}" required value="{{$item->district??old('district')}}">
                                <span id="helpdistrict"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('District')])}}"
                                    class="text-danger">{{$errors->first('district')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('city') has-danger @enderror">
                                <label class="col-form-label" for="name">{{__('City')}}</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="{{__('City')}}" required value="{{$item->city??old('city')}}">
                                <span id="helpcity"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('City')])}}"
                                    class="text-danger">{{$errors->first('city')}}</span>
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method($method)
                    <div class="form-group row mt-3">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('store.index')}}" class="btn btn-sm btn-default"><i class="fa fa-reply"></i>
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
