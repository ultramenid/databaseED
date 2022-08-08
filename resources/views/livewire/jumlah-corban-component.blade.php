<div>
    <div id="containerJumlahKorban" class="w-full h-96 relative mt-12"></div>


<script>
            // console.log(tahuns);
            var options = {
                series: [{
                data: [@foreach ($korbans as $name) '{{$name->korbans}}', @endforeach],
                name: 'Jumlah Korban' ,
            }],
              chart: {
              type: 'bar',
              height: '100%'
            },

            title: {
                text: 'Jumlah Korban',
                align: 'left',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,

                },
            plotOptions: {
              bar: {
                borderRadius: 4,
                horizontal: true,
              }
            },
            dataLabels: {
              enabled: false
            },
            xaxis: {
              categories: [@foreach ($korbans as $name) '{{$name->YEAR}}', @endforeach],
            },
            tooltip: {
                shared: true,
                intersect: false,
                theme: "dark",

              },
            colors: ["#6B0504"],
            dataLabels: {
              enabled: true,
              style: {
                fontSize: '12px',
              }
            },
            };

            var chart = new ApexCharts(document.querySelector("#containerJumlahKorban"), options);
            chart.render();
    </script>
    </div>
