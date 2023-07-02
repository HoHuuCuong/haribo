@extends('backend.master')
@section('container')
<!-- start: page -->
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                </div>

                <h2 class="card-title">{{$pagename}}</h2>
            </header>
            {!!msg(session('msg'),session('type'),session('title'))!!}
            <div class="card-body">
                <form class="needs-validation" method="POST" action="{{$action}}" novalidate enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('first_name') has-danger @enderror">
                                <label class="col-form-label" for="first_name">{{__('First Name')}}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="{{__('First Name')}}" required value="{{$item->first_name??old('first_name')}}">
                                <span id="helpfirst_name" data-msg="{{__('backend.validate.requied',['name'=>__('First Name')])}}"
                                    class="text-danger">{{$errors->first('first_name')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('last_name') has-danger @enderror">
                                <label class="col-form-label" for="last_name">{{__('Last Name')}}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="{{__('Last Name')}}" required value="{{$item->last_name??old('last_name')}}">
                                <span id="helplast_name" data-msg="{{__('backend.validate.requied',['name'=>__('Last Name')])}}"
                                    class="text-danger">{{$errors->first('last_name')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('phone') has-danger @enderror">
                                <label class="col-form-label" for="phone">{{__('Phone')}}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="{{__('Phone')}}" required value="{{$item->phone??old('phone')}}">
                                <span id="helpphone" data-msg="{{__('backend.validate.requied',['name'=>__('Phone')])}}"
                                    class="text-danger">{{$errors->first('phone')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('email') has-danger @enderror">
                                <label class="col-form-label" for="email">{{__('Email')}}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="{{__('Email')}}" required value="{{$item->email??old('email')}}">
                                <span id="helpemail" data-msg="{{__('backend.validate.requied',['name'=>__('Email')])}}"
                                    class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('cmnd') has-danger @enderror">
                                <label class="col-form-label" for="cmnd">{{__('cmnd')}}</label>
                                <input type="text" class="form-control" id="cmnd" name="cmnd"
                                    placeholder="{{__('cmnd')}}" required value="{{$item->cmnd??old('cmnd')}}">
                                <span id="helpcmnd" data-msg="{{__('backend.validate.requied',['name'=>__('cmnd')])}}"
                                    class="text-danger">{{$errors->first('cmnd')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('address') has-danger @enderror">
                                <label class="col-form-label" for="address">{{__('Address')}}</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="{{__('Address')}}" required value="{{$item->address??old('address')}}">
                                <span id="helpaddress" data-msg="{{__('backend.validate.requied',['name'=>__('Address')])}}"
                                    class="text-danger">{{$errors->first('address')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('city') has-danger @enderror">
                                <label class="col-form-label" for="city">{{__('City')}}</label>
                                <select class="form-control" data-api="{{route('b.ajax.getdistricts')}}" id="city"
                                    name="city" required>
                                    <option value="">{{__('Select City')}}</option>
                                    @foreach ($cities as $citem)
                                    <option value="{{$citem->id}}"
                                        {{($item->city_id??old('city'))==$citem->id?'selected':''}}>
                                        {{$citem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpcity" data-msg="{{__('backend.validate.requied',['name'=>__('City')])}}"
                                    class="text-danger">{{$errors->first('city')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('district') has-danger @enderror">
                                <label class="col-form-label" for="district">{{__('District')}}</label>
                                <select class="form-control" id="district" name="district" required>
                                    <option value="">{{__('Select District')}}</option>
                                    @foreach ($districts as $ditem)
                                    <option value="{{$ditem->id}}"
                                        {{($item->district_id??old('city'))==$ditem->id?'selected':''}}>
                                        {{$ditem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpdistrict"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('District')])}}"
                                    class="text-danger">{{$errors->first('district')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('status') has-danger @enderror">
                                <label class="col-form-label" for="status">{{__('Status')}}</label>
                                <select class="form-control" id="status" name="status" required>
                                    @foreach ($STATUS as $sitem)
                                    <option @if (isset($item->status) && $item->status == $sitem->id)
                                        selected
                                        @endif value="{{$sitem->id}}">{{$sitem->name}}</option>
                                    @endforeach
                                </select>
                                <span id="helpstatus"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Status')])}}"
                                    class="text-danger">{{$errors->first('status')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('bonus_code') has-danger @enderror">
                                <label class="col-form-label" for="bonus_code">{{__('Bonus Code')}}</label>
                                <input type="text" class="form-control" id="bonus_code" name="bonus_code"
                                    placeholder="{{__('Bonus Code')}}" required value="{{$item->bonus_code??old('bonus_code')}}">
                                <span id="helpbonus_code" data-msg="{{__('backend.validate.requied',['name'=>__('Bonus Code')])}}"
                                    class="text-danger">{{$errors->first('bonus_code')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                                <label class="text-black" for="attach">{{__('Photograph packaging & bonus code')}}</label>
                                <div><a href="{{$item->attach?Storage::url('public/'.$item->attach):'#'}}" target="_new"><img width="200" src="@if($item->attach){{Storage::url('public/'.$item->attach)}}@else{{asset('/no-image.png')}}@endif" alt="Card image cap"></a></div>
                                <div class="custom-file @error('attach') has-danger @enderror">
                                <input type="file" id="attach" onchange="ValidateSingleInput(this)"   name="attach" value="{{old('attach')}}" class="custom-file-input @error('attach') is-invalid  @enderror">
                                <label class="custom-file-label" for="file">{{__('Choose file')}}</label>
                                <span id="helpattach"
                                data-msg="{{__('backend.validate.requied',['name'=>__('Photograph packaging & bonus code')])}}"
                                class="text-danger">{{$errors->first('attach')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method($method)
                    <div class="form-group row mt-3">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('product.index')}}" class="btn btn-sm btn-default"><i
                                    class="fa fa-reply"></i>
                                {{__('backend.button.cancel')}}</a> <button class="btn btn-sm btn-primary"
                                type="submit"><i class="fa fa-save"></i> {{__('backend.button.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
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

@endsection
