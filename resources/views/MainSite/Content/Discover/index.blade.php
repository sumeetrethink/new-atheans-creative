@extends('MainSite.Content.index')
@section('content')
    <style>
        .one-marker {
            margin-left: 10px
        }

        .one-marker h6 {
            font-size: 14px;
            margin: 0;
            font-weight: 700
        }

        .marker-place i {
            font-size: 28px !important;
            padding-right: 10px
        }

        .lands-marker {
            color: blue
        }

        .business-marker {
            color: red
        }

        .videos-marker {
            color: yellow
        }

        .home-marker {
            color: green
        }

        .marker-place {
            position: absolute;
            background: white;
            z-index: 99999;
            bottom: 0;
            width: 8%;
            height: auto;
            padding: 10px 5px;
            border-top-right-radius: 10px
        }
    </style>
    <script type="text/javascript">
        BASE_URL = "<?php echo url(''); ?>";
    </script>
    <div id="map" style="width: 100%; height: 400px">
        <div class="marker-place">
            <div class=" one-marker d-flex align-items-center">
                <i class="fa fa-map-marker business-marker"></i>
                <h6>Business</h6>
            </div>
            <div class="one-marker  d-flex align-items-center">
                <i class="fa fa-map-marker videos-marker"></i>
                <h6>Videos</h6>
            </div>
            <div class=" one-marker d-flex align-items-center ">
                <i class="fa fa-map-marker home-marker"></i>
                <h6>Home</h6>
            </div>
            <div class="one-marker d-flex align-items-center ">
                <i class="fa fa-map-marker lands-marker"></i>
                <h6>Lands</h6>
            </div>
        </div>
    </div>
    <div class="marker-details row d-flex justify-content-start mt-4 mx-2">

    </div>

    <script>
        var Business = {!! json_encode($Business) !!};
        var Videos = {!! json_encode($Videos) !!};
        let VideosCoordinate;
        mapboxgl.accessToken =
            "pk.eyJ1Ijoia2FtcmFucmV0aGluayIsImEiOiJjbGVxb3c3b2owM3VpM3JxanoycmV2ODlsIn0.HeBrSu_widBrSCvPfhfZPA";
        var map = new mapboxgl.Map({
            container: "map",
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [39.000, 20.000],
            zoom: 2,
        });
        // search address
        const geocoder = new MapboxGeocoder({

            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            marker: false,
        });
        map.addControl(geocoder);

        // business lists
        if (Business) {
            Business.forEach(element => {
                const lat = element.lat;
                const lng = element.long;
                var marker1 = new mapboxgl.Marker({
                        color: "red"
                    })
                    .setLngLat([lng, lat])
                    .setPopup(
                        new mapboxgl.Popup().setHTML(
                            `<h1>${element.name}</h1><p>This is marker 1.</p>`
                        )
                    )
                    .addTo(map);
            });
        }
        if (Videos) {
            Videos.forEach(element => {
                const lat = element.lat;
                const lng = element.long;
                var marker1 = new mapboxgl.Marker({
                        color: "yellow"
                    })
                    .setLngLat([lng, lat])
                    .setPopup(
                        new mapboxgl.Popup().setHTML(
                            `<h1>${element.name}</h1><p>This is marker 1.</p>`
                        )
                    )
                    .addTo(map);
            });
        }
    </script>
@endsection
