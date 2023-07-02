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
                <form class="p-3 needs-validation" method="POST" action="{{$action}}" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('ten') has-danger @enderror">
                                <label class="col-form-label" for="ten">{{__('Name')}}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{__('Name')}}"
                                    required value="{{$item->name??old('name')}}">
                                <span id="helten" data-msg="{{__('backend.validate.requied',['name'=>__('Name')])}}"
                                    class="text-danger">{{$errors->first('ten')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('StoreID') has-danger @enderror">
                                <label class="col-form-label" for="Store ID">{{__('Store ID')}}</label>
                                <select  class="form-control" id="StoreID" name="StoreID" required>
                                    @foreach ($stores as $stitem)
                                    <option @if (isset($item->StoreID) && $item->StoreID == $stitem->StoreID)
                                        selected
                                    @endif value="{{$stitem->StoreID}}">{{$stitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpStoreID"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Store ID')])}}"
                                    class="text-danger">{{$errors->first('StoreID')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('username') has-danger @enderror">
                                <label class="col-form-label" for="username">{{__('Username')}}</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="{{__('Username')}}" required  value="{{$item->username??old('username')}}">
                                <span id="helusername"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Username')])}}"
                                    class="text-danger">{{$errors->first('username')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('password') has-danger @enderror">
                                <label class="col-form-label" for="password">{{__('Password')}}</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="{{__('Password')}}" @if ($method!='PUT')
                                    required
                                    @endif >
                                <span id="helpassword"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Password')])}}"
                                    class="text-danger">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('email') has-danger @enderror">
                                <label class="col-form-label" for="email">{{__('Email')}}</label>
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" class="form-control" placeholder="eg.: email@email.com"
                                    required="" value="{{$item->email??old('email')}}">
                                <span id="helemail" data-msg="{{__('backend.validate.requied',['name'=>__('Email')])}}"
                                    class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('phone') has-danger @enderror">
                                <label class="col-form-label" for="phone">{{__('Phone')}}</label>
                                <i class="fas fa-phone"></i>
                                <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="{{__('Phone')}}" required value="{{$item->phone??old('phone')}}">
                                <span id="helphone"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Phone')])}}"
                                    class="text-danger">{{$errors->first('phone')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('group_id') has-danger @enderror">
                                <label class="col-form-label" for="Group ID">{{__('Group ID')}}</label>
                                <select  class="form-control" id="group_id" name="group_id" required>
                                    @foreach ($groups as $bitem)
                                    <option @if (isset($item->group_id) && $item->group_id == $bitem->id)
                                        selected
                                    @endif value="{{$bitem->id}}">{{$bitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpgroup_id"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Group ID')])}}"
                                    class="text-danger">{{$errors->first('group_id')}}</span>
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
                    @csrf
                    @method($method)
                    <div class="form-group row">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('b.account.list')}}" class="btn btn-sm btn-default"><i class="fa fa-reply"></i>
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
