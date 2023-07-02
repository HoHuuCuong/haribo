<!Doctype html>
<html lang="en">

<head>
    @include('frontend.widgets.head')
</head>

<body>
    <div id="lucky-draw">
        <div class="step step-1 show">
            <div class="add-file">
                <input type="file" name="" class="input-file" id="input-file">
                <label for="input-file"><img src="./images/excel.png" alt=""></label>
            </div>
            <h3 class="title">Lucky Draw</h3>
                <h2 class="text-center">
            Laravel Excel/CSV Import
        </h2>
 
        @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
 
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
 
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
    
            <div class="group-gift">
                <button class="btn-gift" type="button">Giải Ba</button>
                <button class="btn-gift" type="button">Giải Nhì</button>
                <button class="btn-gift" type="button">Giải Nhất</button>

                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    Choose your xls/csv File : <input type="file" name="file" class="form-control">
                
                    <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%">
                </form>
            </div>
        </div>
        <div class="step step-2">
            <h3 class="title">Lucky Draw</h3>
    
            <div class="group-random">
                <div class="code">
                    <label for="">Mã may mắn</label>
                    <div class="form-code">
                        <div class="code code-1">0</div>
                        <div class="code code-2">0</div>
                        <div class="code code-3">0</div>
                        <div class="code code-4">0</div>
                    </div>
                </div>
                <div class="gift">
                    Giải ba
                </div>
                <button class="randomCode" type="button">Bắt đầu</button>
            </div>
            <div class="list-winner">
                <div class="ls-w">Danh sách trúng thưởng</div>
                <div class="lis">
    
                </div>
            </div>
        </div>
    </div>
</body>

</html>