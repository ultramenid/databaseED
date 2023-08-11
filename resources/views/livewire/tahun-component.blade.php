<div>
    <div id="containerTahun" class="w-full h-96 relative mt-12"></div>


<script>
document.addEventListener('livewire:load', function () {

    var tahuns = JSON.parse('<?php echo $tahuns  ?>');
        // console.log(tahuns);
    var chart = Highcharts.chart('containerTahun', {
                chart: {
                zoomType: 'xy',
                },
                exporting: { enabled: true },
                title: {
                    text : ''
                },

                xAxis: [{
                    categories: tahuns.tahun,
                    crosshair: true
                }],
                yAxis: [{ // Primary yAxis

                    title: {
                        enabled: false,
                    }
                }, { // Secondary yAxis
                    title: {
                        enabled: false,
                    },
                    labels: {
                        enabled: false,
                    },

                }],
                plotOptions: {
                        spline: { // has to say spline here
                            dataLabels: {
                                enabled: true
                            },

                        },
                        column: { // has to say spline here
                            dataLabels: {
                                enabled: true,
                                y: 999999999999,
                                style: {
                                    color: 'white'
                                },
                            },
                        }
                    },
                tooltip: {
                    shared: true
                },

                legend: {
                    labelFormat: '<span style="color:black">{name}</span>'
                },
                credits:false,
                colors: ['#E6B851', '#88B3E7'],
                series: [{
                    name: 'Jumlah Kasus',
                    type: 'column',
                    yAxis: 1,
                    data: tahuns.jumlahkasus,


                }, {
                    name: 'Akumulasi Kasus',
                    type: 'spline',
                    data: tahuns.tambahkasus,

                }]
            });
        Livewire.on('updateTahun', dataUpdate => {
            updated = JSON.parse(dataUpdate);
            chart.series[0].setData(updated.jumlahkasus);
            chart.series[1].setData(updated.tambahkasus);

            // console.log(updated)
        })

    })
</script>
</div>
