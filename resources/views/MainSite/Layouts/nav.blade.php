@php
    if (session()->has('user')) {
        $currentUser = session('user');
    }
    
@endphp

<style>
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
</style>
{{-- custom --}}
<div class="uppper-section container p-2">
    <div class="row">
        <div class="col-3">
            <a href="{{ url('/') }}">
                <img src="{{ asset('/images/logo.png') }}">
            </a>
        </div>
        <div class="col-lg-5 col-md-5  col-sm-5 col-xs-12 float-left">
            {{-- <div class="search-header">
                <form class="example" action=" {{ url('search') }}" method="post" style="margin:auto;">
                    @csrf
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search.."
                        value="{{ request('search') }}">
                    <button><i class="fa fa-search"></i></button>

                </form>
            </div> --}}
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username"
                    aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 float-left">
            <div class="dashboard-Header-top-botton">
                <a href="{{ url('/upload/video') }}" class="form-control btn btn-register" target="_blank">Create</a>



                @if (session()->has('user'))

                    @if ($currentUser->image)
                        <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown"><img
                                class="dashboard-header" src="{{ asset('Data/User/' . $currentUser->image) }}">
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


                <ul class="dropdown-menu">
                    <li><a href="{{ url('/user/profile') }}">
                            <img class="header-image"
                                src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Profile_Black-01.png') }}"
                                width="20"> Profile</a></li>
                    <li><a href="{{ url('user.settings') }}"><img class="header-image"
                                src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Gears_Black-01.png') }}"
                                width="20">Settings</a></li>
                    <li> <a class="dropdown-item" href="{{ url('/user/logout') }}"><i class="fa fa-sign-out"
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
            <li class="nav-item {{ Request::is('discover') ? 'active' : '' }}"><a href="{{ url('discover') }}"
                    id="discover"> <i class="fa fa-search"></i>
                    Discover</a></li>
            <li class="nav-item {{ Request::is('ballot') ? 'active' : '' }}"><a href="{{ url('/ballot') }}"
                    id="ballot"><img class="ballot"
                        src="http://3.7.41.47/newathenscreative/public/images/Group_521.jpeg"> NAC Ballot </a>
            </li>
            <li class="nav-item "><a href="https://nacopedia.com/nac-invest" id="ballot"><img class="ballot"
                        src="{{ asset('/images/Group_51911.jpeg') }}"> NAC Invest </a>
            </li>
            <li class="nav-item"><a href="https://nacopedia.com/nac-network" id="ballot"><img class="ballot"
                        src="{{ asset('/images/Group_518.jpeg') }}"> NAC Network </a>
            </li>
        </ul>

    </div>
</nav>
