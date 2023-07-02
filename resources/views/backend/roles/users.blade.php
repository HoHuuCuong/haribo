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
                <h2 class="card-title">{{__('backend.pagename.roleusers')}} ({{$users->total().' '.__('record')}})</h2>
            </header>
            <div class="card-body">
                {!!$users->columns([
                    'id'=>'#',
                    'username'=>__('backend.columnname.username'),
                    'name'=>__('backend.columnname.name'),
                    'groupname'=>__('backend.columnname.groupname'),
                    ])
                    ->actions([
                        'do'=>[
                            [
                                'name'=>'<i class="fas fa-edit"></i> '.__('backend.button.setrole'),
                                'attr'=>[
                                    'id'=>'btnsua',
                                    'class'=>'btn btn-xs btn-outline-primary'
                                ],
                                'route'=>'b.role.user',
                                'param'=>['id']
                            ],
                            // [
                            //     'name'=>'<i class="fas fa-edit"></i> '.__('Access status'),
                            //     'attr'=>[
                            //         'id'=>'btnsua2',
                            //         'class'=>'btn btn-xs btn-outline-success'
                            //     ],
                            //     'route'=>'b.role.userstatus',
                            //     'param'=>['id']
                            // ]
                        ]
                    ])
                    ->attributes([
                    'id' => 'table-role-users',
                    ])
                    ->sortable(array('id', 'name','username','groupname'=>'group_id'))
                    ->showPages($users)
                    ->render()!!}
            </div>
        </section>
    </div>
</div>
@endsection
