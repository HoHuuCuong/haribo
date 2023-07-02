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
                            @foreach ($langs as $lang)
                            <li class="nav-item @if($lang->default) active @endif">
                                <a class="nav-link" href="#{{$lang->code}}" data-toggle="tab">@if($lang->default) <i class="fas fa-star"></i> @endif
                                {{$lang->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($langs as $lang)
                            <div id="{{$lang->code}}" class="tab-pane @if($lang->default) active @endif">
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <div class="form-group @error($lang->code.'_name') has-danger @enderror">
                                            <label class="col-form-label" for="{{$lang->code.'_'}}name">{{__('Name')}}</label>
                                            <input  type="text" class="form-control" id="{{$lang->code.'_'}}name" name="{{$lang->code.'_'}}name"
                                                placeholder="{{__('Name')}}" required
                                                value="{{isset($item)&& $item->translate($lang->code)?$item->translate($lang->code)->name:old($lang->code.'_name')}}">

                                            <span id="help{{$lang->code.'_'}}name"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Name')])}}"
                                                class="text-danger">{{$errors->first($lang->code.'_name')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group @error($lang->code.'_image') has-danger @enderror">
                                            <label class="col-form-label" for="{{$lang->code}}_image">{{__('Image')}}</label>
                                            {!!imgApp(isset($item)&& $item->translate($lang->code)?$item->translate($lang->code)->image:old($lang->code.'_image'),[],100)!!}
                                            <button class="btn btn-sm btn-primary" type="button" onclick="openfile('{{$lang->code.'_'}}image')">{{__('Select Image')}}</button>
                                            <br>{{__('square dimensions (e.g. 600x600px)')}}<br>{{__('PNG,JPG format')}}
                                            <input type="hidden" class="form-control" id="{{$lang->code}}_image" name="{{$lang->code}}_image"
                                                placeholder="{{__('Image')}}"
                                                value="{{isset($item)&& $item->translate($lang->code)?$item->translate($lang->code)->image:old($lang->code.'_image')}}">
                                                <span id="help{{$lang->code.'_'}}image"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Image')])}}"
                                                class="text-danger">{{$errors->first($lang->code.'_image')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="form-group @error($lang->code.'_content') has-danger @enderror">
                                            <label class="col-form-label" for="{{$lang->code.'_'}}content">{{__('Content')}}</label>
                                            <textarea rows="10" class="form-control ckeditor" id="{{$lang->code.'_'}}content" name="{{$lang->code.'_'}}content"
                                                placeholder="{{__('Content')}}" required>{{isset($item) && $item->translate($lang->code)?$item->translate($lang->code)->content:old($lang->code.'_content')}}</textarea>
                                            <span id="help{{$lang->code.'_'}}content"
                                                data-msg="{{__('backend.validate.requied',['name'=>__('Content')])}}"
                                                class="text-danger">{{$errors->first($lang->code.'_content')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('store_id') has-danger @enderror">
                                <label class="col-form-label" for="store_id">{{__('Store ID')}}</label>
                                <select class="form-control" data-cat="0" data-api="{{route('b.ajax.getcategories')}}"  data-id="0"  id="store_id" name="store_id" required>
                                    @foreach ($stores as $bitem)
                                    <option @if (isset($item->store_id) && $item->store_id == $bitem->id)
                                        selected
                                        @endif value="{{$bitem->id}}">{{$bitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpstore_id"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Store ID')])}}"
                                    class="text-danger">{{$errors->first('store_id')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('category_id') has-danger @enderror">
                                <label class="col-form-label" for="category_id">{{__('Category ID')}}</label>
                                <select data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Select a Category", "allowClear": true }' id="category_id" name="category_id" required>
                                    @foreach ($categories as $bitem)
                                    <option @if (isset($item->category_id) && $item->category_id == $bitem->id)
                                        selected
                                        @endif value="{{$bitem->id}}">{{$bitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpcategory_id"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Category ID')])}}"
                                    class="text-danger">{{$errors->first('category_id')}}</span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('item_id') has-danger @enderror">
                                <label class="col-form-label" for="item_id">{{__('Item ID')}}</label>
                                <input type="text" class="form-control" id="item_id" name="item_id"
                                    placeholder="{{__('Item ID')}}"  value="{{$item->item_id??old('item_id')}}">
                                <span id="helpitem_id" data-msg="{{__('backend.validate.requied',['name'=>__('Item ID')])}}"
                                    class="text-danger">{{$errors->first('item_id')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('parent_code') has-danger @enderror">
                                <label class="col-form-label" for="parent_code">{{__('Parent Code')}}</label>
                                <input type="text" class="form-control" id="parent_code" name="parent_code"
                                    placeholder="{{__('Parent Code')}}"  value="{{$item->parent_code??old('parent_code')}}">
                                <span id="helpparent_code" data-msg="{{__('backend.validate.requied',['name'=>__('Parent Code')])}}"
                                    class="text-danger">{{$errors->first('parent_code')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('menu_code') has-danger @enderror">
                                <label class="col-form-label" for="menu_code">{{__('Menu Code')}}</label>
                                <input type="text" class="form-control" id="menu_code" name="menu_code"
                                    placeholder="{{__('Menu Code')}}"  value="{{$item->menu_code??old('menu_code')}}">
                                <span id="helpmenu_code" data-msg="{{__('backend.validate.requied',['name'=>__('Menu Code')])}}"
                                    class="text-danger">{{$errors->first('menu_code')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('price') has-danger @enderror">
                                <label class="col-form-label" for="price">{{__('Price')}}</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    placeholder="{{__('Price')}}"  value="{{$item->price??old('price')}}">
                                <span id="helpprice" data-msg="{{__('backend.validate.requied',['name'=>__('Price')])}}"
                                    class="text-danger">{{$errors->first('price')}}</span>
                            </div>
                        </div>

                    </div> --}}
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
