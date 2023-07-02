@extends('frontend.master')
@section('content')
<div style="border-top:1px solid #fff;    height: 14px; ">
</div>
<section class="site-section bg-purple" id="reg-section" >
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-none d-lg-block ">
                <div class="p-4 mb-3">
                    <img src="{{imgApp($config['REGIMG']->value,[],0,0,true)}}" class="img-fluid" />
                </div>

            </div>
            <div class="col-12 col-lg-8  mb-5 text-light">
                <p class="text-center" style="font-size: 1.5em">Xin cảm ơn quý khách đã tham gia chương trình <br><span style="color: yellow;font-weight: bold;">“Săn
                    Ngay <span style="color: red"><img src="{{imgApp($config['LOGO']->value,[],0,0,true)}}"/></span> Trúng Ngay Quà Xịn”</span></p>
                    <p class="text-center" style="font-size: 1.2em">Chúng tôi đã nhận thông tin Mã dự thưởng <span style="color: yellow">{{$code}}</span> của quý khách, chúng tôi sẽ kiểm tra và gửi tin nhắn, email xác nhận đến bạn trong thời gian sớm nhất. Qúy khách vui lòng giữ lại bao bì và mã dự thưởng để nhận giải (nếu trúng giải).</p>

                <p class="text-center" style="font-size: 1em">Mọi thông tin chi tiết xin liên hệ đến tổng đài <span style="color: yellow">{{$config['PHONE']->value}}</span></p>
            </div>

        </div>
    </div>
</section>
@endsection
