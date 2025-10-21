<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.14.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.14.0/mapbox-gl.css" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script type="module">
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2phbWlsIiwiYSI6ImNtZ3lybm5seDAyNDAya3BzdnBpZHY3dXMifQ.5Hi_zT9Uavbameol5u5Qpw';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [107.6352581, -6.8960258], // start, bisa diganti dengan koordinate posisi sekarang, [long, lat]
            zoom: 12,
        });

        const bounds = [[108.6352581, -6.5960258], [107.3352581, -6.9860258]];
        map.setMaxBounds(bounds);

        const start = [107.6352581, -6.8960258]; // start, bisa diganti dengan koordinate posisi sekarang, [long, lat]
        let end = [107.6693699, -6.646525];


        async function getRoute(end) {

            let api = `https://api.mapbox.com/directions/v5/mapbox/driving/${start[0]},${start[1]};${end[0]},${end[1]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`;

            const query = await fetch(api);

            const json = await query.json();

            const data = json.routes[0];

            const route = data.geometry;

            const geojson = {
                'type': 'Feature',
                'properties': {},
                'geometry': data.geometry
            };

            if (map.getSource('route')) {
                map.getSource('route').setData(geojson);
            } else {
                map.addLayer({
                    id: 'route',
                    type: 'line',
                    source: {
                        type: 'geojson',
                        data: geojson,
                    },
                    layout: {
                        'line-join': 'round',
                        'line-cap': 'round',
                    },
                    paint: {
                        'line-color': '#3887be',
                        'line-width': 5,
                        'line-opacity': 0.75
                    }
                });
            }
        }
    </script>
</body>

</html>