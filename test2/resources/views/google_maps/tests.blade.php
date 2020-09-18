<!DOCTYPE html>
<html>
<head>
    <title>Adding State to Controls</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA4Lbe8AJMPexiG6tqDtrfXTYhUdLmW1M&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
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

        #goCenterUI,
        #setCenterUI {
            background-color: #fff;
            border: 2px solid #fff;
            border-radius: 3px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            float: left;
            margin-bottom: 22px;
            text-align: center;
        }

        #goCenterText,
        #setCenterText {
            color: #191919;
            font-family: Roboto, Arial, sans-serif;
            font-size: 15px;
            line-height: 25px;
            padding-left: 5px;
            padding-right: 5px;
        }

        #setCenterUI {
            margin-left: 12px;
        }
    </style>
    <script>
        "use strict";

        let map;
        const chicago = {
            lat: 41.85,
            lng: -87.65
        };
        /**
         * The CenterControl adds a control to the map that recenters the map on
         * Chicago.
         */

        class CenterControl {
            constructor(controlDiv, map) {
                this.map = map;

                controlDiv.style.clear = "both";

                const clearPolygonUI = document.createElement("div");
                clearPolygonUI.id = "goCenterUI";
                clearPolygonUI.title = "Click to recenter the map";
                controlDiv.appendChild(clearPolygonUI);

                const clearPolygonText = document.createElement("div");
                clearPolygonText.id = "goCenterText";
                clearPolygonText.innerHTML = "Center Map";
                clearPolygonUI.appendChild(clearPolygonText);

                const sendPolygonUI = document.createElement("div");
                sendPolygonUI.id = "setCenterUI";
                sendPolygonUI.title = "Click to change the center of the map";
                controlDiv.appendChild(sendPolygonUI);

                const sendPolygonText = document.createElement("div");
                sendPolygonText.id = "setCenterText";
                sendPolygonText.innerHTML = "Set Center";
                sendPolygonUI.appendChild(sendPolygonText);


                clearPolygonUI.addEventListener("click", () => {
                    const currentCenter = this.center;
                    this.map.setCenter(currentCenter);
                });

                sendPolygonUI.addEventListener("click", () => {
                    const newCenter = this.map.getCenter();
                    this.center = newCenter;
                });
            }
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: chicago
            }); // Create the DIV to hold the control and call the CenterControl()
            // constructor passing in this DIV.

            const centerControlDiv = document.createElement("div");
            const control = new CenterControl(centerControlDiv, map, chicago);
            centerControlDiv.index = 1;
            centerControlDiv.style.paddingTop = "10px";
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(
                centerControlDiv
            );
        }
    </script>
</head>
<body>
<div id="map"></div>
</body>
</html>
