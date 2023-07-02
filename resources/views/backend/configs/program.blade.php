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
                <form class="needs-validation" method="POST" action="{{$action}}" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('summary') has-danger @enderror">
                                <label class="col-form-label" for="summary">{{__('Summary')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="summary" name="summary"
                                    placeholder="{{__('Summary')}}" required>{{$summary->value??old('summary')}}</textarea>
                                <span id="helpsummary"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Summary')])}}"
                                    class="text-danger">{{$errors->first('summary')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group @error('detail') has-danger @enderror">
                                <label class="col-form-label" for="detail">{{__('Details')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="detail" name="detail"
                                    placeholder="{{__('Details')}}" required>{{$detail->value??old('detail')}}</textarea>
                                <span id="helpdetail"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Details')])}}"
                                    class="text-danger">{{$errors->first('detail')}}</span>
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method($method)
                    <div class="form-group row mt-3">
                        <div class="col-lg-12 text-right"><button class="btn btn-sm btn-primary"
                                type="submit"><i class="fa fa-save"></i> {{__('backend.button.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
