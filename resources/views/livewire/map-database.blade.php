<div>
    <div id="map" class="h-106 w-full z-10"></div>

    <script>
        var map = L.map('map').setView([0.7893, 117.9213],4);


        var dark = L.tileLayer('http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Dark_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'EnvirontmentalDefender | Auriga'
        }).addTo(map);
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'EnvirontmentalDefender | Auriga'
        }).addTo(map);

        var planet = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png', {
        attribution: 'EnvirontmentalDefender | Auriga'
        }).addTo(map);

        var baseLayers = {
        'Esri Dark' : dark,
        OpenstreetMap : osm,
        'Planet' : planet
        };

        L.control.layers(baseLayers).addTo(map);

        var markers = L.markerClusterGroup();

        @foreach ($markers as $item )

            var marker = L.marker(new L.LatLng({{$item->lat}}, {{$item->long}}), { title: "{{$item->kasus}}"});
            marker.bindPopup('<div class="flex flex-col text-black w-full">'+
                ' <h1 class="text-xl font-semibold">{{$item->kasus}}</h1>'+
                    '<div class="mt-4 flex space-x-2"><a style="color:black" class="font-semibold"> Akibat:</a> <a style="color:black"> {{$item->akibat}}</a></div>'+

                    '<div class=" flex space-x-2"><a style="color:black" class="font-semibold">Tindakan:</a> <a style="color:black"> {{$item->bentukancaman}}</a></div>'+
                    '<div class="flex space-x-2">'+
                       '<a style="color:black" class="font-semibold">Pelaku:</a> <a style="color:black">{{$item->pelaku}}</a>'+
                    '</div>'+
                    @if($item->namapelaku)
                    '<div class="flex space-x-2">'+
                       '<a style="color:black" class="font-semibold">Nama Pelaku:</a> <a style="color:black">{{$item->namapelaku}}</a>'+
                    '</div>'+
                    @endif
                    '<div class="flex space-x-2">'+
                        '<a style="color:black" class="font-semibold">Jumlah Korban: </a> <a style="color:black">{{$item->jumlahkorban}}</a>' +
                    '</div>'+
                    '<div class="flex space-x-2">'+
                        '<a style="color:black" class="font-semibold">Konflik Dengan: </a> <a style="color:black">{{$item->konflikdengan}}</a>'+
                    '</div>'+
                    '<div class="flex space-x-2">'+
                        '<a style="color:black" class="font-semibold">Sektor: </a> <a style="color:black">{{$item->sektor}}</a>'+
                    '</div>'+
                    '</div>'+
                '</div>', {
                        maxWidth : 400
                    });
            markers.addLayer(marker);


        @endforeach




		map.addLayer(markers);

        markers.on('clusterclick', function (a) {
            a.layer.zoomToBounds();
        });

    </script>
</div>
