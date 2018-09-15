@extends('layouts.main')


@section('content')
<style type="text/css">
#map_wrapper {
    height: 500px;
}

#map_canvas {
    width: 100%;
    height: 100%;
}
</style>

<!-- Content section -->
<section class="main silver-bg">

    <!-- Home content -->
    <section class="home">

        <section>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <img src="{{ asset('assets/img/kontakt-big.png')}}" alt="Kontakt"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured kontakt">
            <div class="container">
                <div class="row">

                    <div class="span5">

                        <br/><br/><br/>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <p style="font-weight: bold">
                            FOTON ŠKOLA FOTOGRAFIJE<br/>
                            tel: +381 64 11 59 800<br/>
                            e-mail: skolafotografije@gmail.com<br/>
                            Brankova 9, Zeleni venac , 11000 Beograd<br/>
                            Đure Daničića 17, 11000 Beograd
                        </p><br/>
                        @include('admin.layouts.crud.flash_message')
                        {!! Form::open(['route' => 'sendMail']) !!}

                        <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputIme1" style="font-weight: bold">Unesite svoje ime</label>
                                <input type="text" name="ime" class="form-control" id="exampleInputIme1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" style="font-weight: bold">E-mail</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNaslov1" style="font-weight: bold">Naslov poruke</label>
                                <input type="text" name="naslov"  class="form-control" id="exampleInputNaslov1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPoruka1" style="font-weight: bold">Poruka</label>
                                <textarea class="form-control" name="poruka" id="exampleInputPoruka1" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LeQOFYUAAAAAKavx2jWOMVERxRcIKoTnK_dw-eg"></div>
                            </div>
                            <button type="submit" class="submit-contact" style="font-weight: bold">POŠALJI</button>
                        </form>
                    </div>
                    <div class="span7">
                        <img src="{{ asset('assets/img/kontakt-people.png')}}" alt="Kontakt People"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="gmap">
            <div id="map_wrapper">
            <div id="map_canvas" class="mapping"></div>
            </div>
        </section>

    </section>
    <!-- End class="home" -->

</section>
<!-- End class="main" -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">


    jQuery(function($) {
    // Asynchronously Load the map API
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&?v=3&key=AIzaSyBYDkj2KlRcX8VrhdeZWOP1h7MvkL1HV8c";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };

    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);

    // Multiple Markers
    var markers = [
        ['Skola fotografije, Beograd',44.814654, 20.456004]
    ];

    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>Skola fotografije</h3>' +
        '<p>Skola fotografije.</p>' +        '</div>']
    ];

    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Loop through our array of markers & place each one on the map
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });

        // Allow each marker to have an info window
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });

}
</script>

@stop
