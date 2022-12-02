@extends('layouts.backend')
@section('content')

<div>
    <div id="containergender" class="w-full h-full relative"></div>


<script>
    var genders = JSON.parse('<?php echo $genders  ?>');
    var laki = parseInt(genders.laki)
    var perempuan = parseInt(genders.perempuan)
    var lakiperempuan = parseInt(genders.lakiperempuan)
    // console.log(lakiperempuan)
    var options = {
          series:  [laki, perempuan, lakiperempuan],
          chart: {
          type: 'donut',
          toolbar: {
         show: true
        },
        },
        title: {
          text: 'Gender',
          align: 'left'
        },
        labels: [
        'Laki-Laki',
        'Perempuan',
        'Laki-Laki & Perempuan'
      ],
      colors:['#020122','#F49097','#CC2936'],
      legend: {
          show:true,
          position: 'bottom',
          floating: false,
          verticalAlign: 'bottom',
          align:'center'
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: '100%'
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };


        var chart = new ApexCharts(document.querySelector("#containergender"), options);

        chart.render();
</script>
</div>

@endsection
