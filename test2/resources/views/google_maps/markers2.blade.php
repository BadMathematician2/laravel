<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://wtgspain.com/vendor/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@5.1.0/dist/markerclustererplus.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA4Lbe8AJMPexiG6tqDtrfXTYhUdLmW1M&callback=initMap&libraries=&v=weekly" async defer></script>
    <title>Map</title>
    <style>
        #map {
            height: 100%;
        }
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<script src="{{asset('/resources/js/BaseMap.js')}}"></script>
<script src="{{asset('/resources/js/Markers.js')}}"></script>
<script src="{{asset('/resources/js/MakePolygon.js')}}"></script>
<script >
    function initMap() {
        a = new MakePolygon()
        a.render()
        console.log(2)


        // const map = new google.maps.Map(document.getElementById("map"), {
        //     zoom: 8,
        //     center: {lat: 10, lng: 10},
        //     mapTypeId: "terrain"
        // });
        //
        // let m = new google.maps.Marker({
        //     position: {lat: 10, lng: 10},
        //     map: map
        // })
        // console.log(m.position)


        // let a = new Markers('http://test.local/marker')
        // a.renderMarkers()
    }
</script>
<div id="map"></div>
</body>
</html>


