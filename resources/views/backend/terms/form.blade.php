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
                                    <div class="col-lg-12">
                                        <div class="form-group @error('title') has-danger @enderror">
                                            <label class="col-form-label" for="title">{{__('Title')}}</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="{{__('Title')}}" required
                                                value="{{$termtitle->content??old('title')}}">
                                            <span id="helptitle"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Title')])}}"
                                                class="text-danger">{{$errors->first('title')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="form-group @error('content') has-danger @enderror">
                                            <label class="col-form-label" for="content">{{__('Content')}}</label>
                                            <textarea rows="10" class="form-control" id="content" name="content"
                                                placeholder="{{__('Content')}}" required>{{$termcontent->content??old('content')}}</textarea>
                                            <span id="helpcontent"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Content')])}}"
                                                class="text-danger">{{$errors->first('content')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="vi" class="tab-pane">
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="form-group @error('vi_title') has-danger @enderror">
                                            <label class="col-form-label" for="vi_title">{{__('Title')}}</label>
                                            <input type="text" class="form-control" id="vi_title" name="vi_title"
                                                placeholder="{{__('Title')}}" required
                                                value="{{isset($termtitle)?$termtitle->translate('vi')->content:old('vi_title')}}">
                                            <span id="helpvi_title"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Title')])}}"
                                                class="text-danger">{{$errors->first('vi_title')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="form-group @error('vi_content') has-danger @enderror">
                                            <label class="col-form-label" for="vi_content">{{__('Content')}}</label>
                                            <textarea rows="10" type="text" class="form-control" id="vi_content" name="vi_content"
                                                placeholder="{{__('Content')}}" required>{{isset($termcontent)?$termcontent->translate('vi')->content:old('vi_content')}}</textarea>
                                            <span id="helpvi_content"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Content')])}}"
                                                class="text-danger">{{$errors->first('vi_content')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('brandid') has-danger @enderror">
                                <label class="col-form-label" for="Brand ID">{{__('Brand ID')}}</label>
                                <select class="form-control" id="brandid" name="brandid" required>
                                    @foreach ($brands as $bitem)
                                    <option @if (isset($termtitle->brandid) && $termtitle->brandid == $bitem->id)
                                        selected
                                        @endif value="{{$bitem->id}}">{{$bitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpbrandid"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Brand ID')])}}"
                                    class="text-danger">{{$errors->first('brandid')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('status') has-danger @enderror">
                                <label class="col-form-label" for="status">{{__('Status')}}</label>
                                <select class="form-control" id="status" name="status" required>
                                    @foreach ($STATUS as $sitem)
                                    <option @if (isset($termtitle->status) && $termtitle->status == $sitem->id)
                                        selected
                                        @endif value="{{$sitem->id}}">{{$sitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpstatus"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Status')])}}"
                                    class="text-danger">{{$errors->first('status')}}</span>
                            </div>
                        </div>
                    </div>

                    @csrf
                    @method($method)
                    <div class="form-group row mt-3">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('faq.index')}}" class="btn btn-sm btn-default"><i
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
