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
                            <div class="form-group @error('abimg1') has-danger @enderror">
                                <label class="col-form-label" for="abimg1">{{__('IMG 1')}}</label>
                                {!!imgApp($abimg1->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('abimg1')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 500x400px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="abimg1" name="abimg1"
                                    placeholder="{{__('IMG 1')}}"
                                    value="{{$abimg1->value}}">
                                    <span id="helpabimg1"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('IMG 1')])}}"
                                    class="text-danger">{{$errors->first('abimg1')}}</span>
                            </div>
                        </div>
						<div class="col-lg-6">
                            <div class="form-group @error('abimg2') has-danger @enderror">
                                <label class="col-form-label" for="abimg2">{{__('IMG 2')}}</label>
                                {!!imgApp($abimg2->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('abimg2')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 500x400px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="abimg2" name="abimg2"
                                    placeholder="{{__('IMG 2')}}"
                                    value="{{$abimg2->value}}">
                                    <span id="helpabimg2"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('IMG 2')])}}"
                                    class="text-danger">{{$errors->first('abimg2')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('abcontent1') has-danger @enderror">
                                <label class="col-form-label" for="abcontent1">{{__('Content 1')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="abcontent1" name="abcontent1"
                                    placeholder="{{__('Content 1')}}" required>{{$abcontent1->value??old('abcontent1')}}</textarea>
                                <span id="helpabcontent1"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Content 1')])}}"
                                    class="text-danger">{{$errors->first('abcontent1')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('abimg3') has-danger @enderror">
                                <label class="col-form-label" for="abimg3">{{__('IMG 3')}}</label>
                                {!!imgApp($abimg3->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('abimg3')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 500x400px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="abimg3" name="abimg3"
                                    placeholder="{{__('IMG 3')}}"
                                    value="{{$abimg3->value}}">
                                    <span id="helpabimg1"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('IMG 3')])}}"
                                    class="text-danger">{{$errors->first('abimg3')}}</span>
                            </div>
                        </div>
						<div class="col-lg-6">
                            <div class="form-group @error('abimg4') has-danger @enderror">
                                <label class="col-form-label" for="abimg4">{{__('IMG 4')}}</label>
                                {!!imgApp($abimg4->value,[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button" onclick="openfile('abimg4')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 500x400px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="abimg4" name="abimg4"
                                    placeholder="{{__('IMG 3')}}"
                                    value="{{$abimg4->value}}">
                                    <span id="helpabimg2"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('IMG 4')])}}"
                                    class="text-danger">{{$errors->first('abimg4')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('abcontent2') has-danger @enderror">
                                <label class="col-form-label" for="abcontent2">{{__('Content 2')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="abcontent2" name="abcontent2"
                                    placeholder="{{__('Content 2')}}" required>{{$abcontent2->value??old('abcontent2')}}</textarea>
                                <span id="helpabcontent2"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Content 2')])}}"
                                    class="text-danger">{{$errors->first('abcontent2')}}</span>
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
