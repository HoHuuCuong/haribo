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
                            <div class="form-group @error('procontent') has-danger @enderror">
                                <label class="col-form-label" for="procontent">{{__('Content product')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="procontent" name="procontent"
                                    placeholder="{{__('Content product')}}" required>{{$procontent->value??old('procontent')}}</textarea>
                                <span id="helpprocontent"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Content product')])}}"
                                    class="text-danger">{{$errors->first('procontent')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group @error('procontent2') has-danger @enderror">
                                <label class="col-form-label" for="procontent2">{{__('Content product 2')}}</label>
                                <textarea rows="10" class="form-control ckeditor" id="procontent2" name="procontent2"
                                    placeholder="{{__('Content product 2')}}" required>{{$procontent2->value??old('procontent2')}}</textarea>
                                <span id="helpprocontent2"
                                    data-msg="{{__('backend.validate.requied',['name'=>__('Content product 2')])}}"
                                    class="text-danger">{{$errors->first('procontent2')}}</span>
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
