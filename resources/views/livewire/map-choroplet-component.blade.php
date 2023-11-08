<div>
    <div  id="map" class="h-106 w-full z-10"></div>
    <script>
        var data = <?php echo $data ; ?>;
        // console.log(data['ACEH'])

        var map = L.map('map',{
            gestureHandling: true
        }).setView([0.7893, 117.9213],4,);
        var dark = L.tileLayer('http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Dark_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'EnvirontmentalDefender | Auriga'
        });
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'EnvirontmentalDefender | Auriga'
        });

        var planet = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png', {
        attribution: 'EnvirontmentalDefender | Auriga'
        }).addTo(map);



        var baseLayers = {
        'Esri Dark' : dark,
        OpenstreetMap : osm,
        'Planet' : planet
        };


        L.control.layers(baseLayers, null , { position:'bottomleft'}).addTo(map);

        // control that shows state info on hover
	    const info = L.control();

        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function (props) {
            const contents = props ? `<b>${props.ProvID}</b><br />${ data[props.ProvID.toUpperCase()]  } Kasus <sup>2</sup>` : 'Arahkan kursor ke salah satu provinsi';
            this._div.innerHTML = `<h4>SEBARAN KASUS</h4>${contents}`;
        };

        info.addTo(map);


        // get color depending on population density value
        function getColor(d) {
            return d > 20  ? '#BD0026' :
                d > 10  ? '#BD0026' :
                d > 7  ? '#E31A1C' :
                d > 5   ? '#FD5E2A' :
                d > 3   ? '#FEC24C' :
                d > 1   ? '#FED976' :
                d == 0 ?  '#FFFFFF' :
                d == null ?  '#FFFFFF' :
                '#ffeda0';

        }

        function style(feature) {
            return {
                weight: 0.8,
                opacity: 1,
                color: 'black',
                dashArray: '1',
                fillOpacity: 0.8,
                fillColor: getColor(data[feature.properties.ProvID.toUpperCase()])
            };
        }

        function customTip() {
            this.unbindTooltip();
            if(!this.isPopupOpen()) this.bindTooltip('Short description').openTooltip();
        }

        function customPop() {
            this.unbindTooltip();
        }



        function highlightFeature(e) {
            const layer = e.target;
            // console.log()
            layer.setStyle({
                weight: 1,
                color: 'white',
                dashArray: '',
                fillOpacity: 0.7
            });

            layer.bringToFront();
            this.unbindTooltip();
            if(data[e.target.feature.properties.ProvID.toUpperCase()]){
                if(!this.isPopupOpen()) this.bindTooltip(`<b>${e.target.feature.properties.ProvID}</b><br />${ data[e.target.feature.properties.ProvID.toUpperCase()]  } Kasus`).openTooltip();
            }else{
                if(!this.isPopupOpen()) this.bindTooltip(`<b>${e.target.feature.properties.ProvID}</b>`).openTooltip();
            }

        }



        /* global statesData */
        const geojson = L.geoJson(statesData, {
            style,
            onEachFeature
        }).addTo(map);

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                // click: zoomToFeature
            });
        }

        // map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


        const legend = L.control({position: 'bottomright'});

        legend.onAdd = function (map) {

            const div = L.DomUtil.create('div', 'info legend');
            const grades = [0, 1, 3, 5, 7, 10, 20];
            const labels = [];
            let from, to;

            for (let i = 0; i < grades.length; i++) {
                from = grades[i];
                to = grades[i + 1];

                labels.push(`<i style="background:${getColor(from + 0)}"></i> ${from}${to ? `&ndash;${to}` : '+'}`);
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };

        legend.addTo(map);

    </script>
</div>
