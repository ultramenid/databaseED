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
    google.charts.load('current', {'packages':['sankey']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'From');
        data.addColumn('string', 'To');
        data.addColumn('number', 'Total');
        data.addRows([
            ['Bentuk Ancaman', 'Akibat', 0],
            @foreach ($bentuks as $name) [ '{{$name->bentukancaman}}', '{{$name->akibat}}', {{getScore($name->bentukancaman, $name->akibat)}} ], @endforeach
        ]);

        var colors = ['#a6cee3', '#b2df8a', '#fb9a99', '#fdbf6f',
                  '#cab2d6', '#ffff99', '#1f78b4', '#33a02c'];
        // Sets chart options.
        var options = {
            width:'100%',
            animation:{
                startup: true,
                duration: 1000,
                easing: 'in',
            },
            sankey: {
                node: {
                colors: colors
                },
                link: {
                colorMode: 'gradient',
                colors: colors
                }
            }
        };

        // Instantiates and draws our chart, passing in some options.
        var chart = new google.visualization.Sankey(document.getElementById('containerbentukancaman'));
        chart.draw(data, options);
      }
</script>
</div>
