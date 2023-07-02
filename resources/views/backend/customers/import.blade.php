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

                <h2 class="card-title">{{$pagename}}</h2>
            </header>

            {!!msg(session('msg'),session('type'))!!}
            <div class="card-body">
                <form action="" api-validate="{{route('b.product.validateitem')}}"
                    api-import="{{route('b.product.importpost')}}" method="post" id="import" name="import"
                    enctype="multipart/form-data">
                    <div class="form-row mb-3">
                        <div class="col-12">
                            <label for="store_id">Store ID:</label>
                            <select class="form-control" id="store_id" name="store_id">
                                @foreach ($stores as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-3 infile">
                        <label for="file">Excel file (maxsize: 2MB)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" onchange="ValidateSingleInput(this)"
                                name="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                        <small id="helpfile" class="text-danger"></small>
                        <a class="mt-3" href="{{asset('/download/items.xls')}}">Download Template</a>
                    </div>
                    <div class="text-danger">{{__('The system only records data in the first sheet of the import file.')}}</div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-sm btn-success btn-check">Check Data</button>
                    </div>
                    <div class="form-row result">
                        <label for="file">Results</label>
                        <div class="col-12 alert " id="kqrs">

                        </div>
                        <ul class="run">
                        </ul>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<script>
    var _validFileExtensions = [".xls", ".xlsx", ".csv"];
    var _apiimport = "";
    var total = 0;
    var current = 0;
    function ValidateSingleInput(oInput) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        $('.custom-file-label').html(sFileName);
                        break;
                    }
                }
                if (!blnValid) {
                    $.alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
        }
        $("form").submit(function(evt){
            evt.preventDefault();
            $('.btn-check').loading('Checking');
            var formData = new FormData($(this)[0]);
            var _api = $(this).attr('api-validate');
            setTimeout(function(){
                $.ajax({
                url: _api,
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function (response) {
                    if(response.status =='success')
                    {
                        total = response.data.length;
                        var data = '';
                        localStorage.setItem("jsonitem", response.data);
                        //$.each(response.data,function(i,v){
                            //data+=v.item_number+': '+v.posted_qty+'<br>';
                        //})
                        $('#kqrs').addClass('alert-success').removeClass('alert-danger')
                        .html('<h6>'+response.msg+'</h6>'+
                        '<div class="p-3 rprs"></div>'+
                        '<div class="text-right"><button type="button" class="btn btn-success btn-sm btn-run" data-api-getjson="{{route('b.product.getjsonitem')}}" data-api-import="{{route('b.product.importpost')}}">Execute</button></div>'
                        );
                        $('.btn-check').remove();
                        $('#file').val('');
                    }else{
                        $('.btn-check').html('Check Data').prop('disabled',false);
                        $('#kqrs').addClass('alert-danger').removeClass('alert-success')
                        .html(response.msg);
                    }
                }
            });
        },100)
            return false;
        });
        $(document).on('click','.btn-run',function(){
            var _that = $(this), _task = _that.data('task'),_run = $('.run'),_progress = $('.result'),jsonName = localStorage.getItem('jsonitem');
            _run.empty(),_apiimport = _that.data('api-import'),_apigetdata =_that.data('api-getjson');
            _progress.append('<div class="progress form-control"> <div class="progress-bar bg-success progress-bar-striped"style="width:0%;">0% </div> </div><div class="impmsg"></div>');
            if(jsonName){
                $.post(_apigetdata,{'jsonName':jsonName})
                .done(function(d){
                    var data = JSON.parse(d),total = data.length;
                    _that.html('<i class="fa fa-spin fa-spinner"></i> Running').prop('disabled',true);
                    run(0,data,function(){
                        _that.remove();//html('Execute').prop('disabled',false);
                        $.alert('Import completed');
                    },function(d){
                        current++;
                        var values =  parseInt((current/total)*100);
                        $('.progress-bar').css('width', values+'%').html(values+'%');
                        $('.impmsg').prepend('<div class="text text-'+d.status+'">'+(current)+'. '+d.msg+'</div>');
                    },_apiimport);
                })
                /**/
            }else{
                $.alert('Data import not found');
            }
        });
        function run(i,d,o,h,api)
        {
            var item = d[i];
            if(typeof item != 'undefined')
            {
                $.post(api,{item:item})
                .done(function(dd){
                    h(dd);
                })
                .fail(function(dd){
                    var d = {msg:item.axcode+" "+dd.responseJSON.message,status:'danger'};
                    h(d);
                })
                .always(function(){
                   // delete d[i];
                    ++i;
                    run(i,d,o,h,api);
                })
            }else{
                o();
            }
        }
</script>
@endsection
