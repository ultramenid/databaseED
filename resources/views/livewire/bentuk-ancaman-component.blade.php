<div>
    <div id="containerbentukancaman" class="w-full h-96 relative mt-12 "></div>
</div>

<script>
var options = {
          series: [{{$bentuks->kriminalisasi}}, {{$bentuks->ancamanfisik}}, {{$bentuks->ancamannonfisik}}],
          chart: {
          type: 'donut',
          width: '100%',
          height: '100%',
          toolbar: {
         show: true
        },
        },
        plotOptions: {
          pie: {
            startAngle: -90,
            endAngle: 90,
            offsetY: 20
          }
        },
        title: {
          text: 'Bentuk Ancaman',
          align: 'left'
        },
        grid: {
          padding: {
            bottom: -90
          }
        },
        labels: [
        'Kriminalisasi',
        'Ancaman Fisik',
        'Ancaman Psikologin/Non Fisik'
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
              width: 200
            },

          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#containerbentukancaman"), options);
        chart.render();
</script>
