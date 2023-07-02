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

                <h2 class="card-title">{!! __('backend.pagename.rolegroup :name', ['name' => $group->name])!!}</h2>
                <p class="card-subtitle">{!!__('backend.role.note')!!}</p>
            </header>
            <div class="card-body">
                <div id="treeRole">
                    <ul>
                        {!!createFunsHtml(0,$group->id)!!}
                        {!!createFunsHtml(0,$group->id,'frontend')!!}
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-sm btn-default " href="{{route('b.role.groups')}}"><i class="fas fa-reply"></i> {{__('backend.button.cancel')}}</a>
                <button class="btn btn-sm btn-primary setrolegroup" data-href="{{route('b.role.setgroup',$group->id)}}"><i class="fas fa-save"></i> {{__('backend.button.save')}}</button>
            </div>
        </section>
    </div>
</div>
@endsection
