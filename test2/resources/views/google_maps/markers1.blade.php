{{--Без групування, але зі зміною мареверів після змінии маштабу--}}

<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://wtgspain.com/vendor/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@5.1.0/dist/markerclustererplus.min.js"></script>
{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA4Lbe8AJMPexiG6tqDtrfXTYhUdLmW1M&callback=initMap&libraries=&v=weekly" async defer></script>--}}
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

<script>

    // a = {domain: 'test', columns: ['type', 'status']}
    // console.log(JSON.parse(a))
        $.ajax({
            url: 'http://test.local/api/domain',
            data: {domain: 'tets.local', columns: ['type'], manager: 'App\\Manager'},
            success: function (data) {
                // alert(data)
                console.log(data)
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            method: 'GET'
        })

</script>


{{--<script>--}}
{{--    let markers = [];--}}

{{--    function initMap() {--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
{{--            }--}}
{{--        })--}}

{{--        const map = new google.maps.Map(document.getElementById("map"), {--}}
{{--            zoom: 8,--}}
{{--            center: {lat: 10, lng: 10},--}}
{{--            mapTypeId: "terrain"--}}
{{--        });--}}

{{--        google.maps.event.addListener(map, 'bounds_changed', function() {--}}
{{--            $.get({--}}
{{--                url: 'http://test.local/extension/domain',--}}
{{--                data: {domain: "abc"},--}}
{{--                success: function (data) {--}}
{{--                    console.log(data)--}}
{{--                    // let points = JSON.parse(data)--}}
{{--                    //--}}
{{--                    // markers.map(marker => marker.setMap(null))--}}
{{--                    // let locations = []--}}
{{--                    //--}}
{{--                    // for (let i = 0; i < points.length; i++) {--}}
{{--                    //     if (map.getBounds().contains(points[i])) {--}}
{{--                    //         locations.push(points[i])--}}
{{--                    //     }--}}
{{--                    // }--}}
{{--                    // markers = []--}}
{{--                    // locations.map(point => render(point, map))--}}
{{--                    // console.log(markers)--}}

{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    }--}}

{{--    function render(point, map) {--}}
{{--        let image = ''--}}
{{--        if (typeof point['image'] !== "undefined") {--}}
{{--            image = point['image']--}}
{{--        }--}}
{{--        let marker = new google.maps.Marker({--}}
{{--            map: map,--}}
{{--            draggable: true,--}}
{{--            // animation: google.maps.Animation.DROP,--}}
{{--            position: {lat: point.lat, lng: point.lng},--}}
{{--            icon: image--}}
{{--        })--}}

{{--        markers.push(marker)--}}
{{--    }--}}
{{--</script>--}}
<div id="map"></div>
</body>
</html>


