<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://wtgspain.com/vendor/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA4Lbe8AJMPexiG6tqDtrfXTYhUdLmW1M&callback=initMap&libraries=&v=weekly" async defer></script>
    <title>Polygon</title>
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
<script src="{{asset('/resources/js/Polygons.js')}}"></script>
<script >
    function initMap() {
        a = new Polygons('http://test.local/polygons')
        a.renderPolygons()

    }
</script>

<div id="map"></div>
</body>
</html>
