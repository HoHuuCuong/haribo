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
                        <div class="col-lg-12">
                            <div class="form-group @error('title1') has-danger @enderror">
                                <label class="col-form-label" for="title1">{{__('Title 1')}}</label>
                                <input type="text" class="form-control" id="title1" name="title1"
                                    placeholder="{{__('Title 1')}}"  value="{{$title1->value??old('title1')}}">
                                <span id="helptitle1" data-msg="{{__('backend.validate.requied',['name'=>__('Title 1')])}}"
                                    class="text-danger">{{$errors->first('title1')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('box1') has-danger @enderror">
                                <label class="col-form-label" for="box1">{{__('Content 1')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="box1" name="box1"
                                    placeholder="{{__('Content 1')}}" required>{{$box1->value??old('box1')}}</textarea>
                                <span id="helpbox1"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Content 1')])}}"
                                    class="text-danger">{{$errors->first('box1')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('title2') has-danger @enderror">
                                <label class="col-form-label" for="title2">{{__('Title 2')}}</label>
                                <input type="text" class="form-control" id="title2" name="title2"
                                    placeholder="{{__('Title 2')}}"  value="{{$title2->value??old('title2')}}">
                                <span id="helptitle2" data-msg="{{__('backend.validate.requied',['name'=>__('Title 2')])}}"
                                    class="text-danger">{{$errors->first('title2')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('box2') has-danger @enderror">
                                <label class="col-form-label" for="box2">{{__('Content 2')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="box2" name="box2"
                                    placeholder="{{__('Content 2')}}" required>{{$box2->value??old('box2')}}</textarea>
                                <span id="helpbox2"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Content 2')])}}"
                                    class="text-danger">{{$errors->first('box2')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('title3') has-danger @enderror">
                                <label class="col-form-label" for="title3">{{__('Title 3')}}</label>
                                <input type="text" class="form-control" id="title3" name="title3"
                                    placeholder="{{__('Title 3')}}"  value="{{$title3->value??old('title3')}}">
                                <span id="helptitle3" data-msg="{{__('backend.validate.requied',['name'=>__('Title 3')])}}"
                                    class="text-danger">{{$errors->first('title3')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('box3') has-danger @enderror">
                                <label class="col-form-label" for="box3">{{__('Content 3')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="box3" name="box3"
                                    placeholder="{{__('Content 3')}}" required>{{$box3->value??old('box3')}}</textarea>
                                <span id="helpbox3"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Content 3')])}}"
                                    class="text-danger">{{$errors->first('box3')}}</span>
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
