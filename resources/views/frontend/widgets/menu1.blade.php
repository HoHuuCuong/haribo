
@include('frontend.widgets.mobilemenu')
@include('frontend.widgets.topmenu')
<header class="site-navbar py-2 py-md-4 bg-white js-sticky-header site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-11 col-xl-2">
        <h1 class="mb-0 site-logo"><a href="{{route('f.home')}}" class="text-black h2 mb-0"><img src="{{imgApp($config['LOGO']->value,[],0,0,true)}}"/></a></h1>
        </div>
        <div class="col-12 col-md-10 d-none d-xl-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="{{route('f.home')}}" class="nav-link">{{__('Home')}}</a></li>
                <li><a href="{{route('f.ketqua')}}" class="nav-link">{{__('Kết quả')}}</a></li>
              <li>
                <a href="{{route('f.program')}}" class="nav-link">{{__('Program rules')}}</a>
              </li>
              <li>
                <a href="{{route('f.home')}}#work-section" class="nav-link">{{__('Products')}}</a>
              </li>
              <li>
                <a href="{{route('f.home')}}#about-section" class="nav-link">{{__('About Us')}}</a>
              </li>
              <li>
                <a href="{{route('f.home')}}#contact-section" class="nav-link">{{__('Contact')}}</a>
              </li>
            </ul>
          </nav>
        </div>


        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

      </div>
    </div>

  </header>
