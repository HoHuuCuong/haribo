@extends('backend.master')
@section('container')
<!-- start: page -->
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="{{route('category.create')}}" class="card-action text-success" ><i class="fa fa-plus"></i> Add new</a>
                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                </div>
                <h2 class="card-title">{{$pagename}} ({{$list->total().' '.__('record')}})</h2>
            </header>
            <div class="card-body">
                {!!$list->columns([
                'id'=>'#',
                'image' => __('Image'),
                'name' => __('Name'),
                'parentname' => __('Parent'),
                'storename' => __('Store'),
                'status'=>__('backend.columnname.status'),
                'pos'=>__('Position')
                ])
                ->displays([
                    'image'=>[
                        'type'=>'image',
                        'func'=>'imgApp',
                        'params'=>['image'],
                        'content'=>'<a href="'.route('category.edit','|id|').'">{img}</a>'
                    ],
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
                'route'=>'category.edit',
                'param'=>['id']
                ],
                [
                'name'=>'<i class="fas fa-trash"></i> '.__('backend.button.delete'),
                'attr'=>[
                'id'=>'btnxoa',
                'class'=>'btn btn-xs btn-outline-danger confirm '
                ],
                'route'=>'b.category.destroy',
                'param'=>['id']
                ]
                ],
                'filter'=>[
                'name'
                ]
                ])
               // ->rownumber('No.',true)
                ->showPages($list)
                ->render()!!}
            </div>
        </section>
    </div>
</div>
@endsection
