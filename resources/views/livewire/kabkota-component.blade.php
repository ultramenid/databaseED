<div>
    <div id="containerkabkota" class="w-full h-96 relative mt-12"></div>


<script>
document.addEventListener('livewire:load', function () {

    var kabkota = JSON.parse('<?php echo $kabkota  ?>');
        // console.log(kabkota);
    var chart = Highcharts.chart('containerkabkota', {
                chart: {
                zoomType: 'xy',
                },
                exporting: { enabled: true },
                title: {
                    text : 'Kabupaten/kota'
                },

                xAxis: [{
                    categories: kabkota.kabkota,
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
                    data: kabkota.jumlahkasus,


                }],
            });
        Livewire.on('updateTahun', dataUpdate => {
            updated = JSON.parse(dataUpdate);
            chart.series[0].setData(updated.jumlahkasus);

            // console.log(updated)
        })

    })
</script>
</div>
