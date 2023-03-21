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
        <div class="row">
            <div class="col-3">
                <div class="upper-section">
                    <img src="https://img.freepik.com/free-photo/beautiful-lonely-girl-dreaming-thinking_158595-4483.jpg?w=1060&t=st=1679400494~exp=1679401094~hmac=630690714240f550306cb56a2e59a5eb988355425df8ea906ac4ae85c65b41a8"
                        alt="">
                    <div class="play-button">
                        <i class="fa fa-play"></i>
                    </div>
                    <div class="video-title">
                        <h4>Title of the video wil be he...</h4>
                        <h6>Titlese</h6>

                    </div>
                    <div class="hover-text">
                        <h4>
                            <i style="font-size:18px" class="fa">1</i>
                            1<i class="fa fa-star-o"></i>
                        </h4>

                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="upper-section">
                    <img src="https://imgs.search.brave.com/GdYtrB5d6S_40D-KHuNzOGlsZjS6jULlMo2bBAEYnvg/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly93d3cu/YndhbGxwYXBlcmhk/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMS8wMS9OYXNo/UG9pbnQuanBn"
                        alt="">
                    <div class="play-button">
                        <i class="fa fa-play"></i>
                    </div>
                    <div class="video-title">
                        <h4>Title of the video wil be he...</h4>
                        <h6>Titlese</h6>

                    </div>
                    <div class="hover-text">
                        <h4>
                            <i style="font-size:18px" class="fa">1</i>
                            1<i class="fa fa-star-o"></i>
                        </h4>

                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="upper-section">
                    <img src="https://img.freepik.com/free-photo/medium-shot-woman-wearing-glasses_23-2148773581.jpg?w=1060&t=st=1679400464~exp=1679401064~hmac=963dbbd612abfc5936192a17a4e531f789ff946cfe05731419e43a10b05fa54a"
                        alt="">
                    <div class="play-button">
                        <i class="fa fa-play"></i>
                    </div>
                    <div class="video-title">
                        <h4>Title of the video wil be he...</h4>
                        <h6>Titlese</h6>

                    </div>
                    <div class="hover-text">
                        <h4>
                            <i style="font-size:18px" class="fa">1</i>
                            1<i class="fa fa-star-o"></i>
                        </h4>

                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="upper-section">
                    <img src="https://img.freepik.com/free-photo/teenager-light-movie-projector_23-2149377405.jpg?w=1380&t=st=1679400440~exp=1679401040~hmac=cd894a7417d8ffa01a316d68fccefa5dd4985a89c247292cc4240b5a5270f392"
                        alt="">
                    <div class="play-button">
                        <i class="fa fa-play"></i>
                    </div>
                    <div class="video-title">
                        <h4>Title of the video wil be he...</h4>
                        <h6>Titlese</h6>

                    </div>
                    <div class="hover-text">
                        <h4>
                            <i style="font-size:18px" class="fa">1</i>
                            1<i class="fa fa-star-o"></i>
                        </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
