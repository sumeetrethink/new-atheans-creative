<style>
    .top-4-videos {
        background-color: rgb(190, 246, 190);
        padding: 5% 0px;
        z-index: -1;
    }

    .top-4-videos .upper-section {
        position: relative;
        border-radius: 10px;
        height: 200px;
        width: 100%;

        cursor: pointer;
    }

    .top-4-videos .upper-section img {
        border-radius: 10px;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 9;

    }

    .upper-section:before {

        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 40%;
        border-radius: 10px;
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
        z-index: 9;
        transition: height 0.5s ease-in-out;
    }

    .video-title {
        position: absolute;
        bottom: 0px;
        color: white;
        z-index: 99999;
        padding: 10px;
    }

    .video-title h4 {
        margin: 0;
        padding: 0;
        font-size: 18px
    }

    .video-title h6 {
        color: #57B566 !important;
        font-size: 14px;
        padding: 0;
        margin: 0;
    }

    .hover-text {
        position: absolute;
        bottom: 10%;
        width: 100%;
        height: 10%;
        opacity: 0;
        z-index: 1 !important;

        color: black;
        padding: 10px;
        transition: bottom 0.5s ease-in-out;
    }

    .upper-section:hover .hover-text {
        bottom: -10%;
        opacity: 1;
    }

    .top-4-videos i {
        cursor: pointer;
        font-size: 24px !important
    }

    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(217, 217, 217, 0.1);
        backdrop-filter: blur(15px);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .play-button i {
        margin: 0;
        padding: 0;
        font-size: 16px !important;
        color: white;
        padding-left: 3px
    }
</style>

<section class="top-4-videos">
    <div class="container">
        <h3>
            TOP 4 Videos
        </h3>

        <div class="row">
            @foreach ($topFour as $item)
                @php
                    $encryptedUrl = Crypt::encryptString($item->id);
                @endphp


                <div class="col-3">
                    <a href="{{ url('live?watch=' . $encryptedUrl) }}">
                        <div class="upper-section">
                            <img src="{{ asset('Data/Thumbnail/' . $item->thumbnail) }}" alt="">
                            <div class="play-button">
                                <i class="fa fa-play"></i>
                            </div>
                            <div class="video-title">
                                <h4>{{ Str::limit($item->video_title, 30, '...') }}</h4>
                                <h6>{{ $item->genre_name }}</h6>

                            </div>
                            <div class="hover-text">
                                <h4>
                                    <i style="font-size:18px" class="fa">1</i>
                                    1<i class="fa fa-star-o"></i>
                                </h4>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
