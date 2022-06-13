<div>
    <div id="containergender" class="w-full h-96 relative mt-12 "></div>
</div>

<script>
    var options = {
      chart: {
        width: '100%',
        type: 'pie',
        toolbar: {
         show: true
        },
      },
      title: {
            text: 'Jumlah Gender',
            align: 'left',
            margin: 10,
            offsetX: 0,
            offsetY: 0,
            floating: false,

            },
      labels: [
        'Laki-Laki',
        'Perempuan',
        'Laki-Laki & Perempuan'
      ],
      series: [{{$genders->laki}}, {{$genders->perempuan}}, {{$genders->lakiperempuan}}],
      dataLabels: {
        formatter: function (val, opts) {
            return opts.w.config.series[opts.seriesIndex]
        },
      },
      legend: {
          show:true,
          position: 'bottom',
          floating: false,
          verticalAlign: 'bottom',
          align:'center'
        },
    }


        var chart = new ApexCharts(document.querySelector("#containergender"), options);
        chart.render();

</script>
