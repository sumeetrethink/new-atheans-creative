<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('/images/favicon.png') }}" type="image/png">
    <!-- Fav Icon -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Athens Creative</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/user/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/user/responsive.css') }}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-.11.1.min.js"></script>
    <script src="{{ asset('/js/user/main.js') }}"></script>

</head>

<body>
    {{-- nav --}}
    <style>
        a {
            text-decoration: none !important;
        }

        nav li {
            list-style: none;
            padding: 0px 5px
        }
    </style>
    <nav class="navbar navbar-inverse-login">
        <div class="container">
            <div class="col-md-3 col-xs-3 ">
                <div class="navbar-header">
                    <a class="login-header" href="{{ url('/') }}"><img src="{{ asset('images/mainlogo.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-md-5 col-xs-6 d-flex justify-content-center">

                <li><a href="{{ url('/coming-soon') }}" class=""><img
                            src="http://3.7.41.47/newathenscreative/public/images/header-icons/OD2020_NACIconDesigns_TermsofUse_Black+Grey-01.png"
                            width="40"></a></li>
                <li> <a href="{{ url('/coming-soon') }}" class=""><img
                            src="http://3.7.41.47/newathenscreative/public/images/header-icons/OD2020_NACIconDesigns_Business_Black+Grey-01_1.png"
                            width="40"></a></li>
                <li><a href="{{ url('/coming-soon') }}" class=""><img
                            src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Nacopedia_Black-01 (1).png') }}"
                            width="40"></a></li>
                <li><a href="{{ url('/coming-soon') }}" class=""><img
                            src="{{ asset('/images/header-icons/OD2020_NACIconDesigns_Education_Black-01 (1).png') }}"
                            width="40"></a></li>

            </div>
            <div class="col-md-3 col-xs-3">
                <ul class="nav navbar-nav navbar-right-loginpage lineheight" style="display: inline !important">
                    {{-- <li><a href="{{ url('business.register') }}">Register your Business</a></li> --}}

                    
                        @if (session()->has('user'))
                            <li><a href="{{ url('/user/profile') }}">
                                <img  class="dashboard-header" src="{{ session('user')->image ? asset('Data/User/Profile/' . session('user')->image) : asset('/images/user.png') }}">
                                </a></li>
                        @else
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><span class="hh">/</span></li>
                            <li><a href="#" onclick="openModal('registerModal')">Register</a></li>
                        @endif
                </ul>
            </div>
        </div>


    </nav>
    {{-- vote model --}}
    <div id="voteModel" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Register to Vote!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p>Before entering, we want to make sure you are registered to vote in real life.</p>
                        <p>It takes 30 seconds at <a target="_blank"
                                href="http://nac.turbovote.org">nac.turbovote.org</a></p>
                        <p>Happy voting!</p>
                        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Thanks, I have
                            registered to vote</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="turbovotePopup" class="modal fade" style="width:718px">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div width="618px"><iframe width="618px" height="680px"
                            src="https://nac.turbovote.org/?r=widget"></iframe>Powered by TurboVote: <a
                            href="https://nac.turbovote.org/?r=widget">register to vote, request absentee ballots,
                            and get
                            election reminders</a></div>
                </div>
            </div>
        </div>
    </div>
    {{-- register modal --}}
    <div id="registerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pb-0 mb-0">
                    <h3 class="pl-0 ml-0">Register</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <h4>Register yourself as:</h4>
                    <div class="form-group">

                        <a href="{{ url('/business/register') }}" class="btn btn-success">Business</a>
                        <a href="{{ url('/user/register') }}" class="btn btn-secondary">Creator</a>
                        <a href="{{ url('/user/register') }}" class="btn btn-danger">Voter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--     content --}}
    <style>
        .modal {
            z-index: 9999999;
        }

        h4 {
            font-size: 16px !important
        }

        i {
            cursor: pointer;
        }
    </style>
    <section class="Gradiant-color-left">
        <div class="container top-bottom" style="text-align: center;">
            <div class="row">
                <div class="col-sm-4"> </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="col-md-6  col-sm-12 col-xs-12 index-page">
                        <a href="{{ url('/ballot') }}" data-toggle="tooltip" title="NAC Ballot">
                            <div class="index-image">
                                <img src="{{ asset('/images/Group_521.jpeg') }}">
                            </div>
                        </a>
                        <h4>NAC Ballot <i class="fa fa-question-circle" onclick="openModal('Ballot')"></i></h4>

                    </div>
                </div>
                <div class="col-sm-4"> </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="col-md-6  col-sm-12 col-xs-12 index-page">
                        <a href="{{ url('/universe') }}" data-toggle="tooltip" title="NAC Live">
                            <div class="index-image">
                                <img src="{{ asset('/images/universe.png') }}">
                            </div>
                        </a>
                        <h4>NAC Universe <i class="fa fa-question-circle" onclick="openModal('universe')"></i></h4>
                    </div>
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="col-md-6  col-sm-12 col-xs-12 index-page">
                        <a href="{{ url('/home') }}" data-toggle="tooltip" title="NAC Home">
                            <div class="index-image">
                                <img src="{{ asset('/images/main_logo_center.png') }}">
                            </div>
                        </a>
                        <h4>NAC Home <i class="fa fa-question-circle" onclick="openModal('Home')"></i></h4>
                    </div>
                </div>
                <div class="col-sm-4 d-flex justify-content-end">
                    <div class="col-md-6  col-sm-12 col-xs-12  index-page">
                        <a href="{{ url('/coming-soon') }}" data-toggle="tooltip" title="NAC Invest">
                            <div class="index-image">
                                <img src="{{ asset('/images/Group_51911.jpeg') }}">
                            </div>
                        </a>
                        <h4>NAC Invest <i class="fa fa-question-circle" onclick="openModal('Invest')"></i></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"> </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="col-md-6  col-sm-12 col-xs-12 index-page ">
                        <a href="{{ url('/coming-soon') }}" data-toggle="tooltip" title="NAC Network">
                            <div class="index-image">
                                <img src="{{ asset('/images/Group_518.jpeg') }}">
                            </div>
                        </a>
                        <h4>NAC Network <i class="fa fa-question-circle" onclick="openModal('Network')"></i></h4>
                    </div>
                </div>
                <div class="col-sm-4"> </div>
            </div>
        </div>



    </section>
    <!-- The Modal -->
    <div class="modal" id="Ballot">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">NAC Ballot</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Click here to vote for your favorite pilot episode and make sure to fill out the NAC Poll (once
                    per 3 months) for discounts on your NAC Subscription
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="universe">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">NAC Universe</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Click here to view a global map of tv pilot episodes mapped to their zip code of origin. Search
                    local businesses and residential real estate options for NAC specific discounts!
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="Home">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">NAC Home</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Click here to return home -- this page will evolve over time. For now, if you get lost, click
                    here to come back!
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="Invest">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">NAC Invest</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Click here to view the NAC marketplace, where you can invest in the tv/film rights of your
                    favorite draft picks before they are auctioned off to the major streamers. $5 per trade or
                    unlimited trades with NAC subscription.
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="Network">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">NAC Network</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Click here to view our franchise channels that house NAC tv shows. Four times per year, these
                    franchises draft tv pilots from the top 100 that you vote on! Draft picks get the budget to
                    create five 22 min episodes that air weekly on NAC Network!
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        function openModal(id) {
            $(`#${id}`).modal('show');
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script>
        openModal('voteModel')
    </script>
</body>

</html>
