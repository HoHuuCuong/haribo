<!doctype html>
<html class="fixed">

<head>
    @include('backend.widgets.head')
</head>

<body>
    <section class="body">
        @include('backend.widgets.topmenu')
        <div class="inner-wrapper">
            @include('backend.widgets.sidebar')
            <section role="main" class="content-body" data-loading-overlay>
                @include('backend.widgets.header_title')
                <!-- start: page -->
                @yield('container')
                <!-- end: page -->
            </section>
        </div>
        @include('backend.widgets.header_title')
    </section>
    @include('backend.widgets.js')
</body>

</html>
