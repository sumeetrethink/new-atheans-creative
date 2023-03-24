@extends('MainSite.Content.index')
@section('content')
    <style>
        .embed-responsive {
            height: 500px;
            /* set the height to match the height of the iframe */
        }

        a {
            text-decoration: none !important;
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

        .more-video {
            cursor: pointer;
        }

        .small-thumbnail {
            width: 160px !important;
            object-fit: cover;
            height: 90px;
            cursor: pointer
        }

        .more-title {
            color: black
        }
    </style>
    <section class="home-upper-section p-4">
        <div class="row">
            <div class="col-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <video width="320" height="240" controls
                        poster="{{ asset('Data/Thumbnail/' . $oneVideo->thumbnail) }}">
                        <source src="{{ asset('Data/Video/' . $oneVideo->file_name) }}" type="video/mp4">

                    </video>
                </div>
                <div class="row">
                    <div class="col-9">
                        <h3 class="pt-2 m-0 video-title" style="">{{ $oneVideo->video_title }}</h3>

                    </div>
                    <div class="col-3 d-flex pt-2 justify-content-end">

                        <div class="d-flex m-2" data-toggle="tooltip" data-placement="bottom" title="Like this video">
                            <p class="video-des m-0 d-flex flex-column text-center"
                                onclick="managelike({{ $oneVideo->id }},0)">


                                @if ($oneVideo['likes']->contains('user_id', $oneVideo->user_id))
                                    <i class="like-icon-0 fa fa-thumbs-up"></i>
                                @else
                                    <i class="like-icon-0 fa fa-thumbs-o-up"></i>
                                @endif
                                <span class="like-count-0">
                                    {{ $oneVideo->likes->count() }}
                                </span>


                            </p>
                        </div>
                        <div  class="m-2 mr-3" data-toggle="tooltip" data-placement="bottom" title="Vote for this video">
                            <p onclick="handleVoting({{$oneVideo->id}},0)" class="video-des m-0 d-flex flex-column text-center"
                            >
                            @if ($oneVideo['votes']->contains('user_id', $oneVideo->user_id))
                            <i class="vote-icon-0 fa fa-star"></i>
                                @else
                            <i class="vote-icon-0 fa fa-star-o"></i>
                            @endif
                            <span class="votes-count-0">
                                {{ $oneVideo->votes->count() }}
                            </span>
                            </p>
                        </div>
                        <div>

                            <a data-toggle="tooltip" data-placement="bottom" title="Buy t-shirt"
                                class="btn btn-success btn-xs delete-btn" href="http://" target="_blank">Buy T-shirt</a>
                        </div>

                    </div>
                </div>
                <div class="row m-0 description-section d-flex flex-column">
                    <h5 class="m-0">Description</h5>
                    <h6>{{ $oneVideo->description }}</h6>
                </div>

            </div>
            <div class="col-4">
                <h4 class="font-weight-bold">More Videos</h4>
                <div class="row">
                    @foreach ($moreVideos as $item)
                        @php
                            
                            $encryptedUrl = Crypt::encryptString($item->id);
                        @endphp
                        <div class="col-12 d-flex my-2 more-video">
                            <a class="d-flex" href="{{ url('live?watch=' . $encryptedUrl) }}">
                                <div class="thumbnail">
                                    <img class="small-thumbnail" src="{{ asset('Data/Thumbnail/' . $item->thumbnail) }}"
                                        alt="">
                                </div>
                                <h5 class="px-2 more-title">{{ $oneVideo->video_title }}</h5>
                            </a>
                        </div>
                    @endforeach

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
