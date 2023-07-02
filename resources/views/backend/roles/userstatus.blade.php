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

                <h2 class="card-title">{!! __('Select status for :name', ['name' => $user->username])!!}</h2>
                <p class="card-subtitle">{!!__('Please select the status to grant permissions, the administrative rights will depend on the rights in the group')!!}</p>
            </header>
            <div class="card-body">
                <div id="treeRole">
                    <ul>
                        <li class="folder" data-jstree='{ "opened" : true }'>
                            Status Order
                            <ul>
                                @foreach ($status as $item)
                                @php $checked =  \App\Model\AccessStatus::checked($item->id, $user->id, 0) ? ' ,"selected" : true' : ''; @endphp
                                <li data-func-id="{{$item->id}}" data-jstree='{ "icon" : "fa fa-book","opened" : true {{$checked}}}'>
                                    <span>{{$item->label}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-sm btn-default " href="{{route('b.role.users')}}"><i class="fas fa-reply"></i> {{__('backend.button.cancel')}}</a>
                <button class="btn btn-sm btn-primary setroleuser" data-href="{{route('b.role.setuserstatus',$user->id)}}"><i class="fas fa-save"></i> {{__('backend.button.save')}}</button>
            </div>
        </section>
    </div>
</div>
@endsection
