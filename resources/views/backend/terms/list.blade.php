@extends('backend.master')
@section('container')
<!-- start: page -->
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="{{route('faq.create')}}" class="card-action text-success" ><i class="fa fa-plus"></i> Add new</a>
                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                </div>
                <h2 class="card-title">{{$pagename}} ({{$list->total().' '.__('record')}})</h2>
            </header>
            <div class="card-body">
                {!!$list->columns([
                //'id'=>'#',
                'name' => __('Question'),
                'content' => __('Answer'),
                'created_at'=>__('Created At'),
                'updated_at'=>__('Updated At')
                ])
                ->actions([
                'do'=>[
                [
                'name'=>'<i class="fas fa-edit"></i> '.__('backend.button.edit'),
                'attr'=>[
                'id'=>'btnsua',
                'class'=>'btn btn-xs btn-outline-primary'
                ],
                'route'=>'faq.edit',
                'param'=>['id']
                ],
                [
                'name'=>'<i class="fas fa-trash"></i> '.__('backend.button.delete'),
                'attr'=>[
                'id'=>'btnxoa',
                'class'=>'btn btn-xs btn-outline-danger confirm '
                ],
                'route'=>'b.faq.destroy',
                'param'=>['id']
                ]
                ],
                'filter'=>[
                'name'
                ]
                ])
                ->rownumber('No.',true)
                ->showPages($list)
                ->render()!!}
            </div>
        </section>
    </div>
</div>
@endsection
