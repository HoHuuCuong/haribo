<div class="site-section" id="about-section">
 <div class="row mb-5">
        <div class="col-12 text-center bg-blue rounded">
          <h2 class="h1 site-section-heading  text-light pt-3 text-uppercase">{{__('About Us')}}</h2>
        </div>
      </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mb-5 order-md-2" data-aos="fade">
                <img src="{{imgApp($config['ABOUTIMG1']->value,[],0,0,true)}}" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6 order-md-1 bg-blue text-light" data-aos="fade">
                <div class="row">                    
                    <div class="col-12 ">
                        <p class="lead">
                            {!!$config['ABOUTCONTENT1']->value!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6 ml-auto order-md-2 bg-blue" data-aos="fade">
                <img src="{{imgApp($config['ABOUTIMG2']->value,[],0,0,true)}}" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6 order-md-1" data-aos="fade">
                <div class="row">
                    <div class="col-12 ">
                        <p class="lead">
                            {!!$config['ABOUTCONTENT2']->value!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
