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
                <h2 class="card-title">{{__('backend.pagename.rolegroups')}} ({{$groups->total().' '.__('record')}})</h2>
            </header>
            <div class="card-body">
                {!!$groups->columns([
                    'id'=>'#',
                    'name'=>__('backend.columnname.name'),
                    ])
                    ->actions([
                        'do'=>[
                            [
                                'name'=>'<i class="fas fa-edit"></i> '.__('backend.button.setrole'),
                                'attr'=>[
                                    'id'=>'btnsua',
                                    'class'=>'btn btn-xs btn-outline-primary'
                                ],
                                'route'=>'b.role.group',
                                'param'=>['id']
                            ],
                            // [
                            //     'name'=>'<i class="fas fa-edit"></i> '.__('Access status'),
                            //     'attr'=>[
                            //         'id'=>'btnsua2',
                            //         'class'=>'btn btn-xs btn-outline-success'
                            //     ],
                            //     'route'=>'b.role.groupstatus',
                            //     'param'=>['id']
                            // ]
                        ]
                    ])
                    ->attributes([
                    'id' => 'table-role-groups',
                    ])
                    ->sortable(array('id', 'name'))
                    ->showPages($groups)
                    ->render()!!}
            </div>
        </section>
    </div>
</div>
@endsection
