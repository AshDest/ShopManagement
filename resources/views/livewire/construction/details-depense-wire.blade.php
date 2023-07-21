<div>
    {{-- Success is as dangerous as failure. --}}

    @push('jschart_depense')
    <script>
        var options = {
            series: [{
                name: 'Inflation',
                data: [200, 4000, 2000, 1500]
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val + "$";
                },
                offsetY: -20,
                style: {
                    fontSize: '10px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr"],
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: true
                },
                axisTicks: {
                    show: true,
                },
                labels: {
                    show: true,
                    formatter: function(val) {
                        return val + "$";
                    }
                }

            },
            title: {
                text: 'Dépense mensuel',
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chartdepense"), options);
        chart.render();
    </script>
    @endpush
</div>
