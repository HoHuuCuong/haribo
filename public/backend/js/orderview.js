/* Add here all your JS customizations */
(function($) {
    var _oldStatus =$('#status_id').val();
    $('#status_id').change(function(){
        var _that = $(this),_val = _that.val(),_action = $('#actionstatus');//,_api = _that.data('api'),_ohtml = _that.html();
        if(_val != _oldStatus)
        {
            _action.removeClass('d-none');
        }else{
            _action.addClass('d-none');
        }
    });
    $('.btncancelstatus').click(function(){
        $('#status_id').val(_oldStatus);
        $('#actionstatus').addClass('d-none');
        $('#note').val('');
    });
    $('.btnsavestatus').click(function(){
        var _that = $(this),_api = _that.data('api'),_ohtml = _that.html(),_status_id = $('#status_id').val();
        _that.loading();
        if(_api && _status_id)
        {
            $.ajax({
                url:_api,
                method:'PUT',
                data:{status_id:_status_id,note:$('#note').val()},
                beforeSend: function(){
                    _that.loading();
                },
                success: function(d){
                    _that.finish(_ohtml);
                    $.msg(d.msg,d.title,d.status);
                    if(d.status =='success'){
                        $('#actionstatus').addClass('d-none');
                        _oldStatus = _status_id;
                        $('#statuslogs').prepend('<li><div class="tm-box">'+
                        '<h4>'+d.item.actor+'.</h4> – <span class="release-date">'+d.item.date+'</span><ul class="list-unstyled">'+
                            '<li>Changed <span class="badge badge-info" style="background-color:'+d.item.old_status_color+'">'+d.item.old_status_text+'</span> to <span class="badge badge-info" style="background-color:'+d.item.new_status_color+'">'+d.item.new_status_text+'</span> - '+d.item.time+'</li><li>'+d.item.note+'</li>'+
                            '</ul></div></li>');
                    }
                },
                error: function(){
                    _that.finish(_ohtml);
                }
            });
        }
    });
}).apply(this, [jQuery]);
