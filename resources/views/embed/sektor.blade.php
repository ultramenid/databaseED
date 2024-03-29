@extends('layouts.backend')
@section('content')

<div>
    <div id="containersektor" class="w-full h-screen"></div>


<script>
    var sektor = JSON.parse('<?php echo $sektors  ?>');
    // console.log(sektor)
var options = {
          series: [
          {
            data: [
              {
                x: 'Lingkungan Hidup',
                y: sektor.lingkunganhidup
              },
              {
                x: 'Hutan',
                y: sektor.hutan
              },
              {
                x: 'Kebun',
                y: sektor.kebun
              },
              {
                x: 'Tambang',
                y: sektor.tambang
              },
              {
                x: 'Energi',
                y: sektor.energi
              },
              {
                x: 'Tanah/Tanah Adat',
                y: sektor.tanahadat
              },
              {
                x: 'Perairan dan Kelautan',
                y: sektor.perairan
              },

            ]
          }
        ],
          legend: {
          show: false
        },
        chart: {
            width: '100%',
          height: '100%',
          type: 'treemap',
          background: '#112F3B',
          toolbar: {
            show: false
            },
        },

        dataLabels: {
          enabled: true,
          style: {
            fontSize: '12px',
          },
          formatter: function(text, op) {
            return [text, op.value]
          },
        },

        colors: [
          '#3B93A5',
          '#F7B844',
          '#ADD8C7',
          '#EC3C65',
          '#CDD7B6',
          '#C1F666',
          '#D43F97',
          '#1E5D8C',
          '#421243',
          '#7F94B0',
          '#EF6537',
          '#C0ADDB'
        ],
        plotOptions: {
          treemap: {
            distributed: true,
            useFillColorAsStroke: true,
            enableShades: false
          }
        },
        tooltip: {
            shared: true,
            intersect: false,
            theme: "dark",

          },
        };

        var chart = new ApexCharts(document.querySelector("#containersektor"), options);

        chart.render();

</script>
</div>


@endsection
