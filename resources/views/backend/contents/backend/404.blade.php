@extends('backend.master')
@section('container')
<section class="body-error error-inside">
    <div class="center-error">

        <div class="row">
            <div class="col-lg-8">
                <div class="main-error mb-3">
                    <h2 class="error-code text-dark text-center font-weight-semibold m-0">404 <i class="fas fa-file"></i></h2>
                    <p class="error-explanation text-center">{{__('backend.404.content')}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 class="text">{{__('backend.404.suggest')}}</h4>
                <ul class="nav nav-list flex-column primary">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('b.home')}}"><i class="fas fa-caret-right text-dark"></i> {{__('backend.function.dashboard')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('b.account.profile')}}"><i class="fas fa-caret-right text-dark"></i> {{__('backend.function.profile')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('b.account.logout')}}"><i class="fas fa-caret-right text-dark"></i> {{__('backend.function.logout')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
