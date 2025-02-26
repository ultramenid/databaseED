<div>
    <div id="containergender" class="w-full h-96 relative mt-12 "></div>


<script>
document.addEventListener('livewire:load', function () {
    var genders = JSON.parse('<?php echo $genders  ?>');
    var laki = parseInt(genders.laki)
    var perempuan = parseInt(genders.perempuan)
    var lakiperempuan = parseInt(genders.lakiperempuan)
    // console.log(genders)
    var options = {
          series:  [laki, perempuan, lakiperempuan],
          chart: {
          type: 'donut',
          toolbar: {
         show: true
        },
        },
        title: {
          text: 'Gender',
        },
        labels: [
        'Laki-Laki',
        'Perempuan',
        'Laki-Laki & Perempuan'
      ],
      colors:['#020122','#F49097','#CC2936'],
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
            legend: {
              position: 'bottom'
            }
          }
        }]
        };


        var chart = new ApexCharts(document.querySelector("#containergender"), options);
        Livewire.on('updateGender', dataUpdate => {
            updated = JSON.parse(dataUpdate);
            // console.log()
            var laki = parseInt(updated.laki)
            var perempuan = parseInt(updated.perempuan)
            var lakiperempuan = parseInt(updated.lakiperempuan)
            chart.updateSeries([
                laki, perempuan,lakiperempuan
            ])
            console.log(updated)
        })
        chart.render();
    })
</script>
</div>
