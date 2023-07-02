@extends('backend.empty')
@section('container')
<!-- start: page -->
<section class="body-sign">
        <div class="center-sign">
            <a href="{{route('b.home')}}" class="logo float-left">
                <img src="{{asset('/backend')}}/img/logo.png" height="54" alt="" />
            </a>

            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-right">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> {{__('backend.pagename.login')}}</h2>
                </div>
                <div class="card-body">
                {!!msg(session('msg'),session('type'))!!}
                <form action="{{route('b.account.login')}}" method="post">
                        <div class="form-group mb-3 @error('username') has-danger @enderror">
                            <label>{{__('backend.label.username')}}</label>
                            <div class="input-group ">
                                <input name="username" type="text" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </span>
                            </div>
                            @error('username')
                                <span class="help-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 @error('pwd') has-danger @enderror">
                            <div class="clearfix">
                                <label class="float-left">{{__('backend.label.password')}}</label>
                                <a href="pages-recover-password.html" class="float-right d-none">{{__('backend.label.lostpass')}}</a>
                            </div>
                            <div class="input-group">
                                <input name="pwd" type="password" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                            @error('pwd')
                            <span class="help-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input value="1" id="RememberMe" name="rememberme" type="checkbox"/>
                                    <label for="RememberMe">{{__('backend.label.remember')}}</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary mt-2">{{__('backend.button.login')}}</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-3 mb-3">&copy; Copyright {{date('Y')}}. All Rights Reserved. By Hiếu Nguyễn</p>
        </div>
    </section>
    <!-- end: page -->
@endsection
