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
<script>
    let markers = []
    let points = []
    function initMap() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: {lat: 10, lng: 10},
            mapTypeId: "terrain"
        });

        const markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
                gridSize: 200,
                averageCenter: false});


        google.maps.event.addListener(map, 'bounds_changed', function() {
            $.post({
                url: 'http://test.local/marker',
                success: function (data) {
                    points = JSON.parse(data)

                    markers.forEach(marker => marker.setMap(null))
                    markerCluster.removeMarkers(markers)

                    markers = []
                    let locations = []
                    for (let i = 0; i < points.length; i++) if (map.getBounds().contains(points[i])) {
                        locations.push(points[i])
                        marker = new google.maps.Marker({
                            map: map,
                            draggable: true,
                            animation: google.maps.Animation.DROP,
                            position: {lat: points[i].lat, lng: points[i].lng}
                        })
                        markers.push(marker)

                    }

                    markerCluster.addMarkers(markers)




                }})
        })
    }


    // let markerCluster = new MarkerClusterer(map, [],
    //     {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
    //         gridSize: 360,
    //         averageCenter: true});
    // let points = JSON.parse(data)
    //
    // // markerCluster.removeMarkers(markers)
    // // markers.map(marker => marker.setMap(null))
    // let locations = []
    //
    // for (let i = 0; i < points.length; i++) {
    //     if (map.getBounds().contains(points[i])) {
    //         locations.push(points[i])
    //     }
    // }
    //
    // markers = []
    // locations.map(point => render(point, map))
    // markerCluster = new MarkerClusterer(map, markers,
    //     {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
    //     gridSize: 800,
    //     averageCenter: false});
    //
    // console.log(markers)
    // console.log(markerCluster.getMarkers())
    // }
    // });
    // });

    // }

    function render(point, map) {
        let image = ''
        if (typeof point['image'] !== "undefined") {
            image = point['image']
        }
        let marker = new google.maps.Marker({
            map: map,
            draggable: true,
            // animation: google.maps.Animation.DROP,
            position: {lat: point.lat, lng: point.lng},
            icon: image
        })

        markers.push(marker)

    }
</script>
<div id="map"></div>
</body>
</html>


