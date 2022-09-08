<div>
    <h1 class="font-bold">Data ancaman ED</h1>
    <div id="containerbentukancaman" class="w-full h-96 relative mt-6 "></div>

{{-- <script>
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
            offsetY:0
          }
        },
        title: {
          text: 'Bentuk Ancaman',
          align: 'left'
        },
        grid: {
          padding: {
            bottom: 0
          }
        },
        labels: [
        'Kriminalisasi',
        'Ancaman Fisik',
        'Ancaman Psikologis/Non Fisik'
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

          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#containerbentukancaman"), options);
        chart.render();
</script> --}}
<script>
document.addEventListener('livewire:load', function () {
    var bentuk = JSON.parse('<?php echo $bentuktest  ?>');
    // console.log(bentuk)

    var H = Highcharts;

    H.seriesTypes.sankey.prototype.pointAttribs = function(point, state) {
        var opacity = this.options.linkOpacity,
            color = point.color;

        if (state) {
            opacity = this.options.states[state].linkOpacity || opacity;
            color = this.options.states[state].color || point.color;
        }

        return {
            fill: point.isNode ?
                color : {
                    linearGradient: {
                        x1: 0,
                        x2: 1,
                        y1: 0,
                        y2: 0
                    },
                    stops: [
                        [0, H.color(color).setOpacity(opacity).get()],
                        [1, H.color(point.toNode.color).setOpacity(opacity).get()]
                    ]
                }
        };
    }
    const chart = Highcharts.chart('containerbentukancaman', {

        title: {
            text: 'Bentuk Ancaman dan Akibat'
        },
        accessibility: {
            point: {
                valueDescriptionFormat: '{index}. {point.from} to {point.to}, {point.weight}.'
            }
        },
        series: [{
            keys: ['from', 'to', 'weight'],
            data: bentuk,
            type: 'sankey',
            name: 'Bentuk Ancaman dan Akibat'

        }],
        exporting: {
            buttons: {
            contextButton: {
                menuItems: ["printChart",
                            "separator",
                            "downloadPNG",
                            "downloadJPEG",
                            "separator",
                            "downloadCSV",
                            "openInCloud"]
            }
            }
        }
    });

    Livewire.on('updateSankey', dataUpdate => {
        updated = JSON.parse(dataUpdate);
        // chart.redraw();
        chart.series[0].setData(updated);
        // console.log(updated)
    })
})
</script>
</div>
