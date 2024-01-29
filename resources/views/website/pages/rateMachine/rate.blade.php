@extends('website.layouts.app')
@section('title', 'طلب تقييم الألات والمعدات ')

@section('content')


    <link rel="stylesheet" href="{{ asset('/rate/css/style.css') }}">


    <section class="wizard-section">
        <div class="row no-gutters  justify-content-center">
       
            <div class="col-11 col-sm-9 col-md-8 col-lg-6 text-center p-0 mt-3 mb-2">
         
                <div class="form-wizard">
                <!--<div class="col-md-12">-->
                  
                <!--  <a href="{{ url('/rate-request_step2') }}"  class="form-wizard-previous-btn ">تتبع الطلب </a>-->
                <!-- </div>-->
  @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
              

                    <form id="form" role="form" action="{{ route('website.rate-request_Machine.store') }}" method="post"
                        enctype='multipart/form-data'>
                        <h2 class=" ltn__secondary-color-3"><strong>قدم طلب تقييم الألات و المعدات </strong></h2>
                        @csrf
                        @include('flash::message')
                        <fieldset class="wizard-fieldset show" id="step-1">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                     @include('website.pages.rateMachine.step-1')
                                    <div class="form-group clearfix">
                                    <a href="{{url('/')}}" class="form-wizard-previous-btn float-left btn-style-five theme-btn ">إلغاء</a>

                                        <button type="submit"  class="form-wizard-next-btn float-right btn-style-one theme-btn btn-item">أرسال</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                  
                    </form>
                </div>

            </div>

        </div>
    </section>

    <!-- End -->
@endsection
@section('js')



    <script src="{{ asset('/rate/js/wizard.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHBCkTZlvulHaGrVpSTtS_LstDQJ7n6iM&language=ar">
    </script>
    <script type="text/javascript">
        let map, marker;

        function initialise() {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById("latitude").value = position.coords.latitude;
                document.getElementById("longitude").value = position.coords.longitude;
                var latitude = position.coords.latitude;

                var longitude = position.coords.longitude;
                console.log(position.coords)
                var mapCanvas = document.getElementById("mapCanv");

                var myCenter = new google.maps.LatLng(latitude, longitude);
                var mapOptions = {
                    center: myCenter,
                    zoom: 14
                };
                map = new google.maps.Map(mapCanvas, mapOptions);
                marker = new google.maps.Marker({
                    position: myCenter,
                    draggable: true,
                });
                marker.setMap(map);
                geocodePosition(marker.getPosition());
                new google.maps.event.addListener(marker, 'dragend', function() {

                    geocodePosition(marker.getPosition());
                    $("#latitude").val(this.getPosition().lat());
                    $("#longitude").val(this.getPosition().lng());

                });

            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
            //var geoloccontrol = new klokantech.GeolocationControl(map, 20);

        }
        $(".locatinId").bind('change paste keyup', function() {
            var latitude = document.getElementById("latitude").value;

            var longitude = document.getElementById("longitude").value;
            var latLng = new google.maps.LatLng(latitude, longitude);
            map.setCenter(latLng);
            marker.setPosition(latLng);

        })
        google.maps.event.addDomListener(window, 'load', initialise);


        function geocodePosition(pos) {
            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                latLng: pos

            }, function(responses) {
                if (responses && responses.length > 0) {
                    $("#location").val(responses[0].formatted_address);
                }
            });
        }

    </script>
      

@endsection
