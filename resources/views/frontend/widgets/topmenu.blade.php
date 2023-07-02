<div class="border-bottom top-bar py-2 " id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="mb-0 d-md-flex">
            <span class="mr-3"><strong class="text-white">{{__('Hotline')}}:</strong> <a href="tel:{{$config['PHONE']->value}}">{{$config['PHONE']->value}}</a></span>
            <span class="d-none"><strong class="text-white">{{__('Email')}}:</strong> <a href="mailto:{{$config['EMAIL']->value}}">{{$config['EMAIL']->value}}</a></span>
          </p>
        </div>
        <div class="col-md-6 d-none">
          <ul class="social-media">
            @if ($config['FB']->value)
            <li><a href="{{$config['FB']->value}}" target="_new" class="p-2"><span class="icon-facebook"></span></a></li>
            @endif
            @if ($config['TW']->value)
            <li><a href="{{$config['TW']->value}}" target="_new" class="p-2"><span class="icon-twitter"></span></a></li>
            @endif
            @if ($config['IN']->value)
            <li><a href="{{$config['IN']->value}}" target="_new" class="p-2"><span class="icon-instagram"></span></a></li>
            @endif
            @if ($config['LI']->value)
            <li><a href="{{$config['LI']->value}}" target="_new" class="p-2"><span class="icon-linkedin"></span></a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
