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
                <form class="needs-validation" method="POST" action="{{$action}}" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('logo') has-danger @enderror">
                                <label class="col-form-label" for="logo">{{__('Logo')}}</label>
                                {!!imgApp($logo->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('logo')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 200x60px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="logo" name="logo"
                                    placeholder="{{__('Logo')}}"
                                    value="{{$logo->value}}">
                                    <span id="helplogo"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Logo')])}}"
                                    class="text-danger">{{$errors->first('logo')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('favicon') has-danger @enderror">
                                <label class="col-form-label" for="favicon">{{__('Favicon')}}</label>
                                {!!imgApp($favicon->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('favicon')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 36x36px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="favicon" name="favicon"
                                    placeholder="{{__('Favicon')}}"
                                    value="{{$favicon->value}}">
                                    <span id="helpfavicon"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Favicon')])}}"
                                    class="text-danger">{{$errors->first('favicon')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('topbanner') has-danger @enderror">
                                <label class="col-form-label" for="topbanner">{{__('Top Banner')}}</label>
                                {!!imgApp($topbanner->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('topbanner')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 1900x1090px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="topbanner" name="topbanner"
                                    placeholder="{{__('Top Banner')}}"
                                    value="{{$topbanner->value}}">
                                    <span id="helptopbanner"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Top Banner')])}}"
                                    class="text-danger">{{$errors->first('topbanner')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('midbanner') has-danger @enderror">
                                <label class="col-form-label" for="midbanner">{{__('Mid banner')}}</label>
                                {!!imgApp($midbanner->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('midbanner')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 1900x1090px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="midbanner" name="midbanner"
                                    placeholder="{{__('Mid banner')}}"
                                    value="{{$midbanner->value}}">
                                    <span id="helpmidbanner"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Mid banner')])}}"
                                    class="text-danger">{{$errors->first('midbanner')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('regimg') has-danger @enderror">
                                <label class="col-form-label" for="regimg">{{__('Registration IMG')}}</label>
                                {!!imgApp($regimg->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('regimg')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 400x600px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="regimg" name="regimg"
                                    placeholder="{{__('Registration IMG')}}"
                                    value="{{$regimg->value}}">
                                    <span id="helpregimg"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Registration IMG')])}}"
                                    class="text-danger">{{$errors->first('regimg')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('company') has-danger @enderror">
                                <label class="col-form-label" for="company">{{__('Company Name')}}</label>
                                <input type="text" class="form-control" id="company" name="company"
                                    placeholder="{{__('Company Name')}}"  value="{{$company->value??old('company')}}">
                                <span id="helpcompany" data-msg="{{__('backend.validate.requied',['name'=>__('Company Name')])}}"
                                    class="text-danger">{{$errors->first('company')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('title') has-danger @enderror">
                                <label class="col-form-label" for="title">{{__('Page Title')}}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="{{__('Page Title')}}"  value="{{$title->value??old('title')}}">
                                <span id="helptitle" data-msg="{{__('backend.validate.requied',['name'=>__('Page Title')])}}"
                                    class="text-danger">{{$errors->first('title')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('email') has-danger @enderror">
                                <label class="col-form-label" for="email">{{__('Email')}}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="{{__('Email')}}"  value="{{$email->value??old('email')}}">
                                <span id="helpemail" data-msg="{{__('backend.validate.requied',['name'=>__('Email')])}}"
                                    class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('phone') has-danger @enderror">
                                <label class="col-form-label" for="phone">{{__('Phone')}}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="{{__('Phone')}}"  value="{{$phone->value??old('phone')}}">
                                <span id="helpphone" data-msg="{{__('backend.validate.requied',['name'=>__('Phone')])}}"
                                    class="text-danger">{{$errors->first('phone')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('address') has-danger @enderror">
                                <label class="col-form-label" for="address">{{__('Address')}}</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="{{__('Address')}}"  value="{{$address->value??old('address')}}">
                                <span id="helpaddress" data-msg="{{__('backend.validate.requied',['name'=>__('Address')])}}"
                                    class="text-danger">{{$errors->first('address')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('fb') has-danger @enderror">
                                <label class="col-form-label" for="fb">{{__('Facebook')}}</label>
                                <input type="text" class="form-control" id="fb" name="fb"
                                    placeholder="{{__('Facebook')}}"  value="{{$fb->value??old('fb')}}">
                                <span id="helpfb" data-msg="{{__('backend.validate.requied',['name'=>__('Facebook')])}}"
                                    class="text-danger">{{$errors->first('fb')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('tw') has-danger @enderror">
                                <label class="col-form-label" for="tw">{{__('Twitter')}}</label>
                                <input type="text" class="form-control" id="tw" name="tw"
                                    placeholder="{{__('Twitter')}}"  value="{{$tw->value??old('tw')}}">
                                <span id="helptw" data-msg="{{__('backend.validate.requied',['name'=>__('Twitter')])}}"
                                    class="text-danger">{{$errors->first('tw')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('in') has-danger @enderror">
                                <label class="col-form-label" for="in">{{__('Instagram')}}</label>
                                <input type="text" class="form-control" id="in" name="in"
                                    placeholder="{{__('Instagram')}}"  value="{{$in->value??old('in')}}">
                                <span id="helpin" data-msg="{{__('backend.validate.requied',['name'=>__('Instagram')])}}"
                                    class="text-danger">{{$errors->first('in')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('ft') has-danger @enderror">
                                <label class="col-form-label" for="ft">{{__('Footer')}}</label>
                                <textarea rows="5" class="form-control" id="ft" name="ft"
                                    placeholder="{{__('Footer')}}">{{$ft->value??old('ft')}}</textarea>
                                <span id="helpft" data-msg="{{__('backend.validate.requied',['name'=>__('Footer')])}}"
                                    class="text-danger">{{$errors->first('ft')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('anacode') has-danger @enderror">
                                <label class="col-form-label" for="anacode">{{__('Google Analytics')}}</label>
                                <textarea rows="5" class="form-control" id="anacode" name="anacode"
                                    placeholder="{{__('Google Analytics')}}">{{$anacode->value??old('anacode')}}</textarea>
                                <span id="helpanacode" data-msg="{{__('backend.validate.requied',['name'=>__('Google Analytics')])}}"
                                    class="text-danger">{{$errors->first('anacode')}}</span>
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method($method)
                    <div class="form-group row mt-3">
                        <div class="col-lg-12 text-right"><button class="btn btn-sm btn-primary"
                                type="submit"><i class="fa fa-save"></i> {{__('backend.button.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
