<div>
    <div id="containersektor" class="w-full h-96"></div>


<script>
    var sektor = JSON.parse('<?php echo $sektors  ?>');
    console.log(sektor)

    var options = {
            series: [
                parseInt(sektor.lingkunganhidup),
                parseInt(sektor.hutan),
                parseInt(sektor.tambang),
                parseInt(sektor.kebun),
                parseInt(sektor.tanahadat),
                parseInt(sektor.energi),
                parseInt(sektor.perairan)
            ],
            chart: {
            type: 'pie',
            height: '100%',
            toolbar: {
                show: true
            },
        },
        title: {
          text: 'Sektor',
          align: 'left'
        },
        legend: {
          show:true,
          position: 'bottom',
          floating: false,
          verticalAlign: 'bottom',
          align:'center'
        },
        colors:['#61c67a','#4a6741','#474454', '#e4c512', '#795243', '#3B8EA5', '#2b81d3'],
        labels: ['Lingkungan Hidup', 'Hutan', 'Tambang', 'Kebun', 'Tanah Adat', 'Energi', 'Perairan & Kelautan'],
        responsive: [{
        //   breakpoint: 100,
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




        var chart = new ApexCharts(document.querySelector("#containersektor"), options);
        Livewire.on('updateSektor', dataUpdate => {
            updated = JSON.parse(dataUpdate);
            chart.updateSeries([
                parseInt(updated.lingkunganhidup),
                parseInt(updated.hutan),
                parseInt(updated.tambang),
                parseInt(updated.kebun),
                parseInt(updated.tanahadat),
                parseInt(updated.energi),
                parseInt(updated.perairan)
            ])
            console.log(updated)
        })
        chart.render();







</script>
</div>
