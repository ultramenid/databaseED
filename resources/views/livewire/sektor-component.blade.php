<div>
    <div id="containersektor" class="w-full h-96 relative mt-12 "></div>
</div>

<script>
var options = {
          series: [
          {
            data: [
              {
                x: 'Lingkungan Hidup',
                y: {{$sektors->lingkunganhidup}}
              },
              {
                x: 'Hutan',
                y: {{$sektors->hutan}}
              },
              {
                x: 'Kebun',
                y: {{$sektors->kebun}}
              },
              {
                x: 'Tambang',
                y: {{$sektors->tambang}}
              },
              {
                x: 'Energi',
                y: {{$sektors->energi}}
              },
              {
                x: 'Tanah/Tanah Adat',
                y: {{$sektors->tanahadat}}
              },
              {
                x: 'Perairan dan Kelautan',
                y: {{$sektors->perairan}}
              },

            ]
          }
        ],
          legend: {
          show: false
        },
        chart: {
            width: '100%',
          height: '100%',
          type: 'treemap'
        },
        title: {
          text: 'Sektor',
          align: 'left'
        },
        colors: [
          '#3B93A5',
          '#F7B844',
          '#ADD8C7',
          '#EC3C65',
          '#CDD7B6',
          '#C1F666',
          '#D43F97',
          '#1E5D8C',
          '#421243',
          '#7F94B0',
          '#EF6537',
          '#C0ADDB'
        ],
        plotOptions: {
          treemap: {
            distributed: true,
            enableShades: false
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#containersektor"), options);
        chart.render();

</script>
