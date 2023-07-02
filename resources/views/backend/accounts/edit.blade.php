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
                <form class="p-3 needs-validation" method="POST" action="{{route('b.account.update',$quantri->id)}}" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <div class="form-group @error('ten') has-danger @enderror">
                                <label class="col-form-label" for="ten">{{__('Tên')}}</label>
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="{{__('Tên')}}"
                                    required>
                                <span id="helten" data-msg="{{__('backend.validate.requied',['name'=>__('Tên')])}}"
                                    class="text-danger">{{$errors->first('ten')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group @error('username') has-danger @enderror">
                                <label class="col-form-label" for="username">{{__('Username')}}</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="{{__('Username')}}" required>
                                <span id="helusername"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Username')])}}"
                                    class="text-danger">{{$errors->first('username')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group @error('password') has-danger @enderror">
                                <label class="col-form-label" for="password">{{__('Password')}}</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="{{__('Password')}}" required>
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
                                    required="">
                                <span id="helemail" data-msg="{{__('backend.validate.requied',['name'=>__('Email')])}}"
                                    class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('phone') has-danger @enderror">
                                <label class="col-form-label" for="phone">{{__('Số điện thoại')}}</label>
                                <i class="fas fa-phone"></i>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="{{__('Số điện thoại')}}" required>
                                <span id="helphone"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Số điện thoại')])}}"
                                    class="text-danger">{{$errors->first('phone')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label for="group">{{__('Nhóm quản trị')}}</label>
                            <select id="group" name="group" class="form-control" required>
                                @foreach ($groups as $gr)
                                    <option value="{{$gr->id}}">{{$gr->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="trangthai">{{__('Trạng thái')}}</label>
                            <div class="col-lg-6" style="align-self: center;">
                                <label> <input type="radio" value="1" name="trangthai" checked>
                                    <i></i>
                                    {{__('Hoạt động')}}</label>
                                <label class="ml-3"> <input type="radio" value="2" name="trangthai">
                                    <i></i>
                                    {{__('Khóa')}}</label>
                                <label class="ml-3"> <input type="radio" value="0" name="trangthai">
                                    <i></i>
                                    {{__('Dừng')}}</label>
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method('PUT')
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
