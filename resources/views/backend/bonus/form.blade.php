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
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('code') has-danger @enderror">
                                <label class="col-form-label" for="code">{{__('Code')}}</label>
                                <input type="text" class="form-control" id="code" name="code"
                                    placeholder="{{__('Code')}}" required
                                    value="{{$item->code??old('code')}}">
                                <span id="helpcode"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Code')])}}"
                                    class="text-danger">{{$errors->first('code')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('gift') has-danger @enderror">
                                <label class="col-form-label" for="gift">{{__('Mã nhận giải')}}</label>
                                <input type="checkbox" id="gift" name="gift"
                                    placeholder="{{__('Mã nhận giải')}}" {{($item->gift??old('gift'))==1?'checked':''}} value="1">
                                <span id="helppos"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Mã nhận giải')])}}"
                                    class="text-danger">{{$errors->first('gift')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
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
                        <div class="col-lg-6">
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
                    @csrf
                    @method($method)
                    <div class="form-group row mt-3">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('bonus.index')}}" class="btn btn-sm btn-default"><i
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
