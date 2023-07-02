@extends('backend.master')
@section('container')
<!-- start: page -->
<div class="row">
    {!!msg(session('msg'),session('type'),session('title'))!!}
    <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
        <section class="card">
            <div class="card-body">
                <div class="thumb-info mb-3">
                    <img src="{{imgBackend($user->avatar,[],0,0,true)}}" class="rounded img-fluid"
                alt="{{$user->name}}">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner">{{$user->name}}</span>
                        <span class="thumb-info-type">{{$user->groupname}}</span>
                    </div>
                </div>
                <hr class="dotted short">

                <h5 class="mb-2 mt-3">{{__('backend.profile.about')}}</h5>
                <p class="text-2"></p>
                <div class="clearfix">
                    <a class="text-uppercase text-muted float-right" href="#">({{__('backend.button.viewall')}})</a>
                </div>

                <hr class="dotted short">

                <div class="social-icons-list">
                    <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com/"
                        data-original-title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                    <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com/"
                        data-original-title="Twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                    <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com/"
                        data-original-title="Linkedin"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
                </div>

            </div>
        </section>
    </div>
    <div class="col-lg-8 col-xl-6">
        @php
        $active1 = $errors->any()?'':'active';
        $active2 = $errors->any()?'active':'';
        @endphp
        <div class="tabs">
            <ul class="nav nav-tabs tabs-primary">
            <li class="nav-item {{$active1}}">
                    <a class="nav-link {{$active1}}" href="#overview"
                        data-toggle="tab">{{__('backend.pagename.dashboard')}}</a>
                </li>
                <li class="nav-item {{$active2}}">
                    <a class="nav-link {{$active2}}" href="#edit" data-toggle="tab">{{__('backend.button.edit')}}</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="overview" class="tab-pane {{$active1}}">

                    <div class="p-3">
                        <h4 class="mb-3 pt-4">{{__('backend.profile.timeline')}}</h4>

                        <div class="timeline timeline-simple mt-3 mb-3">
                            <div class="tm-body">
                                <div class="tm-title">
                                    <h5 class="m-0 pt-2 pb-2 text-uppercase">Tháng 10 2019</h5>
                                </div>
                                <ol class="tm-items">
                                    <li>
                                        <div class="tm-box">
                                            <p class="text-muted mb-0">7 phút trước.</p>
                                            <p>
                                                Làm gì đó
                                            </p>
                                            <div class="thumbnail-gallery">
                                                <a class="img-thumbnail lightbox" href="{{asset('public/backend/img/projects/project-4.jpg')}}"
                                                    data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                                                    <img class="img-fluid" width="215" src="{{asset('public/backend/img/projects/project-4.jpg')}}">
                                                    <span class="zoom">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="edit" class="tab-pane {{$active2}}">
                    <form class="p-3 needs-validation" method="POST" action="{{route('b.account.profilepost')}}" novalidate>
                        <h4 class="mb-3">{{__('backend.profile.infotitle')}}</h4>
                        <div class="form-group @error('name') has-danger @enderror">
                            <label for="name">{{__('backend.label.name')}}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{$user->name}}"
                                placeholder="{{__('backend.label.name')}}" required>
                            <span id="helpname" data-msg="{{__('backend.validate.requied',['name'=>__('backend.label.name')])}}" class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 @error('email') has-danger @enderror">
                                <label for="email">{{__('backend.label.email')}}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{$user->email}}"
                                    placeholder="{{__('backend.label.email')}}"
                                    data-regix="{{HD::REGIX_EMAIL}}"
                                    required
                                    >
                                    <span id="helpemail" data-msg="{{__('backend.validate.regix',['name'=>__('backend.label.email')])}}" class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group col-md-6  @error('phone') has-danger @enderror">
                                <label for="phone">{{__('backend.label.phone')}}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{$user->phone}}"
                                    placeholder="{{__('backend.label.phone')}}"
                                    data-regix="{{HD::REGIX_PHONE}}"
                                    required>
                                    <span id="helpphone" data-msg="{{__('backend.validate.regix',['name'=>__('backend.label.phone')])}}" class="text-danger">{{$errors->first('phone')}}</span>
                            </div>
                        </div>
                        <hr class="dotted tall mt-3 mb-3">

                        <h4 class="mb-3">{{__('backend.pagename.changepass')}}</h4>
                        <div class="form-row">
                            <div class="form-group col-md-12  @error('oldpwd') has-danger @enderror">
                                <label for="oldpwd">{{__('backend.label.oldpassword')}}</label>
                                <input type="password" class="form-control" id="oldpwd" name="oldpwd"
                                    placeholder="{{__('backend.label.oldpassword')}}"
                                    >
                                    <span id="helpoldpwd" data-msg="{{__('backend.validate.passhightlv',['name'=>__('backend.label.oldpassword')])}}" class="text-danger">{{$errors->first('oldpwd')}}</span>
                            </div>
                            <div class="form-group col-md-6  @error('pwd') has-danger @enderror">
                                <label for="pwd">{{__('backend.label.password')}}</label>
                                <input type="password" class="form-control" id="pwd"  name="pwd"
                                    placeholder="{{__('backend.label.password')}}"
                                    >
                                <span id="helppwd" data-msg="{{__('backend.validate.passhightlv',['name'=>__('backend.label.password')])}}" class="text-danger">{{$errors->first('pwd')}}</span>
                            </div>
                            <div class="form-group col-md-6 @error('pwd_confirmation') has-danger @enderror">
                                <label for="pwd_confirmation">{{__('backend.label.confirm')}}</label>
                                <input type="password" class="form-control" id="pwd_confirmation" name="pwd_confirmation"
                                    placeholder="{{__('backend.label.confirm')}}">
                                    <span id="helppwd_confirmation" data-msg="{{__('backend.validate.confirmed',['name'=>__('backend.label.confirm'),'parent'=>__('backend.label.password')])}}" class="text-danger">{{$errors->first('pwd_confirmation')}}</span>
                            </div>
                        </div>
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-12 text-right mt-3">
                                <button class="btn btn-primary btn-sm confirm" data-q-title="{{__('backend.pagename.profile')}}"
                                data-q-content="{{__('backend.confirm.profile')}}"
                                >{{__('backend.button.save')}}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">

        <h4 class="mb-3 mt-0">{{__('backend.profile.moneystatus')}}</h4>
        <ul class="simple-card-list mb-3">
            <li class="primary">
                <h3>488</h3>
                <p class="text-light">Nullam quris ris.</p>
            </li>
            <li class="primary">
                <h3>$ 189,000.00</h3>
                <p class="text-light">Nullam quris ris.</p>
            </li>
            <li class="primary">
                <h3>16</h3>
                <p class="text-light">Nullam quris ris.</p>
            </li>
        </ul>

        <h4 class="mb-3 mt-4 pt-2">{{__('backend.profile.log')}}</h4>
        <ul class="simple-bullet-list mb-3">
            <li class="red">
                <span class="title">Porto Template</span>
                <span class="description truncate">Lorem ipsom dolor sit.</span>
            </li>
            <li class="green">
                <span class="title">Tucson HTML5 Template</span>
                <span class="description truncate">Lorem ipsom dolor sit amet</span>
            </li>
            <li class="blue">
                <span class="title">Porto HTML5 Template</span>
                <span class="description truncate">Lorem ipsom dolor sit.</span>
            </li>
            <li class="orange">
                <span class="title">Tucson Template</span>
                <span class="description truncate">Lorem ipsom dolor sit.</span>
            </li>
        </ul>
    </div>
    @endsection
