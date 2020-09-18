<!DOCTYPE html>
<html>
<head>
    <title>Place Details</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA4Lbe8AJMPexiG6tqDtrfXTYhUdLmW1M&callback=initMap&libraries=places&v=weekly" defer></script>
{{--    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2P-BgnNwCT1PmnpzSyUu_ZxBlTY82BNo&callback&libraries=places"></script>--}}
    <style type="text/css">
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
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -33.866,
                    lng: 151.196
                },
                zoom: 15
            });
            const request = {
                placeId: "ChIJN1t_tDeuEmsRUsoyG83frY4",
                fields: ["name", "formatted_address", "place_id", "geometry"]
            };
            const infowindow = new google.maps.InfoWindow();

            const service = new google.maps.places.PlacesService(map);

            service.getDetails(request, (place, status) => {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    const marker = new google.maps.Marker({
                        map,
                        position: place.geometry.location
                    });
                    google.maps.event.addListener(marker, "click", function() {
                        infowindow.setContent(
                            "<div><strong>" +
                            place.name +
                            "</strong><br>" +
                            "Place ID: " +
                            place.place_id +
                            "<br>" +
                            place.formatted_address +
                            "</div>"
                        );
                        infowindow.open(map, this);
                    });
                }
            });
        }
    </script>
</head>
<body>
<div id="map"></div>
</body>
</html>
