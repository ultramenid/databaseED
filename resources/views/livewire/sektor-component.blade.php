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
        chart.render();






    // var options = {
    //       series: [
    //       {
    //         data: [
    //           {
    //             x: 'Lingkungan Hidup',
    //             y: sektor.lingkunganhidup
    //           },
    //           {
    //             x: 'Hutan',
    //             y: sektor.hutan
    //           },
    //           {
    //             x: 'Kebun',
    //             y: sektor.kebun
    //           },
    //           {
    //             x: 'Tambang',
    //             y: sektor.tambang
    //           },
    //           {
    //             x: 'Energi',
    //             y: sektor.energi
    //           },
    //           {
    //             x: 'Tanah/Tanah Adat',
    //             y: sektor.tanahadat
    //           },
    //           {
    //             x: 'Perairan dan Kelautan',
    //             y: sektor.perairan
    //           },

    //         ]
    //       }
    //     ],
    //       legend: {
    //       show: false
    //     },
    //     chart: {
    //         width: '100%',
    //       height: '100%',
    //       type: 'treemap'
    //     },
    //     title: {
    //       text: 'Sektor',
    //       align: 'left'
    //     },
    //     dataLabels: {
    //       enabled: true,
    //       style: {
    //         fontSize: '12px',
    //       },
    //       formatter: function(text, op) {
    //         return [text, op.value]
    //       },
    //       offsetY: -4
    //     },

    //     colors: [
    //       '#3B93A5',
    //       '#F7B844',
    //       '#ADD8C7',
    //       '#EC3C65',
    //       '#CDD7B6',
    //       '#C1F666',
    //       '#D43F97',
    //       '#1E5D8C',
    //       '#421243',
    //       '#7F94B0',
    //       '#EF6537',
    //       '#C0ADDB'
    //     ],
    //     plotOptions: {
    //       treemap: {
    //         distributed: true,
    //         enableShades: false
    //       }
    //     },

    //     };

    //     var chart = new ApexCharts(document.querySelector("#containersektor"), options);
    //     Livewire.on('updateSektor', dataUpdate => {
    //         updated = JSON.parse(dataUpdate);
    //         chart.updateSeries([{
    //             data: [
    //           {
    //             x: 'Lingkungan Hidup',
    //             y: updated.lingkunganhidup
    //           },
    //           {
    //             x: 'Hutan',
    //             y: updated.hutan
    //           },
    //           {
    //             x: 'Kebun',
    //             y: updated.kebun
    //           },
    //           {
    //             x: 'Tambang',
    //             y: updated.tambang
    //           },
    //           {
    //             x: 'Energi',
    //             y: updated.energi
    //           },
    //           {
    //             x: 'Tanah/Tanah Adat',
    //             y: updated.tanahadat
    //           },
    //           {
    //             x: 'Perairan dan Kelautan',
    //             y: updated.perairan
    //           },

    //         ]
    //             },

    //         ])
    //         console.log(updated)
    //     })
    //     chart.render();

</script>
</div>
