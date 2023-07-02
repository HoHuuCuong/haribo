@extends('frontend.master')
@section('content')
<section class="site-section border-bottom" id="services-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center" data-aos="fade-up">
        <h2 class="text-black h1 site-section-heading text-center">{{__('Kết quả trúng thưởng đợt 2')}}</h2>
        </div>
      </div>
      <div class="row align-items-stretch">
        <div class="col-12 mb-4" data-aos="fade-up">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="dacbiet-tab" data-toggle="tab" href="#dacbiet" role="tab" aria-controls="dacbiet" aria-selected="true">Giải đặc biệt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="yeuthuong-tab" data-toggle="tab" href="#yeuthuong" role="tab" aria-controls="yeuthuong" aria-selected="false">Giải yêu thương</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dacbiet" role="tabpanel" aria-labelledby="dacbiet-tab">
                <div class="row mt-4">
                    <div class="col-12">
                        <input class="form-control mr-sm-2 search" type="text" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                    </div>
                </div>
                <ul class="ketqua" id="dacbietkq">
                @foreach($dacbiets as $item)
                    <li id="item-{{$item->code}}" class="item-rs">{{$item->code}}</li>
                @endforeach
                <ul>
            </div>
            <div class="tab-pane fade" id="yeuthuong" role="tabpanel" aria-labelledby="yeuthuong-tab">
                <div class="row mt-4">
                    <div class="col-12">
                        <input class="form-control mr-sm-2 search" type="text" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                    </div>
                </div>
            <ul class="ketqua" id="yeuthuongkq">
                @foreach($yeuthuongs as $item)
                    <li id="item-{{$item->code}}" class="item-rs">{{$item->code}}</li>
                @endforeach
                <ul>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>

@endsection
