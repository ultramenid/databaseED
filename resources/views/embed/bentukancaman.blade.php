@extends('layouts.backend')
@section('content')

<div>
    <div id="containerbentukancaman" class="w-full h-screen relative"></div>


<script>
document.addEventListener('livewire:load', function () {
    var bentuk = JSON.parse('<?php echo $bentuktest  ?>');
    // console.log(bentuk)

    var H = Highcharts;

    H.seriesTypes.sankey.prototype.pointAttribs = function(point, state) {
        var opacity = this.options.linkOpacity,
            color = point.color;

        if (state) {
            opacity = this.options.states[state].linkOpacity || opacity;
            color = this.options.states[state].color || point.color;
        }

        return {
            fill: point.isNode ?
                color : {
                    linearGradient: {
                        x1: 0,
                        x2: 1,
                        y1: 0,
                        y2: 0
                    },
                    stops: [
                        [0, H.color(color).setOpacity(opacity).get()],
                        [1, H.color(point.toNode.color).setOpacity(opacity).get()]
                    ]
                }
        };
    }
    const chart = Highcharts.chart('containerbentukancaman', {

        title: {
            text: 'Bentuk Ancaman dan Akibat'
        },
        accessibility: {
            point: {
                valueDescriptionFormat: '{index}. {point.from} to {point.to}, {point.weight}.'
            }
        },
        series: [{
            keys: ['from', 'to', 'weight'],
            data: bentuk,
            type: 'sankey',
            name: 'Bentuk Ancaman dan Akibat'

        }],
        exporting: {
            buttons: {
            contextButton: {
                menuItems: ["printChart",
                            "separator",
                            "downloadPNG",
                            "downloadJPEG",
                            "separator",
                            "downloadCSV",
                            "openInCloud"]
            }
            }
        }
    });


})
</script>
</div>


@endsection
