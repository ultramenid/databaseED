<div>
    <div  id="map" class="h-106 w-full z-10"></div>
    <script>
        var map = L.map('map',{
            gestureHandling: true
        }).setView([0.7893, 117.9213],4,);
        var APP_URL = window.location.origin


        var dark = L.tileLayer('http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Dark_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'EnvirontmentalDefender | Auriga'
        });
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'EnvirontmentalDefender | Auriga'
        });

        var planet = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png', {
        attribution: 'EnvirontmentalDefender | Auriga'
        }).addTo(map);


        // var poly = L.tileLayer.betterWms('https://aws.simontini.id/geoserver/wms', {
        //     layers: 'kpa:Provinsibaru',
        //     transparent: true,
        //     format: 'image/png',
        // }).addTo(map);


        // var overlay = {
        //     'Batas Administrasi' : poly
        // }

        // var baseLayers = {
        // 'Esri Dark' : dark,
        // OpenstreetMap : osm,
        // 'Planet' : planet
        // };


        // L.control.layers(baseLayers, overlay).addTo(map);

        var markers = L.markerClusterGroup();

        // init map
        $.ajax({
            type: "GET",
            url: APP_URL+"/rest/test",
            dataType: "json",
            success: function (data) {
                L.geoJSON(data, {
                    onEachFeature : function(feature, layer){

                        layer.addTo(markers);
                    },
                    pointToLayer: function(feature){
                        // console.log(feature)
                        var marker = L.marker([feature.properties.lat, feature.properties.long]);
                        if(!feature.properties.namapelaku){
                                marker.bindPopup('<div class="flex flex-col text-black w-full">'+
                                ' <h1 class="text-xl font-semibold">'+feature.properties.kasus+'</h1>'+
                                    '<div class="mt-4 flex space-x-2"><a style="color:black" class="font-semibold"> Akibat:</a> <a style="color:black"> '+feature.properties.akibat+'</a></div>'+

                                    '<div class=" flex space-x-2"><a style="color:black" class="font-semibold">Tindakan:</a> <a style="color:black">'+feature.properties.bentukancaman+'</a></div>'+
                                    '<div class="flex space-x-2">'+
                                    '<a style="color:black" class="font-semibold">Pelaku:</a> <a style="color:black">'+feature.properties.pelaku+'</a>'+
                                    '</div>'+
                                                        '<div class="flex space-x-2">'+
                                        '<a style="color:black" class="font-semibold">Jumlah Korban: </a> <a style="color:black">'+feature.properties.jumlahkorban+'</a>' +
                                    '</div>'+
                                    '<div class="flex space-x-2">'+
                                        '<a style="color:black" class="font-semibold">Konflik Dengan: </a> <a style="color:black">'+feature.properties.konflikdengan+'</a>'+
                                    '</div>'+
                                    '<div class="flex space-x-2">'+
                                        '<a style="color:black" class="font-semibold">Sektor: </a> <a style="color:black">'+feature.properties.sektor+'</a>'+
                                    '</div>'+
                                    '<div class="flex space-x-2">'+
                                        '<a style="color:black" class="font-semibold">Lokasi: </a> <a style="color:black">'+feature.properties.provinsi+', '+feature.properties.kabkota+', '+feature.properties.kecamatan+'</a>'+
                                    '</div>'+
                                    '</div>'+
                                '</div>');
                            }else{
                                marker.bindPopup('<div class="flex flex-col text-black w-full">'+
                                ' <h1 class="text-xl font-semibold">'+feature.properties.kasus+'</h1>'+
                                    '<div class="mt-4 flex space-x-2"><a style="color:black" class="font-semibold"> Akibat:</a> <a style="color:black"> '+feature.properties.akibat+'</a></div>'+

                                    '<div class=" flex space-x-2"><a style="color:black" class="font-semibold">Tindakan:</a> <a style="color:black">'+feature.properties.bentukancaman+'</a></div>'+
                                    '<div class="flex space-x-2">'+
                                    '<a style="color:black" class="font-semibold">Pelaku:</a> <a style="color:black">'+feature.properties.pelaku+'</a>'+
                                    '</div>'+
                                                        '<div class="flex space-x-2">'+
                                    '<a style="color:black" class="font-semibold">Nama Pelaku:</a> <a style="color:black">'+feature.properties.namapelaku+'</a>'+
                                    '</div>'+
                                                        '<div class="flex space-x-2">'+
                                        '<a style="color:black" class="font-semibold">Jumlah Korban: </a> <a style="color:black">'+feature.properties.jumlahkorban+'</a>' +
                                    '</div>'+
                                    '<div class="flex space-x-2">'+
                                        '<a style="color:black" class="font-semibold">Konflik Dengan: </a> <a style="color:black">'+feature.properties.konflikdengan+'</a>'+
                                    '</div>'+
                                    '<div class="flex space-x-2">'+
                                        '<a style="color:black" class="font-semibold">Sektor: </a> <a style="color:black">'+feature.properties.sektor+'</a>'+
                                    '</div>'+
                                    '<div class="flex space-x-2">'+
                                        '<a style="color:black" class="font-semibold">Lokasi: </a> <a style="color:black">'+feature.properties.provinsi+', '+feature.properties.kabkota+', '+feature.properties.kecamatan+'</a>'+
                                    '</div>'+
                                    '</div>'+
                                '</div>');
                            }

                            return marker;
                    }
                })
                map.addLayer(markers);
                markers.on('clusterclick', function (a) {
                    a.layer.zoomToBounds();
                });
            }
        });

        // update map from filter
        Livewire.on('updateMap', dataUpdate => {
            markers.clearLayers();
            data = false;
            var dataUpdated = JSON.parse(dataUpdate)
            console.log(data)
            L.geoJSON(dataUpdated, {
                    onEachFeature : function(feature, layer){

                        layer.addTo(markers);
                    },
                    pointToLayer: function(feature){
                        var marker = L.marker([feature.properties.lat, feature.properties.long]);
                        marker.bindPopup('<div class="flex flex-col text-black w-full">'+
                        ' <h1 class="text-xl font-semibold">'+feature.properties.kasus+'</h1>'+
                            '<div class="mt-4 flex space-x-2"><a style="color:black" class="font-semibold"> Akibat:</a> <a style="color:black"> '+feature.properties.akibat+'</a></div>'+

                            '<div class=" flex space-x-2"><a style="color:black" class="font-semibold">Tindakan:</a> <a style="color:black">'+feature.properties.bentukancaman+'</a></div>'+
                            '<div class="flex space-x-2">'+
                            '<a style="color:black" class="font-semibold">Pelaku:</a> <a style="color:black">'+feature.properties.pelaku+'</a>'+
                            '</div>'+
                                                '<div class="flex space-x-2">'+
                            '<a style="color:black" class="font-semibold">Nama Pelaku:</a> <a style="color:black">'+feature.properties.namapelaku+'</a>'+
                            '</div>'+
                                                '<div class="flex space-x-2">'+
                                '<a style="color:black" class="font-semibold">Jumlah Korban: </a> <a style="color:black">'+feature.properties.jumlahkorban+'</a>' +
                            '</div>'+
                            '<div class="flex space-x-2">'+
                                '<a style="color:black" class="font-semibold">Konflik Dengan: </a> <a style="color:black">'+feature.properties.konflikdengan+'</a>'+
                            '</div>'+
                            '<div class="flex space-x-2">'+
                                '<a style="color:black" class="font-semibold">Sektor: </a> <a style="color:black">'+feature.properties.sektor+'</a>'+
                            '</div>'+
                            '</div>'+
                        '</div>');
                        return marker;
                    }
                })
                map.addLayer(markers);
                markers.on('clusterclick', function (a) {
                    a.layer.zoomToBounds();
                });

            map.addLayer(markers);
            markers.on('clusterclick', function (a) {
                a.layer.zoomToBounds();
            });

        })

    </script>
</div>
