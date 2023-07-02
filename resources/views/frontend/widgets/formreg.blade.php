<section class="site-section bg-light" id="reg-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center bg-purple rounded">
                <h2 class="h1 site-section-heading text-light pt-3 text-uppercase">{{__('Registration')}}</h2>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-md-4 d-none d-lg-block ">
                <div class="p-4 mb-3">
                    <img src="{{imgApp($config['REGIMG']->value,[],0,0,true)}}" class="img-fluid" />
                </div>

            </div>
            <div class="col-12 col-lg-8  mb-5">
                <form action="{{route('f.register')}}" method="post" class="p-md-5 needs-validation" novalidate
                    enctype="multipart/form-data">
                    @if(session('reg')){!!msg(session('msg'),session('type'),session('title'))!!}@endif
                    <div class="row form-group">
                        <div class="bg-xam rounded col-md-4 mb-3 mb-md-0 @error('name') has-danger @enderror">
                            <label class="text-purple" for="fname">{{__('Họ & tên')}}</label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 @error('name') has-danger @enderror">
                            <input type="text" id="name" required name="name" value="{{old('name')}}"
                                class="rounded text-light bg-purple form-control  @error('name') is-invalid  @enderror">
                            <span id="helpname" data-msg="{{__('backend.validate.requied',['name'=>__('Họ & tên')])}}"
                                class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="bg-xam rounded col-md-4 mb-3 mb-md-0 @error('phone') has-danger @enderror">
                            <label class="text-purple" for="phone">{{__('Phone')}}</label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 @error('name') has-danger @enderror">
                            <input type="text" id="phone" data-regix="{{HD::REGIX_PHONE}}" required name="phone"
                                value="{{old('phone')}}" class="rounded text-light bg-purple form-control @error('phone') is-invalid  @enderror">
                            <span id="helpphone" data-msg="{{__('backend.validate.regix',['name'=>__('Phone')])}}"
                                class="text-danger">{{$errors->first('phone')}}</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="bg-xam rounded col-md-4 mb-3 mb-md-0 @error('email') has-danger @enderror">
                            <label class="text-purple" for="email">{{__('Email')}}</label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 @error('name') has-danger @enderror">
                            <input type="email" id="email" data-regix="{{HD::REGIX_EMAIL}}" required name="email"
                                value="{{old('email')}}" class="rounded text-light bg-purple form-control @error('email') is-invalid  @enderror">
                            <span id="helpemail" data-msg="{{__('backend.validate.regix',['name'=>__('Email')])}}"
                                class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="bg-xam rounded" style="margin-right: -15px;margin-left: -15px;padding-left:15px">
                                <label class="bg-xam rounded text-purple">{{__('Address')}}</label>
                            </div>
                        </div>
                        <div class="col-md-8 ">
                            <div class="row mb-3">
                                <div class="col-md-5 @error('city_id') has-danger @enderror">
                                    <div class="bg-xam rounded pl-2">
                                    <label class="text-purple" for="city_id">{{__('Tỉnh/TP')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-7 @error('city_id') has-danger @enderror">
                                    <select id="city_id" required name="city_id"
                                        data-api="{{route('f.ajax.getdistricts')}}"
                                        class="rounded text-light bg-purple form-control @error('city_id') is-invalid  @enderror">
                                        <option value="">{{__('Select').' '.__('City')}}</option>
                                        @foreach ($cities as $citem)
                                        <option value="{{$citem->id}}" {{old('city_id')==$citem->
                                            id?'selected':''}}>{{$citem->name}}</option>
                                        @endforeach
                                    </select>
                                    <span id="helpcity_id"
                                        data-msg="{{__('backend.validate.requied',['name'=>__('Tỉnh/TP')])}}"
                                        class="text-danger">{{$errors->first('city_id')}}</span>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <div class="col-md-5 @error('district_id') has-danger @enderror">
                                    <div class="bg-xam rounded pl-2">
                                    <label class="text-purple" for="district_id">{{__('Phường/Quận')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-7 @error('district_id') has-danger @enderror">
                                    <select id="district_id" required name="district_id"
                                        class="rounded text-light bg-purple form-control @error('district_id') is-invalid  @enderror">
                                        <option value="">{{__('Select').' '.__('District')}}</option>
                                        @foreach ($districts as $ditem)
                                        <option value="{{$ditem->id}}" {{old('district_id')==$ditem->
                                            id?'selected':''}}>{{$ditem->name}}</option>
                                        @endforeach
                                    </select>
                                    <span id="helpdistrict_id"
                                        data-msg="{{__('backend.validate.requied',['name'=>__('Phường/Quận')])}}"
                                        class="text-danger">{{$errors->first('district_id')}}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5 @error('address') has-danger @enderror">
                                    <div class="bg-xam rounded pl-2">
                                    <label class="text-purple" for="address">{{__('Số nhà')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-7 @error('address') has-danger @enderror">
                                    <input type="text" id="address" required name="address" value="{{old('address')}}"
                                        class="rounded text-light bg-purple form-control @error('address') is-invalid  @enderror">
                                    <span id="helpaddress"
                                        data-msg="{{__('backend.validate.requied',['name'=>__('Số nhà')])}}"
                                        class="text-danger">{{$errors->first('address')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="bg-xam rounded col-md-4 mb-3 mb-md-0 @error('bonus_code') has-danger @enderror">
                            <label class="text-purple" for="bonus_code">{{__('Bonus Code')}}</label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 @error('bonus_code') has-danger @enderror">
                            <input type="text" id="bonus_code" data-regix="^[a-zA-Z0-9]{9}$" name="bonus_code"
                                value="{{old('bonus_code')}}"
                                class="rounded text-light bg-purple form-control @error('bonus_code') is-invalid  @enderror">
                            <span id="helpbonus_code"
                                data-msg="{{__('Bonus Code').' '.__('bao gồm chữ cái, số và có độ dài 9 ký tự')}}"
                                class="text-danger">{{$errors->first('bonus_code')}}</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" bg-xam rounded col-md-4 mb-3 mb-md-0 @error('attach') has-danger @enderror">
                            <label class="text-purple" for="attach">{{__('Photograph packaging & bonus code')}}</label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 @error('attach') has-danger @enderror">
                            <div class="custom-file @error('attach') has-danger @enderror">
                                <input type="file" id="attach" onchange="ValidateSingleInput(this)" required
                                    name="attach" value="{{old('attach')}}"
                                    class="rounded text-light bg-purple custom-file-input @error('attach') is-invalid  @enderror">
                                <label class="rounded text-light bg-purple  custom-file-label" for="file">{{__('Choose file')}}</label>
                                <span id="helpattach"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Photograph packaging & bonus code')])}}"
                                    class="text-danger">{{$errors->first('attach')}}</span>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-10">
                            <label class="text-purple"><input required checked name="allow" id="allow" value="1"
                                    type="checkbox" /> {{__('Tôi đồng ý với điều kiện & điều khoản của chương
                                trình')}}</label>
                        </div>
                        <div class="col-md-2 text-right">
                            <input type="submit" value="{{__('Submit')}}" class="btn bg-purple text-light btn-md">
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
<script>
    var _validFileExtensions = [".png", ".jpg"];
        function ValidateSingleInput(oInput) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        $('.custom-file-label').html(sFileName);
                        break;
                    }
                }
                if (!blnValid) {
                    $.alert("Xin lỗi, " + sFileName + " không hợp lệ, chỉ cho phép các định dạng: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
        }
</script>
