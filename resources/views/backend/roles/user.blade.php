@extends('backend.master')
@section('container')
<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                </div>

                <h2 class="card-title">{!! __('backend.pagename.roleuser :name', ['name' => $user->username])!!}</h2>
                <p class="card-subtitle">{!!__('backend.role.note')!!}</p>
            </header>
            <div class="card-body">
                <div id="treeRole">
                    <ul>
                        {!!createFunsHtml($user->id)!!}
                        {!!createFunsHtml($user->id,0,'frontend')!!}
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-sm btn-default " href="{{route('b.role.users')}}"><i class="fas fa-reply"></i> {{__('backend.button.cancel')}}</a>
                <button class="btn btn-sm btn-primary setroleuser" data-href="{{route('b.role.setuser',$user->id)}}"><i class="fas fa-save"></i> {{__('backend.button.save')}}</button>
            </div>
        </section>
    </div>
</div>
@endsection
