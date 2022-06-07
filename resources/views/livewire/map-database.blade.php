<div>
    <div id="map" class="h-96 w-full"></div>

    <script>
        var map = L.map('map').setView([0.7893, 117.9213],4);


        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | EnvironmentalDefender'
        }).addTo(map);

        var markers = L.markerClusterGroup();

        @foreach ($markers as $item )
            var marker = L.marker(new L.LatLng({{$item->lat}}, {{$item->long}}));
            markers.addLayer(marker);

        @endforeach



		map.addLayer(markers);
        markers.on('clusterclick', function (a) {
            a.layer.zoomToBounds();
        });

    </script>
</div>
