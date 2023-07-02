<!-- Vendor -->
<script src="{{asset('/backend')}}/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="{{asset('/backend')}}/vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="{{asset('/backend')}}/master/style-switcher/style.switcher.js"></script>
<script src="{{asset('/backend')}}/vendor/popper/umd/popper.min.js"></script>
<script src="{{asset('/backend')}}/vendor/bootstrap/js/bootstrap.js"></script>
<script src="{{asset('/backend')}}/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{asset('/backend')}}/vendor/common/common.js"></script>
<script src="{{asset('/backend')}}/vendor/nanoscroller/nanoscroller.js"></script>
<script src="{{asset('/backend')}}/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="{{asset('/backend')}}/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="{{asset('/backend')}}/vendor/jquery-ui/jquery-ui.js"></script>
<script src="{{asset('/backend')}}/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="{{asset('/backend')}}/vendor/jquery-appear/jquery.appear.js"></script>
<script src="{{asset('/backend')}}/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="{{asset('/backend')}}/vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
<script src="{{asset('/backend')}}/vendor/flot/jquery.flot.js"></script>
<script src="{{asset('/backend')}}/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
<script src="{{asset('/backend')}}/vendor/flot/jquery.flot.pie.js"></script>
<script src="{{asset('/backend')}}/vendor/flot/jquery.flot.categories.js"></script>
<script src="{{asset('/backend')}}/vendor/flot/jquery.flot.resize.js"></script>
<script src="{{asset('/backend')}}/vendor/jquery-sparkline/jquery.sparkline.js"></script>
<script src="{{asset('/backend')}}/vendor/raphael/raphael.js"></script>
<script src="{{asset('/backend')}}/vendor/morris/morris.js"></script>
<script src="{{asset('/backend')}}/vendor/select2/js/select2.js"></script>
<script src="{{asset('/backend')}}/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="{{asset('/backend')}}/vendor/gauge/gauge.js"></script>
<script src="{{asset('/backend')}}/vendor/snap.svg/snap.svg.js"></script>
<script src="{{asset('/backend')}}/vendor/liquid-meter/liquid.meter.js"></script>
<script src="{{asset('/backend')}}/vendor/jqvmap/jquery.vmap.js"></script>
<script src="{{asset('/backend')}}/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="{{asset('/backend')}}/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="{{asset('/backend')}}/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
<script src="{{asset('/backend')}}/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
<script src="{{asset('/backend')}}/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>

<script src="{{asset('/backend')}}/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
<script src="{{asset('/backend')}}/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
<script src="{{asset('/backend')}}/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
<script src="{{asset('/backend')}}/vendor/confirm/confirm.min.js"></script>
<script src="{{asset('/backend')}}/vendor/pnotify/pnotify.custom.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="{{asset('/backend')}}/js/theme.js"></script>
<script src="{{asset('/backend')}}/ckeditor/ckeditor.js"></script>
<script src="{{asset('/backend')}}/ckfinder/ckfinder.js"></script>
<!-- Theme Custom -->
<script src="{{asset('/backend')}}/js/myscript.js?time={{time()}}"></script>
<script src="{{asset('/backend')}}/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/backend')}}/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/backend')}}/js/examples/nhansu.edittable.js"></script>
@isset($scripts)
@foreach ($scripts as $sc)
<script src="{{asset('/backend')}}{{$sc}}"></script>
@endforeach
@endisset
<script src="{{asset('/backend')}}/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('/backend')}}/js/theme.init.js"></script>
<script src="{{asset('/backend')}}/js/examples/examples.dashboard.js"></script>

@if(session()->get('locksreen')==1)
<script>
    $(function() {
    LockScreen.show();
});
</script>
@endif
