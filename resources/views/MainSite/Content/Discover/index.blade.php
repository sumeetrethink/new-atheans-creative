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

       

        .business-marker {
            color: #800080;
        }

        .videos-marker {
            color: green
        }

        .home-marker {
            color: #0ea5e9
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
                <h6>TV Shows</h6>
            </div>
            <div class=" one-marker d-flex align-items-center ">
                <i class="fa fa-map-marker home-marker"></i>
                <h6>Properties</h6>
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
        function getCityDetailsFromPincode(pincode) {
            return new Promise(function(resolve, reject) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'address': pincode
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        for (var i = 0; i < results[0].address_components.length; i++) {
                            var addressType = results[0].address_components[i].types[0];
                            if (addressType === "locality") {
                                var lat = results[0].geometry.location.lat();
                                var lng = results[0].geometry.location.lng();
                                var cityDetails = {
                                    lat: lat,
                                    lng: lng
                                };
                                resolve(cityDetails);
                            }
                        }
                        reject("City not found");
                    } else {
                        reject("Geocoder failed due to: " + status);
                    }
                });
            });
        }
        // to zoom automaticaly on coordinates
        var zoom = {!! json_encode($Video) !!};
        let currentUrl = 'http://3.7.41.47/nac/public/';
        let localUrl = 'http://127.0.0.1:8000/';
        let Business = {!! json_encode($Business) !!};
        let Videos = {!! json_encode($Videos) !!};
        let properties = {!! json_encode($properties) !!};
        let currentInfoWindow = null;

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

        // realstate properties
        properties?.forEach(oneProp => {
            let property = {
                lat: parseFloat(oneProp.lat),
                lng: parseFloat(oneProp.long)
            };
            let marker = new google.maps.Marker({
                position: property,
                map: map,
                icon: {
                    url: `${currentUrl}/images/map/marker-blue.png`,
                    anchor: new google.maps.Point(10, 34)
                }
            });
            marker.addListener('click', function() {
                        if (currentInfoWindow) {
                            currentInfoWindow.close();
                        }
                        // create and open info window
                        var infoWindow = new google.maps.InfoWindow({
                            content: '<h6 style="margin:0px">' + JSON.parse(oneProp.jsonData).address.streetAddress +
                                '</h6>'
                        });
                        infoWindow.open(map, marker);
                        currentInfoWindow = infoWindow;

                    });
                    marker.setMap(map);
        });
        // mark business
        Business?.forEach(business_item => {
            let business_location = {
                lat: parseFloat(business_item.lat),
                lng: parseFloat(business_item.long)
            };

            let marker = new google.maps.Marker({
                position: business_location,
                map: map,
                icon: {
                    url: `${currentUrl}/images/map/marker-purple.png`,
                    anchor: new google.maps.Point(10, 34)
                }
            });
            marker.addListener('click', function() {
                // Close the currently open info window, if any
                if (currentInfoWindow) {
                    currentInfoWindow.close();
                }
                // create and open info window
                var infoWindow = new google.maps.InfoWindow({
                    content: '<h6 style="margin:0px">' + business_item.name +
                        '</h6><p style="font-size:10px;margin-bottom:0">' + business_item.address +
                        '</p>'
                });
                infoWindow.open(map, marker);
                // Update the currentInfoWindow variable
                currentInfoWindow = infoWindow;
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
                            url: `${currentUrl}/images/map/marker-green.png`,
                            anchor: new google.maps.Point(10, 34)
                        }
                    });
                    marker.addListener('click', function() {
                        if (currentInfoWindow) {
                            currentInfoWindow.close();
                        }
                        // create and open info window
                        var infoWindow = new google.maps.InfoWindow({
                            content: '<h6 style="margin:0px">' + element.video_title +
                                '</h6><p style="font-size:10px;margin-bottom:0">' +
                                element.creator_name +
                                '</p><a href="' + currentUrl + 'redicrectToWatch?id=' +
                                element.id +
                                '" style="font-size:10px;margin-bottom:0">Go to video</a>'
                        });
                        infoWindow.open(map, marker);
                        currentInfoWindow = infoWindow;

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
