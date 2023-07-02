<!Doctype html>
<html lang="en">

<head>
    @include('frontend.widgets.head')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    {!!$config['ANACODE']->value!!}
    <div class="site-wrap">
        @include('frontend.widgets.menu')
        @include('frontend.widgets.space')
        @yield('content')
        @include('frontend.widgets.footer')
    </div>
    @include('frontend.widgets.js')
</body>

</html>
