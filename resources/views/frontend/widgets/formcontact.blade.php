<section class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center bg-purple rounded">
                <h2 class="h1 site-section-heading  text-light pt-3 text-uppercase">{{__('Contact Us')}}</h2>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-12">
                <div class="mb-3 bg-white">
                    <p class="mb-0 font-weight-bold"><u>{{__('Organizational units')}}</u></p>
                    <p class="mb-4">{{$config['COMPANY']->value}}<br>{{$config['ADDRESS']->value}}</p>
                </div>
            </div>
            <div class="col-12">
                <h2 class="h4 text-black mb-5">{{__('Nếu bạn có thắc mắc? Hãy liên hệ với chúng tôi:')}}</h2>
            </div>
            <div class="col-md-6 mb-5">
                <form action="{{route('f.contactpost')}}" method="post" class="bg-white  needs-validation"
                    novalidate>
                    @if(session('contact')){!!msg(session('msg'),session('type'),session('title'))!!}@endif
                    <p class="mb-4"><u>Cách 1</u>: Nếu bạn không gấp</p>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input required type="email" placeholder="Email của bạn" value="{{old('email')}}" name="email" id="email"
                                class="rounded-0 bg-xam text-light form-control @error('email') is-invalid  @enderror">
                            <span id="helpemail"
                                data-msg="{{__('backend.validate.requied',['name'=>__('Email')])}}"
                                class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <textarea required name="message" id="message" cols="30" rows="7"
                                class="rounded-0 bg-xam text-light  form-control @error('message') is-invalid  @enderror"
                                placeholder="Hãy đánh thắc mắc của bạn tại đây">{{old('message')}}</textarea>
                            <span id="helpemail"
                                data-msg="{{__('backend.validate.requied',['name'=>__('Message')])}}"
                                class="text-danger">{{$errors->first('message')}}</span>
                        </div>
                    </div>
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="{{__('Send Message')}}"
                                class="rounded-0 bg-purple btn btn-md text-white">
                                <span style="white-space: nowrap;" class="text-purple"><u>Email tới: www.sanquaharibo.com</u></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <p class=""><u>Cách 2</u>: Cần giải quyết ngay</p>
                <div class="bg-purple p-2">
                    <p class="font-weight-bold text-light">{{__('Gọi ngay')}}</p>
                    <p class=""><a  class=" text-light" style="font-size: 50px" href="tell:{{$config['PHONE']->value}}">{{$config['PHONE']->value}}</a></p>
                    <p class="font-weight-bold  text-light">{{__('Chúng tôi sẵn sàng phục vụ bạn trong giờ hành chính 8h – 17h, thứ 2 – thứ 6')}}</p>
                </div>

            </div>
        </div>
    </div>
</section>
