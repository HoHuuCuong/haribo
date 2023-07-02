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
            <div class="card-body">
            {!!msg(session('msg'),session('type'))!!}
            <form class="form-horizontal form-bordered needs-validation" method="post" action="{{route('b.account.changepasspost')}}" novalidate>
                    <div class="form-group row @error('oldpwd') has-danger @enderror">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="oldpwd">{{__('backend.label.oldpassword')}}</label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control"  id="oldpwd" name="oldpwd"
                            required
                            >
                            <span id="helpoldpwd" data-msg="{{__('backend.validate.passhightlv',['name'=>__('backend.label.oldpassword')])}}" class="text-danger">{{$errors->first('oldpwd')}}</span>
                        </div>
                    </div>
                    <div class="form-group row @error('pwd') has-danger @enderror">
                        <label class="col-lg-3 control-label text-lg-right pt-2"  for="pwd">{{__('backend.label.password')}}</label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" id="pwd" name="pwd"
                            data-regix="{{HD::REGIX_PASSWORD}}"
                            required
                            >
                            <span id="helppwd" data-msg="{{__('backend.validate.passhightlv',['name'=>__('backend.label.password')])}}" class="text-danger">{{$errors->first('pwd')}}</span>
                            <span class="help-block">{{__('backend.button.notepass')}}</span>
                        </div>
                    </div>
                    <div class="form-group row @error('pwd_confirmation') has-danger @enderror">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="pwd_confirmation">{{__('backend.label.confirm')}}</label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" id="pwd_confirmation" name="pwd_confirmation"
                            data-match="pwd"
                            required
                            >
                            <span id="helppwd_confirmation" data-msg="{{__('backend.validate.confirmed',['name'=>__('backend.label.confirm'),'parent'=>__('backend.label.password')])}}" class="text-danger">{{$errors->first('pwd_confirmation')}}</span>
                            <span class="help-block">{{__('backend.button.notecfpass')}}</span>
                        </div>
                    </div>
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('b.home')}}" class="btn btn-sm btn-default"><i class="fa fa-reply"></i> {{__('backend.button.cancel')}}</a> <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> {{__('backend.button.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
