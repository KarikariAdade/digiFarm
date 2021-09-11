@extends('layouts.farmer')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form class="farm_form" method="POST" action="{{ route('farmer.dashboard.farm.store') }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="submit-section mb-4" align="right">
                        <button class="btn btn-success btn-round" type="submit" name="save" value="save_and_apply"> Create Farm </button>
                    </div>
                    <div class="form-row"></div>
                    <div class="errorMsg"></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Farm Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="farm_name">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Farm Category <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="farm_category" id="farm_category">
                                <option></option>
                                @foreach($farm_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Farm Type <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="farm_type" id="farm_type">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 land_size">
                            <label>Land Size <span class="text-danger">*</span></label>
                            <input type="text" name="land_size" class="form-control">
                        </div>
                        <div class="form-group col-md-4 animal_number">
                            <label>Animal Number <span class="text-danger">*</span></label>
                            <input type="text" name="animal_number" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                        <label>Average Production (Quarterly)<span class="text-danger">*</span></label>
                        <input type="text" name="average_production" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Farm Images</label>
                        <input type="file" name="farm_images[]" multiple class="form-control">
                    </div>
                        <div class="form-group col-md-4">
                            <label>Farm Address <span class="text-danger">*</span></label>
                            <input type="text" name="farm_address" id="farm_address" class="form-control">
                        </div>
{{--                        <div class="form-group col-md-4">--}}
{{--                            <label>Farm Address <span class="text-danger">*</span></label>--}}
{{--                            <input type="text" name="farm_address" id="farm_address" class="form-control">--}}
{{--                        </div>--}}

                        <input hidden type="text" id="latitude" name="latitude">
                        <input hidden type="text" id="longitude" name="longitude">
                        <div class="container" id="map" style="height: 300px; width: 95%; border: 1px solid red;"></div>


                        <div class="form-group col-md-12 mt-4">
                            <label>Description </label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('custom-js')
    <script>


        $(document).ready(function () {
            let farm_category = $('#farm_category'),
                farm_type = $('#farm_type'),
                url = `{{ route('request.get.farm.subcategory') }}`;

            farm_category.change(function(){
                getFarmSubCategories(url, $(this).val())
            })

            function getFarmSubCategories(url, data){
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {'farm_category': data}
                }).done((response)=>{
                    if (response.code == '200'){
                        farm_type.html(response.data)
                    }
                    displayItems(response.farm_type);
                })
            }


            function displayItems(type){
                if (type === 'is_crop'){
                    $('.animal_number').hide();
                    $('.land_size').show()
                }else{
                    $('.land_size').hide();
                    $('.animal_number').show()
                }
            }
        })



        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('farm_address');
            var searchBox = new google.maps.places.SearchBox(input);
            //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();

                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    document.getElementById("latitude").value = place.geometry.location.lat();
                    document.getElementById("longitude").value = place.geometry.location.lng();

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        window.addEventListener('load',
            function () {
            initAutocomplete();
        }, false);

            // let contentString ='hello'
            // let lat = 6.650080145273592
            // let lng = -1.648700346667856
            // var map = new google.maps.Map(document.getElementById('map'), {
            //     center: {
            //         lat: parseFloat(lat),
            //         lng: parseFloat(lng),
            //     },
            //     zoom: 14,
            // });
            // var infowindow = new google.maps.InfoWindow({
            //     content: contentString
            // });
            // var marker = new google.maps.Marker({
            //     position: {lat: parseFloat(lat), lng: parseFloat(lng)},
            //     map: map,
            //     title: 'test',
            //     visible: true
            // });
            // marker.addListener('click', function() {
            //     infowindow.open(map, marker);
            // });

        function initMap()
        {

            let contentString ='hello'
            let lat = 6.650080145273592
            let lng = -1.648700346667856

            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng),
                },
                zoom: 14,
            });
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            var marker = new google.maps.Marker({
                position: {lat: parseFloat(lat), lng: parseFloat(lng)},
                map: map,
                title: 'test',
                visible: true
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
            //     }else{
            //
            //     }
            // });
        }


    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBROO3Md6_fZD5_fd1u8VTlRxd4VdJnAWU&libraries=places&callback=initAutoComplete"></script>


@endpush
