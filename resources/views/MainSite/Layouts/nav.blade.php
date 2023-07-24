{{-- old navigation  --}}

{{-- <style>
    nav {
        padding: 0px !important;

    }


    nav li {
        display: block;
        cursor: pointer;
        padding: 0 5px;
    }

    nav li:hover {
        background: #d4d4d4;
        color: white;
    }

    nav .active {
        padding: 0 5px;

        background: #d4d4d4;
        color: white;
    }

    nav a {
        display: block;
        padding: 12px 8px !important;

        text-decoration: none !important;
        color: black;
    }

    nav a:hover {
        padding: 12px 8px !important;
        color: black;
    }
    .dropdown-menu li a {color: black}
</style> --}}
{{-- custom --}}
{{-- <div class="uppper-section container p-2">
    <div class="row">
        <div class="col-3">
            <a href="{{ url('/') }}">
                <img src="{{ asset('/images/logo.png') }}">
            </a>
        </div>
        <form class="col-lg-5 col-md-5  col-sm-5 col-xs-12 float-left" action="{{url('/user/global-search')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
            
                <input type="text" class="form-control" placeholder="search..." aria-label="Recipient's username"
                    aria-describedby="button-addon2" name="searchInput">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 float-left">
            <div class="dashboard-Header-top-botton">
                <a href="{{ url('/upload/video') }}" class="form-control btn btn-register" target="_blank">Create</a>



                @if (session()->has('user'))

                    @if ($userData->image)
                        <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown"><img
                                class="dashboard-header" src="{{ asset('Data/User/Profile/'.$userData->image) }}">
                        </button>
                    @else
                        <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown"><img
                                class="dashboard-header" src="{{ asset('/images/user.png') }}"> </button>
                    @endif
                @else
                    <button class="btn  dropdown-toggle" type="button" style="pointer-events: none;"
                        data-toggle="dropdown"><img class="dashboard-header" src="{{ asset('/images/user.png') }}">
                    </button>
                @endif


                <ul class="dropdown-menu " >
                    <li><a href="{{ url('/user/profile') }}">
                            <img class="header-image"
                                src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Profile_Black-01.png') }}"
                                width="20"> Profile</a></li>
                    
                    <li> <a  href="{{ url('/user/logout') }}"><i class="fa fa-sign-out"
                                style="font-size:17px"></i>
                            LogOut</a>
                    </li>
                    <a href="{{ url('/user/logout') }}" style="display: none;">

                    </a>

                </ul>

                <a href="https://nacopedia.com/" class="form-control btn btn-register" target="_blank">nacopedia.com</a>

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" id="nav">
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('home') }}" id="home">
                    <i class="fa fa-home"></i>
                    Home </a></li>


            <li class="nav-item {{ Request::is('live') ? 'active' : '   ' }}"><a href="{{ url('live') }}"
                    id="Nac_live"><img class="ballot" src="{{ asset('/images/Group_520.jpeg') }}"> NAC Live</a></li>

            <li class="nav-item {{ Request::is('video/top-100') ? 'active' : '' }}"><a href="{{ url('/video/top-100') }}"
                    id="top100videos"><i class="fa fa-star"></i>Top
                    100 </a></li>

            <li class="nav-item {{ Request::is('user/video/liked') ? 'active' : '' }}"><a
                    href="{{ url('user/video/liked') }}" id="likedvideos"> <i style="font-size:17px"
                        class="fa fa-thumbs-o-up"></i> Liked Videos</a></li>
            <li class="nav-item {{ Request::is('universe') ? 'active' : '' }}"><a href="{{ url('universe') }}"
                    id="universe"> <img class="ballot" src="{{ asset('/images/universe.png') }}">
                    Universe</a></li>
            <li class="nav-item {{ Request::is('ballot') ? 'active' : '' }}"><a href="{{ url('/ballot') }}"
                    id="ballot"><img class="ballot"
                        src="http://3.7.41.47/newathenscreative/public/images/Group_521.jpeg"> NAC Ballot </a>
            </li>
            <li class="nav-item "><a href="{{url('/coming-soon')}}" id="ballot"><img class="ballot"
                        src="{{ asset('/images/Group_51911.jpeg') }}"> NAC Invest </a>
            </li>
            <li class="nav-item"><a href="{{url('/coming-soon')}}" id="ballot"><img class="ballot"
                        src="{{ asset('/images/Group_518.jpeg') }}"> NAC Network </a>
            </li>
        </ul>

    </div>
</nav> --}}

<style>
    .common-nav {
        background-color: #f8f9fa !important
    }

    .nav-item a {
        color: black !important
    }

    .nav-item .active {
        background-color: #d4d4d4;
    }
</style>
{{-- new navigation  --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light pb-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><img class="m-0" src="{{ asset('/images/logo.png') }}"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarNav">
            <ul class="navbar-nav col-8">
                <li class="nav-item {{ Request::is('live') ? 'active' : '' }}">
                    <a href="{{ url('live') }}" class="nav-link {{ Request::is('live') ? 'active' : '' }}"
                        aria-current="page" href="#"><img class="ballot"
                            src="{{ asset('/images/Group_520.jpeg') }}"> Nac Live</a>
                </li>
                <li class="nav-item {{ Request::is('video/top-100') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('video/top-100') ? 'active' : '' }}"
                        href="{{ url('/video/top-100') }}" id="top100videos"><i class="fa fa-star"></i>Top
                        100 </a>
                </li>
                <li class="nav-item {{ Request::is('universe') ? 'active' : '' }}"><a
                        class="nav-link {{ Request::is('universe') ? 'active' : '' }}" href="{{ url('universe') }}"
                        id="universe"> <img class="ballot" src="{{ asset('/images/universe.png') }}">
                        Universe</a></li>
                <li class="nav-item {{ Request::is('ballot') ? 'active' : '' }}"><a
                        class="nav-link {{ Request::is('ballot') ? 'active' : '' }}" href="{{ url('/ballot') }}"
                        id="ballot"><img class="ballot"
                            src="http://3.7.41.47/newathenscreative/public/images/Group_521.jpeg"> NAC Ballot </a>
                </li>
                <li class="nav-item "><a class="nav-link" href="{{ url('/coming-soon') }}" id="ballot"><img
                            class="ballot" src="{{ asset('/images/Group_51911.jpeg') }}"> NAC Invest </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/coming-soon') }}" id="ballot"><img
                            class="ballot" src="{{ asset('/images/Group_518.jpeg') }}"> NAC Network </a>
                </li>
            </ul>
            <li class="col-12 col-md-4 d-flex justify-content-end align-items-center">
                <a href="{{ url('/upload/video') }}" class="form-control btn btn-register" target="_blank">Create</a>
                @if (session()->has('user'))
                    <div class="dropdown">
                        @if ($userData->image)
                            <button style="border: none;background: none" class="px-3 dropdown-toggle" type="button"
                                data-toggle="dropdown"><img class="dashboard-header"
                                    src="{{ asset('Data/User/Profile/' . $userData->image) }}">
                            </button>
                        @else
                            <button style="border: none;background: none" type="button" class="px-3 dropdown-toggle"
                                data-toggle="dropdown" aria-expanded="false"><img class="dashboard-header"
                                    src="{{ asset('/images/user.png') }}"> </button>
                        @endif
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/user/profile') }}"> <i class="fa fa-user"
                                    style="font-size:17px"></i> Profile</a>
                            <a class="dropdown-item" href="{{ url('/user/logout') }}"><i class="fa fa-sign-out"
                                    style="font-size:17px"></i>
                                LogOut</a>
                        </div>
                    </div>
                @else
                    <button class="btn  dropdown-toggle" type="button" style="pointer-events: none;"
                        data-toggle="dropdown"><img class="dashboard-header" src="{{ asset('/images/user.png') }}">
                    </button>
                @endif
                <a href="https://nacopedia.com/" class="form-control btn btn-register" target="_blank">nacopedia.com</a>
            </li>

        </div>


    </div>

</nav>
