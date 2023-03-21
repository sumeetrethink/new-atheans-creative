@extends('MainSite.Content.index')
@section('content')
    <style>
        .embed-responsive {
            height: 500px;
            /* set the height to match the height of the iframe */
        }

        i {
            font-size: 23px !important;
            cursor: pointer;
        }

        .video-title {
            /* text-align: justify; */
            width: 100%;
            word-wrap: break-word;
            font-weight: bold;
            font-size: 22px
        }

        .description-section {
            /* border: 2px solid black; */
            border-radius: 10px;
            margin-top: 20px !important;
            padding: 10px 12px;
            background: #c0c0c0;
            color: rgb(49, 48, 48);
        }

        .description-section h5 {
            font-weight: bold !important
        }

        .description-section h6 {
            word-wrap: break-word;
        }

        .small-thumbnail {
            max-width: 200px;
            object-fit: contain
        }
    </style>
    <section class="home-upper-section p-4">
        <div class="row">
            <div class="col-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <video width="320" height="240" controls
                        poster="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png">
                        <source src="{{ asset('videos/1679380290_VID_20200208_191523.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="row">
                    <div class="col-9">
                        <h3 class="pt-2 m-0 video-title" style="">Masterful Developer: Kamran's unwavering dedication
                            and unamtched slkillset are true asset</h3>

                    </div>
                    <div class="col-3 d-flex pt-2 justify-content-end">

                        <div class="d-flex m-2 " data-toggle="tooltip" data-placement="bottom" title="Like this video">
                            <p class="video-des m-0">1 <i style="font-size:18px" class="fa"></i> </p>
                        </div>
                        <div class="m-2 mr-3" data-toggle="tooltip" data-placement="bottom" title="Vote for this video">
                            {{-- <i class="fa fa-star-o"></i> --}}
                            <i class="fa fa-star"></i>
                        </div>
                        <div>

                            <a data-toggle="tooltip" data-placement="bottom" title="Buy t-shirt"
                                class="btn btn-success btn-xs delete-btn" href="http://" target="_blank">Buy T-shirt</a>
                        </div>

                    </div>
                </div>
                <div class="row m-0 description-section d-flex flex-column">
                    <h5 class="m-0">Description</h5>
                    <h6>It seems that there is a vertical gap between the embed-responsive class and your heading because
                        the iframe element inside it is taking up 80% of the height of its parent element, but the parent
                        element itself is still taking up the full height of the row.

                        One way to fix this is to set the height of the parent element to match the height of the iframe.
                        You can do this by adding the following CSS to your stylesheet:</h6>
                </div>

            </div>
            <div class="col-4">
                <h4 class="font-weight-bold">Coming Soon</h4>
                <div class="row">
                    <div class="col-12 d-flex my-2">
                        <div class="thumbnail">
                            <img class="small-thumbnail"
                                src="https://imgs.search.brave.com/v9Rv6ebmOZjjP8IPfMS8lgad0g23uOC0kZKsdF8EKq8/rs:fit:1200:720:1/g:ce/aHR0cDovL3d3dy51/cGxvYWQuZWUvaW1h/Z2UvMjk3NTY2OC9U/aHVtYm5haWwucG5n"
                                alt="">
                        </div>
                        <h5 class="px-2">helo this is the upcomint video you are seeing here</h5>

                    </div>
                    <div class="col-12 d-flex my-2">
                        <div class="thumbnail">
                            <img class="small-thumbnail"
                                src="https://imgs.search.brave.com/H2SzJD8YYpluZMSqn9F4bV5ixofEREtuHsMkzSavy9Y/rs:fit:1200:720:1/g:ce/aHR0cHM6Ly9pLnl0/aW1nLmNvbS92aS82/eVEtSkJ6ZVRiZy9t/YXhyZXNkZWZhdWx0/LmpwZw"
                                alt="">
                        </div>
                        <h5 class="px-2">helo this is the upcomint video you are seeing here</h5>

                    </div>

                    <div class="col-12 d-flex my-2">
                        <div class="thumbnail">
                            <img class="small-thumbnail"
                                src="https://imgs.search.brave.com/HkzKglohRguuMIPIS3DypIn_SOS0dD8raJDiqT1lumA/rs:fit:1000:584:1/g:ce/aHR0cHM6Ly9wYmJs/b2dhc3NldHMuczMu/YW1hem9uYXdzLmNv/bS91cGxvYWRzLzIw/MTkvMTIvMDIxNDA5/MjEvdGh1bWJuYWls/LWNvdmVyLmpwZw"
                                alt="">
                        </div>
                        <h5 class="px-2">helo this is the upcomint video you are seeing here</h5>

                    </div>

                    <div class="col-12 d-flex my-2">
                        <div class="thumbnail">
                            <img class="small-thumbnail"
                                src="https://imgs.search.brave.com/v9Rv6ebmOZjjP8IPfMS8lgad0g23uOC0kZKsdF8EKq8/rs:fit:1200:720:1/g:ce/aHR0cDovL3d3dy51/cGxvYWQuZWUvaW1h/Z2UvMjk3NTY2OC9U/aHVtYm5haWwucG5n"
                                alt="">
                        </div>
                        <h5 class="px-2">helo this is the upcomint video you are seeing here</h5>

                    </div>

                </div>
            </div>


        </div>

    </section>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
