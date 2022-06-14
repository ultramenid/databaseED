<div>
    <div id="containergender" class="w-full h-96 relative mt-12 "></div>
</div>

<script>

    var options = {
          series:  [{{$genders->laki}}, {{$genders->perempuan}}, {{$genders->lakiperempuan}}],
          chart: {
          type: 'donut',
        },
        labels: [
        'Laki-Laki',
        'Perempuan',
        'Laki-Laki & Perempuan'
      ],
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
