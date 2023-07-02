<!-- Basic -->
<meta charset="UTF-8">

<title>{{$pagename??__('backend.page.title :site',['site'=>'Backend'])}}</title>
<meta name="keywords" content=""{{$pagename??__('backend.page.title :site',['site'=>'Backend'])}}" />
<meta name="description" content="{{$pagename??__('backend.page.title :site',['site'=>'Backend'])}}">
<meta name="author" content="hieunguyen">
<meta name="csrf-token" content="{{csrf_token()}}">
<link rel="shortcut icon" href="{{asset('/backend')}}/img/favicon.png">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/animate/animate.css">
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/select2/css/select2.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/confirm/confirm.min.css" />
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/jquery-ui/jquery-ui.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/jquery-ui/jquery-ui.theme.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/morris/morris.css" />
@isset($styles)
    @foreach ($styles as $sty)
    <link rel="stylesheet" href="{{asset('/backend')}}{{$sty}}" />
    @endforeach
@endisset
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/animate/animate.css">
<link rel="stylesheet" href="{{asset('/backend')}}/vendor/pnotify/pnotify.custom.css" />
<!-- Theme CSS -->
<link rel="stylesheet" href="{{asset('/backend')}}/css/theme.css" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="{{asset('/backend')}}/css/custom.css">

<!-- Head Libs -->
<script>
    var BASE = '{{asset('/backend')}}/';
    var PUBLIC = '{{asset('')}}';
    var DOMAIN = '{{url('/')}}';
</script>
<script src="{{asset('/backend')}}/vendor/modernizr/modernizr.js"></script>
<script src="{{asset('/backend')}}/master/style-switcher/style.switcher.localstorage.js"></script>
<script src="{{asset('/backend')}}/vendor/jquery/jquery.js"></script>
<style>
    #styleSwitcher{
        display: none;
    }
</style>
