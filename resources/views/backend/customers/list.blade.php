@extends('backend.master')
@section('container')
<!-- start: page -->
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    {{-- <a href="{{route('product.create')}}" class="card-action text-success"><i class="fa fa-plus"></i>
                        Add new</a> --}}
                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                </div>
                <h2 class="card-title">{{$pagename}} ({{$list->total().' '.__('record')}})</h2>
            </header>
            <div class="card-body">
                {!!$list->columns([
                //'id'=>'#',
                'first_name'=>__('First Name'),
                'last_name'=>__('Last Name'),
                'email' => __('Email'),
                'phone' => __('Phone'),
                'cmnd'=>__('CMND'),
                'bonus_code' => __('Code'),
                'status'=>__('backend.columnname.status'),
                'created_at'=>__('Created At')
                ])
                ->displays([
                // 'image'=>[
                // 'type'=>'image',
                // 'func'=>'imgApp',
                // 'params'=>['image'],
                // 'content'=>'<a href="'.route('product.edit','|id|').'">{img}</a>'
                // ],
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
                'route'=>'customer.edit',
                'param'=>['id']
                ],
                [
                'name'=>'<i class="fas fa-trash"></i> '.__('backend.button.delete'),
                'attr'=>[
                'id'=>'btnxoa',
                'class'=>'btn btn-xs btn-outline-danger confirm '
                ],
                'route'=>'b.customer.destroy',
                'param'=>['id']
                ]
                ],
                'filter'=>[
                'first_name',
                'last_name',
                'email',
                'phone',
                'bonus_code',
                'cmnd'
                ]
                ])
                ->sortable(['first_name','last_name','email','phone','bonus_code', 'cmnd'])
                ->rownumber('No.',true)
                ->showPages($list)
                ->render()!!}
            </div>
        </section>
    </div>
</div>
<script>
    var _run = false;
    $(document).on('click','.btn-syncprice',function(){
            var _that = $(this),_apidata = _that.data('getdata'),_apisync =_that.data('sync');
            if(_apidata && _apisync){
                _that.loading();
                $.post(_apidata)
                .done(function(d){
                    localStorage.setItem("jsonsync", JSON.stringify(d.list));
                    $.alert({
                        title: 'Get price from AX system',
                        content: '<div class="form-group">'+d.msg+' <button data-api="'+_apisync+'" class="btn btn-run btn-sm btn-outline-success"><i class="fa fa-play"></i> Run</button></div><div class="progress form-group"> <div class="progress-bar bg-success progress-bar-striped text-center"style="width:0%;">0% </div> </div><div class="impmsg"></div>',
                        buttons:false,
                        onOpen: function () {
                            _run = true;
                        },
                        onClose: function () {
                            _run = false;
                        },
                    });
                    _that.finish('<i class="fas fa-sync-alt"></i>');
                })
                .fail(function(d){
                    $.alert(d.responseJSON.msg);
                    _that.finish('<i class="fas fa-sync-alt"></i>');
                })
                /**/
            }else{
                $.alert('Data sync not found');
            }
        });
        $(document).on('click','.btn-run',function(){
            var total = 0;
            var current = 0;
            var _that = $(this),_api = _that.data('api'),data = JSON.parse(localStorage.getItem('jsonsync')),total = data.length;
            if(_api && data )
            {
                _that.loading();
                run(0,data,function(){
                    _that.remove();//html('Execute').prop('disabled',false);
                    $.alert('Sync completed');
                },function(d){
                    current++;
                    var values =  parseInt((current/total)*100);
                    $('.progress-bar').css('width', values+'%').html(values+'%');
                    $('.impmsg').append('<div class="text text-'+d.status+'">'+d.msg+'</div>');
                    if(d.status=='success')
                    {
                        $('#price-'+d.id).html(d.price);
                    }
                },_api);
            }else{
                $.alert('Data not found');
            }
        });
        function run(i,d,o,h,api)
        {
            if(_run)
            {
                var item = d[i];
                if(typeof item != 'undefined')
                {
                    $.post(api,{item:item})
                    .done(function(dd){
                        h(dd);
                    })
                    .always(function(){
                        ++i;
                        run(i,d,o,h,api);
                    })
                }else{
                    o();
                }
            }
        }
</script>
@endsection
