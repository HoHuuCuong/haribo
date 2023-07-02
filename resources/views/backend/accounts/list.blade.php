@extends('backend.master')
@section('container')
<!-- start: page -->
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="{{route('b.account.add')}}" class="card-action text-success" ><i class="fa fa-plus"></i> Add new</a>
                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                </div>
                <h2 class="card-title">{{__('backend.pagename.roleusers')}} ({{$users->total().' '.__('record')}})</h2>
            </header>
            <div class="card-body">
                {!!$users->columns([
                'id'=>'#',
                'avatar'=>__('backend.columnname.image'),
                'username'=>__('backend.columnname.username'),
                'name'=>__('backend.columnname.name'),
                'groupname'=>__('backend.columnname.groupname'),
                'status'=>__('backend.columnname.status'),
                'created_at'=>__('backend.columnname.created'),
                ])
                ->displays([
                'status'=>[
                'type'=>'switch',
                'case'=>[
                1=>'<span class="badge badge-success ajax-action" data-id="|id|"
                    data-ajaction="change-status">'.__('backend.status.active').'</span>',
                2=>'<span class="badge badge-dark ajax-action" data-id="|id|"
                    data-ajaction="change-status">'.__('backend.status.lock').'</span>',
                0=>'<span class="badge badge-danger ajax-action" data-id="|id|"
                    data-ajaction="change-status">'.__('backend.status.unactive').'</span>'
                ]
                ],
                'username'=>[
                'type'=>'html',
                'content'=>'<a href="'.route('b.account.edit','|id|').'">|username|</a>'
                ],
                'avatar'=>[
                'type'=>'image',
                'func'=>'imgBackend',
                'params'=>['avatar'],
                'content'=>'<a href="'.route('b.account.edit','|id|').'">{img}</a>'
                ]
                ])
                ->actions([
                'do'=>[
                [
                'name'=>'<i class="fas fa-edit"></i> '.__('backend.button.edit'),
                'attr'=>[
                'id'=>'btnsua',
                'class'=>'btn btn-xs btn-outline-primary'
                ],
                'route'=>'b.account.edit',
                'param'=>['id']
                ],
                [
                'name'=>'<i class="fas fa-trash"></i> '.__('backend.button.delete'),
                'attr'=>[
                'id'=>'btnxoa',
                'class'=>'btn btn-xs btn-outline-danger confirm '
                ],
                'route'=>'b.account.del',
                'param'=>['id']
                ]
                ]
                ])
                ->attributes([
                'id' => 'table-users',
                ])
                ->sortable(array('id', 'name','username','groupname'=>'group_id','status','created_at'))
                ->showPages($users)
                ->render()!!}
            </div>
        </section>
    </div>
</div>
@endsection
