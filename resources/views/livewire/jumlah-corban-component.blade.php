<div>
    <div id="containerJumlahKorban" class="w-full h-96 relative mt-12"></div>


<script>
document.addEventListener('livewire:load', function () {

          var korbans = JSON.parse('<?php echo $korbans  ?>');
          console.log(korbans);
            var options = {
                series: [{
                data: korbans.jumlahkorban,
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
                borderRadius: 0,
                horizontal: true,
              }
            },
            dataLabels: {
              enabled: false
            },
            xaxis: {
              categories: korbans.tahun,
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
            Livewire.on('updateJumlahKorban', dataUpdate => {
            updated = JSON.parse(dataUpdate);
            chart.updateOptions( {
                xaxis: {
                categories: updated.tahun
                }
            });
            chart.updateSeries([{
                data: updated.jumlahkorban,
                name: 'Jumlah Kasus' ,
                type: 'column'
                }
            ])
            console.log(updated)
        })
            chart.render();
        })
    </script>
    </div>
