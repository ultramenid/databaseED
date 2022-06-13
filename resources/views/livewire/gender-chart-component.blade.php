<div>
    <div id="containergender" class="w-full h-96 relative mt-12 "></div>
</div>

<script>
    // var options = {
    //       series: [{{$genders->laki}}, {{$genders->perempuan}}, {{$genders->lakiperempuan}}],
    //       chart: {
    //       height: '100%',
    //       type: 'radialBar',
    //     },
    //     plotOptions: {
    //       radialBar: {
    //         dataLabels: {
    //           name: {
    //             fontSize: '22px',
    //           },
    //           value: {
    //             fontSize: '16px',
    //           },
    //           total: {
    //             show: false,
    //             label: 'Total',
    //             formatter: function (w) {
    //               // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
    //               return 249
    //             }
    //           }
    //         }
    //       }
    //     },
    //     labels: ['Laki-Laki', 'Perempuan', 'Laki-Laki & Perempuan'],
    //     };

    //     var chart = new ApexCharts(document.querySelector("#containergender"), options);
    //     chart.render();
    var options = {
      chart: {
        width: '100%',
        type: 'donut',
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
