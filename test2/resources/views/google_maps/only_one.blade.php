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
<script src="{{asset('/resources/js/markers.js')}}"></script>
<div id="map"></div>
</body>
</html>
