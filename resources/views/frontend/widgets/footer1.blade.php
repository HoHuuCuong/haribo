<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="footer-heading mb-4">{{__('About Us')}}</h2>
                        <p>
                            Haribo là thương hiệu kẹo dẻo cao cấp lớn nhất thế giới, được thành lập năm 1921 tại
                            Đức bởi Johannes (Hans) Riegel.
                            </ul>
                        </p>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <h2 class="footer-heading mb-4">{{__('Features')}}</h2>
                        <ul class="list-unstyled">
                            <li><a href="#reg-section">{{__('Registration')}}</a></li>
                            <li><a href="#work-section">{{__('Products')}}</a></li>
                            <li><a href="{{route('f.program')}}">{{__('Program rules')}}</a></li>
                            <li><a href="#about-section">{{__('Contact Us')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 d-none">
                        <h2 class="footer-heading mb-4">{{__('Follow Us')}}</h2>
                        @if ($config['FB']->value)
                        <a href="{{$config['FB']->value}}" target="_new" class="pl-0 pr-3"><span
                                class="icon-facebook"></span></a>
                        @endif
                        @if ($config['TW']->value)
                        <a href="{{$config['TW']->value}}" target="_new" class="pl-3 pr-3"><span
                                class="icon-twitter"></span></a>
                        @endif
                        @if ($config['IN']->value)
                        <a href="{{$config['IN']->value}}" target="_new" class="pl-3 pr-3"><span
                                class="icon-instagram"></span></a>
                        @endif
                        @if ($config['LI']->value)
                        <a href="{{$config['LI']->value}}" target="_new" class="pl-3 pr-3"><span
                                class="icon-linkedin"></span></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row border-top text-center" style="position: relative;">
            <div class="bear-footer"><img src="{{imgApp('/frontend/images/bear-standard.svg',[],0,0,true)}}"></div>
            <div class="col-md-12" style="background-color:#582E90">
                <div class="pt-3">
                    <p>
                        {{$config['FOOTER']->value}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
