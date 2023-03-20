<style>
    nav {
        padding: 0px !important;

    }


    nav li {
        padding: 10px 6px;
        margin-left: 10px
    }

    nav li:hover {
        background: rgb(156, 154, 154)
    }

    nav a {
        text-decoration: none !important;
        color: black;
    }

    nav a:hover {
        color: #c6f9b0;
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
            <div class="search-header">
                <form class="example" action=" {{ url('search') }}" method="post" style="margin:auto;">
                    @csrf
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search.."
                        value="{{ request('search') }}">
                    <button><i class="fa fa-search"></i></button>

                </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 float-left">
            <div class="dashboard-Header-top-botton">
                <a href="https://nacopedia.com/" class="form-control btn btn-register" target="_blank">Create</a>



                @if (session()->has('user'))

                    @if (session()->has('user'))
                        <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown"><img
                                class="dashboard-header" src="{{ env('APP_URL') }}/images/{{ session()->has('user') }}">
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
                    <li><a href="{{ url('user.profile') }}">
                            <img class="header-image"
                                src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Profile_Black-01.png') }}"
                                width="20"> Profile</a></li>
                    <li><a href="{{ url('user.settings') }}"><img class="header-image"
                                src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Gears_Black-01.png') }}"
                                width="20">Settings</a></li>
                    <li> <a class="dropdown-item" href="{{ url('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="fa fa-sign-out" style="font-size:17px"></i>
                            {{ __('Logout') }}</a>
                    </li>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

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
            <li class="nav-item active"><a href="{{ url('/home') }}" id="home"> <img class="ballot"
                        src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Home_Black-01.png') }}">
                    Home </a></li>

           
            <li class="nav-item"><a href="{{url("nac-live")}}" id="Nac_live"><img class="ballot"
                        src="{{ asset('/images/Group_520.jpeg') }}"> NAC Live</a></li>

            <li class="nav-item"><a href="{{ url('user.top100videos') }}" id="top100videos"><img class="ballot"
                        src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Top100_Black-01.png') }}">Top
                    100 </a></li>

            <li class="nav-item"><a href="{{ url('user.likedvideos') }}" id="likedvideos"> <i style="font-size:17px"
                        class="fa fa-thumbs-o-up"></i> Liked Videos</a></li>
            <li class="nav-item"><a href="{{ url('user.discover') }}" id="discover"> <i class="fa fa-search"></i>
                    Discover</a></li>
            <li class="nav-item"><a href="{{ url('user.ballot') }}" id="ballot"><img class="ballot"
                        src="http://3.7.41.47/newathenscreative/public/images/Group_521.jpeg"> NAC Ballot </a>
            </li>
            <li class="nav-item"><a href="https://nacopedia.com/nac-invest" id="ballot"><img class="ballot"
                        src="{{ asset('/images/Group_51911.jpeg') }}"> NAC Invest </a>
            </li>
            <li class="nav-item"><a href="https://nacopedia.com/nac-network" id="ballot"><img class="ballot"
                        src="{{ asset('/images/Group_518.jpeg') }}"> NAC Network </a>
            </li>
        </ul>

    </div>
</nav>
