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
            {!!msg(session('msg'),session('type'))!!}
            <div class="card-body">
                <form class="p-3 needs-validation" method="POST" action="{{route('b.account.group.update',$group->id)}}" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('ten') has-danger @enderror">
                                <label class="col-form-label" for="ten">{{__('Tên nhóm')}}</label>
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="{{__('Tên nhóm')}}"
                            required value="{{$group->name}}">
                                <span id="helten" data-msg="{{__('backend.validate.requied',['name'=>__('Tên nhóm')])}}"
                                    class="text-danger">{{$errors->first('ten')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('mota') has-danger @enderror">
                                <label class="col-form-label" for="mota">{{__('Mô tả nhóm')}}</label>
                                <textarea type="mota" name="mota" class="form-control"
                                    required="">{{$group->description}}</textarea>
                                <span id="helmota" data-msg="{{__('backend.validate.requied',['name'=>__('Mô tả nhóm')])}}"
                                    class="text-danger">{{$errors->first('mota')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <label for="trangthai">{{__('Trạng thái')}}</label>
                            <div class="col-lg-6" style="align-self: center;">
                                <label> <input type="radio" value="1" name="trangthai"
                                    @if ($group->status == 1)
                                        checked
                                    @endif>
                                    <i></i>
                                    {{__('Hoạt động')}}</label>
                                <label class="ml-3"> <input type="radio" value="2" name="trangthai"
                                    @if ($group->status == 2)
                                    checked
                                    @endif>
                                    <i></i>
                                    {{__('Khóa')}}</label>
                                <label class="ml-3"> <input type="radio" value="0" name="trangthai"
                                    @if ($group->status == 0)
                                    checked
                                    @endif>
                                    <i></i>
                                    {{__('Dừng')}}</label>
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('b.account.group')}}" class="btn btn-sm btn-default"><i class="fa fa-reply"></i>
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
