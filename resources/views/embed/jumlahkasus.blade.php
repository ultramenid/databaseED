@extends('layouts.backend')
@section('content')
<div>
    <div id="containerTahun" class="w-full h-screen object-cover" ></div>


<script>

    var tahuns = JSON.parse('<?php echo $tahuns  ?>');
        // console.log(tahuns);
            Highcharts.chart('containerTahun', {
                chart: {
                zoomType: 'xy',
                backgroundColor: '#112F3B',
                },
                exporting: { enabled: false },
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
                    labelFormat: '<span style="color:white">{name}</span>'
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



</script>
</div>

@endsection
