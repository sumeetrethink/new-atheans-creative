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

        .map-parent {
            position: relative;
        }

        .marker-place {
            position: absolute;
            background: white;
            z-index: 99999;
            bottom: 2px;
            left: 1px;
            width: 8%;
            height: auto;
            padding: 10px 5px;
            border-top-right-radius: 10px
        }
    </style>
    <script type="text/javascript">
        BASE_URL = "<?php echo url(''); ?>";
    </script>
    <div class="map-parent">
        <div id="map"></div>
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
    <div class="row d-flex justify-content-start mt-4 mx-4">
        <input type="text" id="search-input" class="form-control col-2" placeholder="Pin to location ">
    </div>
    {{-- business list tables --}}
    {{-- <h1 class="mt-4">Top Businesses</h1>
    <div class="mt-4 mx-4">
        <table class="table table-bordered dataTable ">
            <thead>
                <tr role="row">
                    <th class="sorting">
                        S.No.</th>
                    <th class="sorting">
                        Business Name</th>
                    <th class="sorting">
                        Location
                    </th>
                </tr>

            </thead>
            <tbody id="ProductTable">
                @foreach ($Business->take(5) as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->address }}</td>
                </tr>            
                @endforeach
            </tbody>
        </table>
    </div> --}}
    {{-- videos list tables --}}
    {{-- <h1 class="mt-4">Top Videos</h1>
<div class="mt-4 mx-4">
    <table class="table table-bordered dataTable ">
        <thead>
            <tr role="row">
                <th class="sorting">
                    S.No.</th>
                <th class="sorting">
                    Video Title</th>
                <th class="sorting">
                    Creator Name
                </th>
            </tr>

        </thead>
        <tbody id="ProductTable">
            @foreach ($Videos->take(5) as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->video_title}}</td>
                <td>{{ $item->creator_name }}</td>
            </tr>            
            @endforeach
        </tbody>
    </table>
</div> --}}

    <script>
        // to zoom automaticaly on coordinates
        var zoom = {!! json_encode($Video) !!};


        var Business = {!! json_encode($Business) !!};
        var Videos = {!! json_encode($Videos) !!};
        // initialise map
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 20.5937,
                lng: 78.9629
            },
            zoom: 3,
            styles: [{
                    featureType: 'poi.business',
                    stylers: [{
                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'poi.attraction',
                    stylers: [{
                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'transit',
                    stylers: [{
                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'poi.school',
                    stylers: [{
                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'poi.park',
                    stylers: [{
                        visibility: 'off'
                    }]
                },
            ]
        });

        // mark business
        Business?.forEach(business_item => {
            let business_location = {
                lat: parseFloat(business_item.lat),
                lng: parseFloat(business_item.long)
            };

            let marker = new google.maps.Marker({
                position: business_location,
                map: map
            });
            marker.addListener('click', function() {
                // create and open info window
                var infoWindow = new google.maps.InfoWindow({
                    content: '<h6 style="margin:0px">' + business_item.name + '</h6><p style="font-size:10px;margin-bottom:0">' + business_item.address +
                        '</p>'
                });
                infoWindow.open(map, marker);
            });
            marker.setMap(map);
        });
        // mark videos
        Videos?.forEach(element => {

            getCityDetailsFromPincode(element?.zipcode).then(function(coordinates) {
                if (coordinates) {
                    let marker = new google.maps.Marker({
                        position: coordinates,
                        map: map,
                        icon: {
                            url: '/images/map/marker-yellow.png',
                            anchor: new google.maps.Point(10, 34)
                        }
                    });
                    marker.addListener('click', function() {
                        // create and open info window
                        var infoWindow = new google.maps.InfoWindow({
                            content: '<h6 style="margin:0px">' + element.video_title +
                                '</h6><p style="font-size:10px;margin-bottom:0">' +
                                element.creator_name +
                                '</p>'
                        });
                        infoWindow.open(map, marker);
                    });
                    marker.setMap(map);
                }
            }).catch(function(error) {
                console.error(error);
            });
        });

        function zoomToLocation(lat, lng, zoomLevel) {
            var center = new google.maps.LatLng(lat, lng);
            map.panTo(center);
            map.setZoom(zoomLevel);
        }
        // search input 
        var searchInput = document.getElementById('search-input');
        var searchBox = new google.maps.places.SearchBox(searchInput);
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            var place = places[0];
            zoomToLocation(place.geometry.location.lat(), place.geometry.location.lng(), 10);
        });
        // if url has any querry for zoom to marker then it will zoom on that
        if (zoom) {
            let data = getCityDetailsFromPincode(zoom?.zipcode).then(function(coordinates) {
                if (coordinates) {
                    zoomToLocation(coordinates.lat, coordinates.lng, 13)

                }
            }).catch(function(error) {
                console.error(error);
            });
        }
    </script>
@endsection
