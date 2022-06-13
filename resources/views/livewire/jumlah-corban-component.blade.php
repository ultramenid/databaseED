<div>
    <div id="containerJumlahKorban" class="w-full h-96 relative mt-12 border border-gray-400"></div>
</div>

<script>
var korban = JSON.parse('<?php echo $korbans  ?>');
        console.log(korban);
        var options = {
          series: [{
            name: 'Jumlah Korban' ,
            type: 'bar',
            data: korban.jumlahkorban,
          },],


          chart: {
            id: 'bconduct',
            group: 'charts',
            width: '100%',
            height: '350px',

            toolbar: {
              show: true,
              offsetX: 0,
              offsetY: 0,
              tools: {
              download: true,
              selection: false,
              reset: false,
              zoom: false,
              zoomin: false,
              zoomout: false,
              pan: false
              },
            },

          },
          stroke: {
            width: [0, 2, 5],
            curve: 'smooth'
          },
          title: {
            text: 'Jumlah Korban',
            align: 'left',
            margin: 10,
            offsetX: 0,
            offsetY: 0,
            floating: false,

            },
          colors:['#835640', '#32a86d', '#32a86d'],
          fill: {
            colors: ['#835640', '#32a86d', '#32a86d'],
            gradient: {
              inverseColors: false,
              shade: 'light',
              type: "vertical",
              opacityFrom: 0.85,
              opacityTo: 0.55,
              stops: [0, 100, 100, 100]
            }
          },
          markers: {
            size: 0
          },
          labels:korban.tanggal,
          xaxis: {
              type: 'dec',
              categories: korban.tanggal
          },
          yaxis: {
            type: 'string',
            labels: {
              minWidth: 40,
            },
            min: 0,
            max: 100
          },
          tooltip: {
            shared: true,
            intersect: false,
            theme: "dark",

          },

        };
        var chart = new ApexCharts(document.querySelector("#containerJumlahKorban"), options);
        chart.render();
</script>
