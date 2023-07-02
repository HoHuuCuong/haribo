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
                            <div class="form-group @error('name') has-danger @enderror">
                                <label class="col-form-label" for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control" id="name"
                                    name="name" placeholder="{{__('Name')}}" required
                                    value="{{old('name',$item->name??'')}}">

                                <span id="helpname"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Name')])}}"
                                    class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('image') has-danger @enderror">
                                <label class="col-form-label" for="image">{{__('Image')}}</label>
                                {!!imgApp($item->image??'',[],100)!!}
                                <button class="btn btn-sm btn-primary" type="button"
                                    onclick="openfile('image')">{{__('Select Image')}}</button>
                                <br>{{__('square dimensions (e.g. 600x600px)')}}<br>{{__('PNG,JPG format')}}
                                <input type="hidden" class="form-control" id="image"
                                    name="image" placeholder="{{__('Image')}}"
                                    value="{{$item->image??''}}">
                                <span id="helpimage"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Image')])}}"
                                    class="text-danger">{{$errors->first('image')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('content') has-danger @enderror">
                                <label class="col-form-label" for="content">{{__('Content')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="content"
                                    name="content" placeholder="{{__('Content')}}"
                                    required>{{$item->content??''}}</textarea>
                                <span id="helpcontent"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Content')])}}"
                                    class="text-danger">{{$errors->first('content')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="is_new">
                            <input type="checkbox" @if(isset($item->is_new) && $item->is_new ==1) checked @endif class="form-check-input" name="is_new" id="is_new" value="1" >
                            New product
                        </label>
                    </div>
                    <div class="row form-group">
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
                                    placeholder="{{__('Position')}}" required value="{{$item->pos??(old('pos')??1)}}">
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
                            <a href="{{route('product.index')}}" class="btn btn-sm btn-default"><i
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
