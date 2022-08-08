<div>
    <div id="containergender" class="w-full h-96 relative mt-12 "></div>


<script>

    var options = {
          series:  [{{$genders->laki}}, {{$genders->perempuan}}, {{$genders->lakiperempuan}}],
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
