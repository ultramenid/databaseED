<div>
    <div id="containerTahun" class="w-full h-96 relative mt-12"></div>
</div>

<script>
var tahuns = JSON.parse('<?php echo $tahuns  ?>');
        console.log(tahuns);
        var options = {
          series: [{
          data: tahuns.jumlahkasus,
          name: 'Jumlah Kasus' ,
        }],
          chart: {
          type: 'bar',
          height: '100%'
        },
        title: {
            text: 'Jumlah Kasus',
            align: 'left',
            margin: 10,
            offsetX: 0,
            offsetY: 0,
            floating: false,

            },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: tahuns.tahun,
        },
        tooltip: {
            shared: true,
            intersect: false,
            theme: "dark",

          },
        colors: ["#E9B305"]
        };

        var chart = new ApexCharts(document.querySelector("#containerTahun"), options);
        chart.render();
</script>
