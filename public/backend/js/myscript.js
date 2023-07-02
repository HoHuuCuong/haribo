function openfile(field,zone='/frontend/images')
{
	 CKFinder.popup( '../../', null, null, function(url) {SetFileField( zone+url,field)} ) ;
}
function removefile(field,btn)
{
    $('#'+field).val('');
    $('#'+field).parent().children('img').attr('src',PUBLIC+'no-image.png');
    $(btn).remove();
}
function SetFileField(fileUrl,id )
{
	$('#'+id).val(fileUrl);
	$('#'+id).parent().children('img').attr('src',PUBLIC+fileUrl);
}
function createalias(nguon)
{
    var str = nguon.trim();
    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    str= str.replace(/!|@|\$|%|\^|\*|∣|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    return str;
}
function stralias(nguon, dich)
{
    var str = ($('#'+nguon).val()).trim();
    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    str= str.replace(/!|@|\$|%|\^|\*|∣|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    var des = document.getElementById(dich);
    des.value = str;
}
function loadJS(u) {
    var r = document.getElementsByTagName("script")[0],
        s = document.createElement("script");
    s.src = u;
    r.parentNode.insertBefore(s, r);
}

function lazyloadjs(element, url) {
    $(window).scroll(function() {
        var bottom_of_object = $(element).offset().top + $(element).outerHeight();
        var bottom_of_window = $(window).scrollTop() + $(window).height();

        /* If the object is completely visible in the window, fade it in */
        if (bottom_of_window > bottom_of_object) {
            if ($('script[src="' + url + '"]').length == 0) loadJS(url);
        }
    });
};

$.prototype.countdown = function(max, o) {
    var _that = $(this),
        min = Math.floor(max / 60),
        secon = max % 60;
    _that.html('<span id="min">' + min + '</span>:<span id="sec">' + secon + '</span>').addClass('text-success');
    var _min = $('#min'),
        _sec = $('#sec');
    cdinterval = setInterval(function() {
        if (min <= 5)
            _that.removeClass('text-success').addClass('text-danger');
        if (min < 1 && secon < 1) {
            clearInterval(cdinterval);
            typeof o === "function" && o();
        } else {
            if (secon < 1 && min > 0) {
                secon = 59;
                min--;
            } else if (secon > 0) {
                secon--;
            }
            _min.html(min);
            _sec.html(secon);
        }

    }, 1e3);
    return $(this);
};
$.prototype.disabled = function(o) {
    $(this).prop('disabled', true);
    typeof o === "function" && o();
    return $(this);
};
$.prototype.enable = function(o) {
    $(this).prop('disabled', false);
    typeof o === "function" && o();
    return $(this);
};
Number.prototype.formatNumber = function(s = '₫', n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.') + s;
};
$.prototype.loading = function(o, time = 0, html = '') {
    $(this).prop('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> ' + html);
    if (time > 0) {
        var _time = setTimeout(function() {
            typeof o === "function" && o();
        }, time * 1e3);
    } else {
        typeof o === "function" && o();
    }
    return $(this);
};
$.prototype.finish = function(html = '') {
    $(this).removeAttr('disabled').html(html);
    return $(this);
};
$.prototype.scrollto = function(time = 700) {
    $('html, body').animate({ scrollTop: $(this).offset().top - 80 }, time);
    return $(this);
};
(function($) {
    $.ajaxLoading = function(o, time = 1) {
        $('[data-loading-overlay]').trigger('loading-overlay:show');

        if (time > 0) {
            var _time = setTimeout(function() {
                typeof o === "function" && o();
            }, time * 1e3);
        } else {
            typeof o === "function" && o();
        }
    }
    $.ajaxDone = function() {
        $('[data-loading-overlay]').trigger('loading-overlay:hide');
    }
    $.msg = function(msg, title = '&nbsp;', type = 'success') {
        switch (type) {
            case 'success':
            case 'ok':
            case 'done':
            case 'completed':
                new PNotify({
                    title: title,
                    text: msg,
                    type: 'success',
                    addclass: 'notification-success',
                    icon: 'fas fa-check'
                });
                break;
            case 'danger':
            case 'error':
            case 'failed':
            case 'missing':
                new PNotify({
                    title: title,
                    text: msg,
                    type: 'error',
                    addclass: 'notification-error',
                    icon: 'fas fa-times'
                });
                break;
            case 'warning':
            case 'pending':
            case 'wait':
                new PNotify({
                    title: title,
                    text: msg,
                    type: 'warning',
                    addclass: 'notification-warning',
                    icon: 'fas fa-exclamation-circle'
                });
                break;
            default:
                new PNotify({
                    title: title,
                    text: msg,
                    type: 'info',
                    addclass: 'notification-info',
                    icon: 'fas fa-info-circle'
                });
                break;
        }
    }
    $.csrftoken = function(val = '') {
        if (val) {
            $('meta[name="csrf-token"]').prop('content', val);
        } else {
            return $('meta[name="csrf-token"]').attr('content');
        }
    }
    $.ajaxSetup({
        headers: {
            'x-csrf-token': $.csrftoken(),
            'x-csrf-ajax': Math.random()*99999
        },
        data: { _token: $.csrftoken() }
    });
    $(document).on('keyup', '.needs-validation input,.needs-validation select,.needs-validation textarea', function() {
        var _that = $(this);
        if (_that.is(':required')) {
            if (!_that.val().trim()) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg'));
                _that.addClass('is-invalid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
        if (_that.data('regix')) {
            var regix = new RegExp(_that.data('regix'));
            if (!regix.test(_that.val().trim())) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                $(_that).addClass('is-invalid').removeClass('is-valid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
        if (_that.data('match')) {
            var match = _that.data('match');
            if ($('.needs-validation #' + match).val().trim() != _that.val().trim()) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                $(_that).addClass('is-invalid').removeClass('is-valid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
    });
    $(document).on('change', '.needs-validation input,.needs-validation select,.needs-validation textarea', function() {
        var _that = $(this);
        if (_that.is(':required')) {
            if (!_that.val().trim()) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                $(_that).addClass('is-invalid').removeClass('is-valid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
        if (_that.data('regix')) {
            var regix = new RegExp(_that.data('regix'));
            if (!regix.test(_that.val().trim())) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                $(_that).addClass('is-invalid').removeClass('is-valid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
        if (_that.data('match')) {
            var match = _that.data('match');
            if ($('.needs-validation #' + match).val().trim() != _that.val().trim()) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                $(_that).addClass('is-invalid').removeClass('is-valid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
    });
    $(document).on('blur', '.needs-validation input,.needs-validation select,.needs-validation textarea', function() {
        var _that = $(this);
        if (_that.is(':required')) {
            if (!_that.val().trim()) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                $(_that).addClass('is-invalid').removeClass('is-valid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
        if (_that.data('regix')) {
            var regix = new RegExp(_that.data('regix'));
            if (!regix.test(_that.val().trim())) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                $(_that).addClass('is-invalid').removeClass('is-valid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
        if (_that.data('match')) {
            var match = _that.data('match');
            if ($('.needs-validation #' + match).val().trim() != _that.val().trim()) {
                var $m = _that.parent('div').children('[data-msg]');
                $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                $(_that).addClass('is-invalid').removeClass('is-valid');
            } else {
                _that.addClass('is-valid').removeClass('is-invalid');
                _that.parent('div').children('[data-msg]').hide();
            }
        }
    });
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                $(event).each(function(i, v) {
                    $.each(v.srcElement, function(ii, vv) {
                        switch (vv.tagName) {
                            case 'INPUT':
                                if (vv.required) {
                                    if (!vv.value.trim()) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        var $m = $(vv).parent('div').children('[data-msg]');
                                        $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg'));
                                        $(vv).addClass('is-invalid').removeClass('is-valid');
                                        $.msg($m.data('msg'),'Form invalid','danger');
                                    }
                                    if ((vv.type == 'checkbox' || vv.type == 'radio') && !vv.checked) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        var $m = $(vv).parent('div').children('[data-msg]');
                                        $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg'));
                                        $(vv).addClass('is-invalid').removeClass('is-valid');
                                        $.msg($m.data('msg'),'Form invalid','danger');
                                    }
                                }
                                if (vv.getAttribute('data-regix')) {
                                    var regix = new RegExp(vv.getAttribute('data-regix'));
                                    if (!regix.test(vv.value.trim())) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        var $m = $(vv).parent('div').children('[data-msg]');
                                        $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg'));
                                        $(vv).addClass('is-invalid').removeClass('is-valid');
                                        $.msg($m.data('msg'),'Form invalid','danger');
                                    }
                                }
                                if (vv.getAttribute('data-match')) {
                                    var match = vv.getAttribute('data-match');
                                    if (document.getElementById(match).value.trim() != vv.value.trim()) {
                                        var $m = $(vv).parent('div').children('[data-msg]');
                                        $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg')).show();
                                        $(vv).addClass('is-invalid').removeClass('is-valid');
                                        $.msg($m.data('msg'),'Form invalid','danger');
                                    }
                                }
                                break;
                            case 'TEXTAREA':
                                if (vv.required) {
                                    if (!vv.value.trim()) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        var $m = $(vv).parent('div').children('[data-msg]');
                                        $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg'));
                                        $(vv).addClass('is-invalid').removeClass('is-valid');
                                        $.msg($m.data('msg'),'Form invalid','danger');
                                    }
                                }
                                if (vv.getAttribute('data-regix')) {
                                    var regix = new RegExp(vv.getAttribute('data-regix'));
                                    if (!regix.test(vv.value.trim())) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        var $m = $(vv).parent('div').children('[data-msg]');
                                        $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg'));
                                        $(vv).addClass('is-invalid').removeClass('is-valid');
                                        $.msg($m.data('msg'),'Form invalid','danger');
                                    }
                                }
                                break;
                            case 'SELECT':
                                if (vv.required) {
                                    if (!vv.value.trim()) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        var $m = $(vv).parent('div').children('[data-msg]');
                                        $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg'));
                                        $(vv).addClass('is-invalid').removeClass('is-valid');
                                        $.msg($m.data('msg'),'Form invalid','danger');
                                    }
                                }
                                if (vv.getAttribute('data-regix')) {
                                    var regix = new RegExp(vv.getAttribute('data-regix'));
                                    if (!regix.test(vv.value.trim())) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        var $m = $(vv).parent('div').children('[data-msg]');
                                        $m.addClass('text-danger').removeClass('form-text text-muted').html($m.data('msg'));
                                        $(vv).addClass('is-invalid').removeClass('is-valid');
                                        $.msg($m.data('msg'),'Form invalid','danger');
                                    }
                                }
                                break;
                        }
                    });
                });
            }, false);
        });
    }, false);
    activeNav($('li.nav-active').parent('ul').parent('li.nav-parent'));
})(jQuery);

function activeNav(item) {
    if (item.length == 1) {
        item.addClass('nav-expanded nav-active');
        $item = item.parent('ul').parent('li.nav-parent');
        activeNav($item);
    } else {
        return;
    }
}
$(document).on('click', '*[disabled]', function() {
    return false;
});
$(document).on('click', '*.confirm', function(e, options) {
    var _that = $(this),
        options = options || {};
    if (!options.confirm) {
        e.preventDefault();
        e.stopPropagation();
        $.confirm({
            title: _that.data('q-title'),
            content: _that.data('q-content'),
            buttons: {
                confirm: {
                    text: 'Yes',
                    btnClass: 'btn-light',
                    keys: ['enter'],
                    action: function() {
                        _that.trigger(e.type, { 'confirm': true });
                    }
                },
                cancel: {
                    text: 'No',
                    btnClass: 'btn-success',
                    keys: ['esc'],
                    action: function() {
                        e.preventDefault();
                        e.stopPropagation();
                    }
                }
            }
        });
    } else {
        if (e.currentTarget.tagName == 'A')
            location.href = e.currentTarget.href;
        else
            return true;
    }
});

$(document).on('click', '#addfuncs', function() {
    var _that = $(this);
    var _api1 = _that.data('api1');
    var _api2 = _that.data('api2');
    var _api3 = _that.data('api3');
    $.ajax({
        url: _api1,
        method: 'GET',
        success: function(d) {
            var _title = 'Thêm chức năng';
            var _content = '<div class="tab-pane active"><form id="addfunc" class="p-2 needs-validation" method="POST" action="' + _api2 + '" novalidate>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-6 ">' +
                '<label for="ten">Tên chức năng</label>' +
                '<input class="form-control " id="ten" name="ten" required=""/>';
            _content += '</div>' +
                '<div class="form-group col-md-6 ">' +
                '<label for="icon">Icon</label>' +
                '<input class="form-control " id="icon" name="icon" value="fa fa-cogs"/>';
            _content += '</div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-12 ">' +
                '<label for="parent_id">Chức năng cha</label>' +
                '<select class="form-control" id="parent_id" name="parent_id" required="">';
            _content += '<option value="0">None</option>';
            $.each(d, function(i, f) {
                //if (f.display == 1)
                    _content += '<option value="' + f.id + '">' + f.name + '</option>';
            })
            _content += '</select></div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-12 mt-2">' +
                '<label for="hienmenu" class="mr-3">Hiện menu</label>' +
                '<label for="cohien" class="mr-3">Có <input type="radio" value="1" id="cohien" name="hienmenu" checked/></label>' +
                '<label for="cohien">Không <input type="radio" value="0" id="kohien" name="hienmenu" /></label>';
            _content += '</div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-6 ">' +
                '<label for="vitri">Vị trí</label>' +
                '<input type="number" class="form-control" value="" id="vitri" name="vitri" >';
            _content += '</div>' +
                '<div class="form-group col-md-6 ">' +
                '<label for="routename">Router name</label>' +
                '<select class="form-control" id="routename" name="routename" >';
            _content += '</select></div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-6 ">' +
                '<label for="ctrname">Controller name</label>' +
                '<input type="text" class="form-control" value="" id="ctrname" name="ctrname" >';
            _content += '</div>' +
                '<div class="form-group col-md-6 ">' +
                '<label for="action">Action</label>' +
                '<input type="text" class="form-control" value="index" id="action" name="action" >';
            _content += '</div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-6 ">' +
                '<label for="ctrname">Face</label>' +
                '<input type="text" class="form-control" value="backend" id="fb" name="fb" >';
            _content += '</div>' +
                '<div class="form-group col-md-6 ">' +
                '<label for="action">Allow all</label>' +
                '<div><label><input type="radio"  value="1" id="allow1" name="allow"  > Yes</label>'+
                '<label><input type="radio"  value="0" id="allow2" name="allow"  > No</label></div>';
            _content += '</div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-12 ">' +
                '<input name="_token" value="' + $.csrftoken() + '" type="hidden"/>' +
                '<input name="_method" value="POST" type="hidden">';
            _content += '</div></div>';
            _content += '</form></div>';
            $.confirm({
                boxWidth: '500px',
                title: _title,
                content: _content,
                buttons: {
                    confirm: {
                        text: 'Đồng ý',
                        btnClass: 'btn-light',
                        keys: ['enter'],
                        action: function() {
                            $('#addfunc').trigger('submit');
                        }
                    },
                    cancel: {
                        text: 'Bỏ qua',
                        btnClass: 'btn-success',
                        keys: ['esc'],
                        action: function() {}
                    }
                }
            });
            $.ajax({
                url: _api3,
                method: 'GET',
                success: function(r) {
                    var o = new Option();
                    $(o).html('None');
                    $(o).val('');
                    $("#routename").append(o);
                    $.each(r, function(i, rt) {
                        var r_name = rt.action.as;
                        if (r_name) {// && r_name.startsWith("b.") == true
                            var o = new Option();
                            $(o).html(r_name);
                            $(o).val(r_name);
                            $("#routename").append(o);
                        }
                    })
                }
            });
        }
    });
});
$(document).on('click', '#editfunc', function() {
    var _that = $(this);
    var _api1 = _that.data('api1');
    var _api2 = _that.data('api2');
    var _api3 = _that.data('api3');
    var _api4 = _that.data('api4');
    $.ajax({
        url: _api1,
        method: 'GET',
        success: function(d) {
            var _title = 'Sửa chức năng';
            var _content = '<div class="tab-pane active"><form id="feditfunc" class="p-2 needs-validation" method="POST" action="' + _api3 + '" novalidate>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-7 ">' +
                '<label for="func_name">Chọn chức năng</label>' +
                '<select class="form-control" data-api=' + _api2 + ' id="func_name" name="func_name" required>';
            $.each(d, function(i, f) {
                _content += '<option value="' + f.id + '">' + f.name + '</option>';
            })
            _content += '</select></div>' +
                '<div class="form-group col-md-5 ">' +
                '<label for="icon">Icon</label>' +
                '<input class="form-control " id="icon" name="icon" value="' + d[0].icon + '"/>';
            _content += '</div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-12 ">' +
                '<label for="parent_id">Chức năng cha</label>' +
                '<select class="form-control" id="parent_id" name="parent_id" required="">';
            _content += '<option value="0">None</option>';
            $.each(d, function(i, f) {
                _content += '<option value="' + f.id + '">' + f.name + '</option>';
            })
            _content += '</select></div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-12 mt-2">' +
                '<label for="hienmenu" class="mr-3">Hiện menu</label>' +
                '<label for="cohien" class="mr-3">Có <input type="radio" value="1" id="cohien" name="hienmenu" checked/></label>' +
                '<label for="cohien">Không <input type="radio" value="0" id="kohien" name="hienmenu" /></label>';
            _content += '</div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-6 ">' +
                '<label for="vitri">Vị trí</label>' +
                '<input type="number" class="form-control" value="' + d[0].position + '" id="vitri" name="vitri" >';
            _content += '</div>' +
                '<div class="form-group col-md-6 ">' +
                '<label for="routename">Router name</label>' +
                '<select class="form-control" id="routename" name="routename" >';
            _content += '</select></div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-6 ">' +
                '<label for="ctrname">Controller name</label>' +
                '<input type="text" class="form-control" value="' + d[0].controller + '" id="ctrname" name="ctrname" >';
            _content += '</div>' +
                '<div class="form-group col-md-6 ">' +
                '<label for="action">Action</label>' +
                '<input type="text" class="form-control" value="' + d[0].action + '" id="action" name="action" >';
            _content += '</div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-6 ">' +
                '<label for="ctrname">Face</label>' +
                '<input type="text" class="form-control" value="' + d[0].fb + '" id="fb" name="fb" >';
            _content += '</div>' +
                '<div class="form-group col-md-6 ">' +
                '<label for="action">Allow all</label>' +
                '<div><label><input type="radio"  value="1" id="allow1" name="allow" '+(d[0].allow==1?'checked':'')+' > Yes</label>'+
                '<label><input type="radio"  value="0" id="allow2" name="allow" '+(d[0].allow!=1?'checked':'')+' > No</label></div>';
            _content += '</div></div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-12 ">' +
                '<input name="_token" value="' + $.csrftoken() + '" type="hidden"/>' +
                '<input name="_method" value="POST" type="hidden"/>' +
                '<input id="fid" name="fid" value="' + d[0].id + '" type="hidden"/>';
            _content += '</div></div>';
            _content += '</form></div>';
            $.ajax({
                url: _api4,
                method: 'GET',
                success: function(r) {
                    var o = new Option();
                    $(o).html('None');
                    $(o).val('');
                    $("#routename").append(o);
                    $.each(r, function(i, rt) {
                        var r_name = rt.action.as;
                        if (r_name ) {//&& r_name.startsWith("b.") == true
                            var o = new Option();
                            $(o).html(r_name);
                            $(o).val(r_name);
                            $("#routename").append(o);
                        }
                    })
                }
            });
            $.confirm({
                title: _title,
                content: _content,
                buttons: {
                    confirm: {
                        text: 'Đồng ý',
                        btnClass: 'btn-light',
                        keys: ['enter'],
                        action: function() {
                            $('#feditfunc').trigger('submit');
                        }
                    },
                    cancel: {
                        text: 'Bỏ qua',
                        btnClass: 'btn-success',
                        keys: ['esc'],
                        action: function() {}
                    }
                }
            });
        }
    });
});
$(document).on('change', '#feditfunc #func_name', function() {
    var _that = $(this),
        fid = _that.val();
    $.ajax({
        url: _that.data('api'),
        data: { id: fid },
        method: 'POST',
        success: function(f) {
            $('#feditfunc #parent_id').val(f.parent_id);
            $('#feditfunc #icon').val(f.icon);
            (f.display == 1) ? $('#feditfunc #cohien').prop('checked', true): $('#feditfunc #kohien').prop('checked', true);
            $('#feditfunc #vitri').val(f.position);
            $('#feditfunc #routename').val(f.route_name);
            $('#feditfunc #ctrname').val(f.controller);
            $('#feditfunc #action').val(f.action);
            $('#feditfunc #fid').val(f.id);
            $('#feditfunc #fb').val(f.fb);
            (f.allow == 1) ? $('#feditfunc #allow1').prop('checked', true): $('#feditfunc #allow2').prop('checked', true);
        },
    });
});
$(document).on('change', '#city', function() {
    var _that = $(this),
        cid = _that.val();
    $.ajax({
        url: _that.data('api'),
        data: { city_id: cid },
        method: 'POST',
        success: function(d) {
            $('#district').html(d);
        },
    });
});
$(document).on('change', '#store_id', function() {
    var _that = $(this),
        sid = _that.val(),
        cid = _that.data('id'),
        cat = _that.data('cat');
    $.ajax({
        url: _that.data('api'),
        data: { store_id: sid,id:cid,cat:cat },
        method: 'POST',
        success: function(d) {
            $('#category_id,#parent_id').html(d);
        },
    });
});
 //$('#city').trigger('change');
 $(document).on('click', '#addtimeopen', function() {
    var _that = $(this),
        rid = $('.row-time-open').length,_html = $('#main_open_times').find('>:first-child').html()
        ,_html2 = $('#vi_main_open_times').find('>:first-child').html();
    if(rid && _html && $('#item_open_'+rid).length==0)
    {
        var _crid = $($('#main_open_times').first().html()).attr('id'), _end = _crid.lastIndexOf('_');
        _crid = _crid.substring(_end);
        var _rg = new RegExp(_crid,'g'),_rg2 = new RegExp('\['+_crid.replace('_','')+'\]','g');
        _html = ' <div class="row form-group row-time-open" id="item_open_'+rid+'">'+_html.replace(_rg,'_'+rid)+'</div>';
        _html = _html.replace(_rg2,rid);
        _html2 = ' <div class="row form-group vi_row-time-open" id="vi_item_open_'+rid+'">'+_html2.replace(_rg,'_'+rid)+'</div>';
        _html2 = _html2.replace(_rg2,rid);
        $('#main_open_times').append(_html);
        $('#vi_main_open_times').append(_html2);
    }else{
        $.alert('Cannot add new item, please try again later.');
    }
});
$(document).on('click', '.del-time-open', function() {
    var _that = $(this), _id = _that.data('id');
    if(_id && $('.row-time-open').length>1 && confirm('Do you want to remove this item?'))
    {
        $('#item_open_'+_id).remove();
        $('#vi_item_open_'+_id).remove();
    }else{
        $.alert('Cannot remove this item, please try again later.');
    }
});

//$(function(){
    $('.ckeditor').each(function(){

        CKEDITOR.replace($(this).attr('id'),{
            customConfig: 'config_ez.js'//PUBLIC+'backend/ckeditor/
        });
        //console.log($(this).attr('id'));
    });
//})
