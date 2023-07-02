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
                <h2 class="card-title">{{$pagename}} ({{$list->total().' '.__('record')}})</h2>
            </header>
            <div class="card-body">
                {!!$list->columns([
                //'id'=>'#',
                'api'=>__('API'),
                'body' => __('Body'),
                'rpbody' => __('RP Body'),
                'actor'=>__('Actor'),
                'created_at'=>__('Created At')
                ])
                ->actions([
                'do'=>[
                [
                'name'=>'<i class="fas fa-trash"></i> '.__('backend.button.delete'),
                'attr'=>[
                'id'=>'btnxoa',
                'class'=>'btn btn-xs btn-outline-danger confirm '
                ],
                'route'=>'b.apilog.delete',
                'param'=>['id']
                ]
                ],
                'filter'=>[
                'actor',
                'api',
                'body',
                'rpbody'
                ]
                ])
                ->displays(['body'=>[
                    'type'=>'html',
                    'content'=>'<textarea class="form-control " style="width:200px" rows="3">|body|</textarea>'
                ]])
                ->rownumber('No.',true)
                ->sortable(['created_at'])
                ->showPages($list)
                ->render()!!}
            </div>
        </section>
    </div>
</div>
@endsection
