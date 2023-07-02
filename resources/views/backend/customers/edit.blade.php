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
            {!!msg(session('msg'),session('type'))!!}
            <div class="card-body">
                <form class="p-3 needs-validation" method="POST" action="{{route('b.mh.update')}}" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('mamonhoc') has-danger @enderror">
                                <label class="col-form-label" for="mamonhoc">{{__('Mã môn học')}}</label>
                                <input type="text" class="form-control" id="mamonhoc" name="mamonhoc"
                                    placeholder="{{__('Mã môn học')}}" required value="{{$mh->mamon}}">
                                <input type="text" value="{{$mh->id}}" name="id" hidden>
                                <span id="helpmamonhoc"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Mã môn học')])}}"
                                    class="text-danger">{{$errors->first('mamonhoc')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('mamonthilai') has-danger @enderror">
                                <label class="col-form-label" for="mamonthilai">{{__('Mã môn thi lại')}}</label>
                                <input type="text" class="form-control" id="mamonthilai" name="mamonthilai"
                                    placeholder="{{__('Mã môn thi lại')}}" required value="{{$mh->mamonthilai}}">
                                <span id="helpmamonthilai"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Mã môn thi lại')])}}"
                                    class="text-danger">{{$errors->first('mamonthilai')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group @error('ten') has-danger @enderror">
                                <label class="col-form-label" for="phone">{{__('Tên môn học')}}</label>
                                <input type="text" class="form-control" id="ten" name="ten"
                                    placeholder="{{__('Tên môn học')}}" required value="{{$mh->ten}}">
                                <span id="helpten"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Tên môn học')])}}"
                                    class="text-danger">{{$errors->first('ten')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group @error('heso') has-danger @enderror">
                                <label class="col-form-label" for="chuyenganh">{{__('Hệ số')}}</label>
                                <input type="text" name="heso" class="form-control" placeholder="{{__('Hệ số')}}"
                                    required="" value="{{$mh->heso}}">
                                <span id="helpheso" data-msg="{{__('backend.validate.requied',['name'=>__('Hệ số')])}}"
                                    class="text-danger">{{$errors->first('heso')}}</span>
                            </div>
                        </div>

                    </div>
                    @csrf
                    @method('PUT')
                    <div class="form-group row mt-3">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('b.mh.list')}}" class="btn btn-sm btn-default"><i class="fa fa-reply"></i>
                                {{__('backend.button.cancel')}}</a> <button class="btn btn-sm btn-primary"
                                type="submit"><i class="fa fa-save"></i> {{__('backend.button.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
