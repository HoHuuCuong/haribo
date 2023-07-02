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
                <form class="p-3 needs-validation" method="POST" action="{{$action}}" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('ten') has-danger @enderror">
                                <label class="col-form-label" for="ten">{{__('Name')}}</label>
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="{{__('Name')}}"
                                    required value="{{$item->name??old('name')}}">
                                <span id="helten" data-msg="{{__('backend.validate.requied',['name'=>__('Name')])}}"
                                    class="text-danger">{{$errors->first('ten')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
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
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('mota') has-danger @enderror">
                                <label class="col-form-label" for="mota">{{__('Description')}}</label>
                                <textarea type="mota" name="mota" class="form-control"
                                    required="">{{$item->description??old('description')}}</textarea>
                                <span id="helmota" data-msg="{{__('backend.validate.requied',['name'=>__('Description')])}}"
                                    class="text-danger">{{$errors->first('mota')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">

                    </div>
                    @csrf
                    @method($method)
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
