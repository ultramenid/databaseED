@extends('layouts.backend')
@section('content')
<div>
    <div id="containerTahun" class="w-full h-screen relative"></div>


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
          type: 'area',
          data: tahuns.tambahkasus,
        }],
          chart: {
          type: 'line',
          height: '100%',
          stacked: true
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
        },
        tooltip: {
            shared: true,
            intersect: false,
            theme: "dark",

          },
        colors: ["#47A025","#183A37"],
        dataLabels: {
          enabled: true,
          offsetX: -6,
          style: {
            fontSize: '12px',
          }
        },
    };

        var chart = new ApexCharts(document.querySelector("#containerTahun"), options);
        chart.render();


</script>
</div>

@endsection
