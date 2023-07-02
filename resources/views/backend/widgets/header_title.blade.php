<header class="page-header">
<h2>{{$pagename}}</h2>

    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{route('b.home')}}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            @foreach($breadcrumbs as $href=>$britem)
                @if($href!='#')
                <li><a href="{{$href}}"><span>{{$britem}}</span></a></li>
                @else
                <li><span>{{$britem}}</span></li>
                @endif
            @endforeach
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
    </div>
</header>
