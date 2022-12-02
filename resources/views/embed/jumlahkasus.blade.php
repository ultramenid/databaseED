@extends('layouts.backend')
@section('content')
<div>
    <div id="containerTahun" class="w-full h-screen object-cover"></div>


<script>

    var tahuns = JSON.parse('<?php echo $tahuns  ?>');
        console.log(tahuns);
    var options = {
          series: [{
          data: tahuns.jumlahkasus,
          name: 'Jumlah Kasus' ,
          type: 'column'
        },
        {
          name: 'Akumulasi Kasus',
          type: 'line',
          data: tahuns.tambahkasus,
        }],
          chart: {
            type: 'line',
            height: '600',
            stacked: true,
            background: '#112F3B',
            toolbar: {
            show: false
            },

        },


        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: false,
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [1, 1, 4]
        },
        xaxis: {
          categories: tahuns.tahun,
          labels: {
            style: {
              colors: '#32737E',
          },
          },
        },
        yaxis: {
          labels: {
            style: {
              colors: '#32737E',
          },
          },
        },
        tooltip: {
            shared: true,
            intersect: false,
            theme: "dark",

          },
        colors: ["#47A025","orange"],
        dataLabels: {
          enabled: true,
          style: {
            color: '#112F3B'
          }
        },
        legend: {
            offsetY: 6,
            labels: {
                colors: '#fff',
                useSeriesColors: false
            },
        }
    };

        var chart = new ApexCharts(document.querySelector("#containerTahun"), options);
        chart.render();


</script>
</div>

@endsection
