<div>
    <div id="containerTahun" class="w-full h-96 relative mt-12"></div>


<script>
document.addEventListener('livewire:load', function () {

    var tahuns = JSON.parse('<?php echo $tahuns  ?>');
        // console.log(tahuns);
    var options = {
          series: [{
          data: tahuns.jumlahkasus,
          name: 'Jumlah Kasus' ,
          type: 'column'
        },
        {
          name: 'Akumulasi Kasus',
          type: 'area',
          data: tahuns.tambahkasus,
        }],
          chart: {
          type: 'line',
          height: '100%',
          stacked: true
        },

        title: {
            text: 'Jumlah Kasus',
            align: 'left',
            margin: 10,
            offsetX: 0,
            offsetY: 0,
            floating: false,

            },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: false,
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [1, 1, 4]
        },
        xaxis: {
          categories: tahuns.tahun,
        },
        tooltip: {
            shared: true,
            intersect: false,
            theme: "dark",

          },
        colors: ["#47A025","#183A37"],
        dataLabels: {
          enabled: true,
          offsetX: -6,
          style: {
            fontSize: '12px',
          }
        },
    };

        var chart = new ApexCharts(document.querySelector("#containerTahun"), options);

        Livewire.on('updateTahun', dataUpdate => {
            updated = JSON.parse(dataUpdate);
            chart.updateSeries([{
                data: updated.jumlahkasus,
                name: 'Jumlah Kasus' ,
                type: 'column'
                },
                {
                name: 'Akumulasi Kasus',
                type: 'area',
                data: updated.tambahkasus,
                }
            ])
            // console.log(updated)
        })
        chart.render();

    })
</script>
</div>
