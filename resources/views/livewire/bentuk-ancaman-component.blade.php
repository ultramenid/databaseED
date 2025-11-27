<div>
    <div id="containerancaman" class="w-full h-64 relative mt-12 "></div>


<script>
document.addEventListener('livewire:load', function () {
    var genders = JSON.parse('<?php echo $genders  ?>');
    console.log(genders)
    var perusakanProperti = parseInt(genders.perusakanProperti || 0);
    var pembunuhan = parseInt(genders.pembunuhan || 0);
    var intimidasi = parseInt(genders.intimidasi || 0);
    var kekerasanFisik = parseInt(genders.kekerasanFisik || 0);
    var deportasi = parseInt(genders.deportasi || 0);
    var penyalahGunaanHukum = parseInt(genders.penyalahGunaanHukum || 0);
    // console.log(genders)
    var options = {
        //   series:  [perusakanProperti, pembunuhan, intimidasi, kekerasanFisik, deportasi, penyalahGunaanHukum],
          series:  [perusakanProperti, pembunuhan, intimidasi, kekerasanFisik, deportasi, penyalahGunaanHukum],
          chart: {
          type: 'donut',
          height: '400px',
          toolbar: {
         show: true
        },
        },
        title: {
          text: 'Tindakan',
        },
        labels: [
        'Perusakan Properti',
        'Pembunuhan',
        'Intimidasi',
        'Kekerasan Fisik',
        'Deportasi',
        'Penyalahgunaan Proses Hukum'
      ],
      colors:['#01befe','#ffdd00','#ff7d00','#ff006d','#4C6663','#8f00ff'],
      legend: {
          show:true,
          position: 'bottom',
          floating: false,
          verticalAlign: 'bottom',
          align:'center'
        },
        dataLabels: {
            formatter: function (val, opts) {
            return opts.w.config.series[opts.seriesIndex]; // Show raw number instead of %
            }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart:{
                width: '100%',
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };


        var chart = new ApexCharts(document.querySelector("#containerancaman"), options);
        Livewire.on('updateAncaman', dataUpdate => {
            updated = JSON.parse(dataUpdate);
            // console.log()
            var perusakanProperti = parseInt(updated.perusakanProperti || 0);
            var pembunuhan = parseInt(updated.pembunuhan || 0);
            var intimidasi = parseInt(updated.intimidasi || 0);
            var kekerasanFisik = parseInt(updated.kekerasanFisik || 0);
            var deportasi = parseInt(updated.deportasi || 0);
            var penyalahGunaanHukum = parseInt(updated.penyalahGunaanHukum || 0);
            chart.updateSeries([
                perusakanProperti, pembunuhan, intimidasi, kekerasanFisik, deportasi, penyalahGunaanHukum
            ])
            console.log(updated)
        })
        chart.render();
    })
</script>
</div>
