/* Add here all your JS customizations */
(function($) {
    var rs = [];
    'use strict';
    /*
	Checkbox
	*/
	$('#treeRole').on('select_node.jstree', function (e, data) {
        if (data.event) {
            data.instance.select_node(data.node.children_d);
        }
    })
    .on('deselect_node.jstree', function (e, data) {
        if (data.event) {
            data.instance.deselect_node(data.node.children_d);
        }
    }).jstree({
		'core' : {
			'themes' : {
				'responsive': false
            }
        },
		'types' : {
			'default' : {
				'icon' : 'fas fa-folder'
			},
			'file' : {
				'icon' : 'fas fa-file'
			}
        },
        "checkbox" : {
            'three_state':false,
            "cascade" : '',
        },
        'expand_selected_onload': true,
		'plugins': ['types', 'checkbox']
    });
    $('#treeRole').on('changed.jstree', function (e, data) {
        var i, j, r = [];
        for(i = 0, j = data.selected.length; i < j; i++) {
            var node = data.instance.get_node(data.selected[i]);
           // console.log(node);
            node.data.funcId&&r.push(node.data.funcId);
           // if(no)
            $.each(node.parents,function(i,v){

            });
        }
        rs = r;
    });
    $('.setroleuser').click(function(){
        var _that = $(this),_api = _that.data('href'),_ohtml = _that.html();
        //alert('Selected: '+_that.data('href')+' - ' + rs.join(', '));
        _that.loading();
        if(_api)
        {
            $.ajax({
                url:_api,
                method:'PUT',
                data:{funcs:rs},
                beforeSend: function(){
                    _that.loading();
                },
                success: function(d){
                    $.msg(d.msg,d.title,d.status);
                },
                error: function(){
                },
                complete: function(){
                    _that.finish(_ohtml);
                }
            });
        }
    });
    $('.setrolegroup').click(function(){
        var _that = $(this),_api = _that.data('href'),_ohtml = _that.html();
        //alert('Selected: '+_that.data('href')+' - ' + rs.join(', '));
        _that.loading();
        if(_api)
        {
            $.ajax({
                url:_api,
                method:'PUT',
                data:{funcs:rs},
                beforeSend: function(){
                    _that.loading();
                },
                success: function(d){
                    $.msg(d.msg,d.title,d.status);
                },
                error: function(){
                },
                complete: function(){
                    _that.finish(_ohtml);
                }
            });
        }
    });

}).apply(this, [jQuery]);
