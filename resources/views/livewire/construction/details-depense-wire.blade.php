<div>
    <div class="row">
        <div class="col-xxl-8 col-lg-8">
            <!-- project card -->
            <div class="card d-block">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="">{{$this->designationprojet}}</h3>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="dripicons-dots-3"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a style="cursor: pointer;"
                                    wire:click="changerstatus('Cloturer')"
                                    class="dropdown-item"><i
                                        class="mdi mdi-progress-close"></i>&ensp;Cloturer</a>
                                <!-- item-->
                                <a style="cursor: pointer;"
                                    wire:click="changerstatus('Pending')"
                                    class="dropdown-item"><i
                                        class="mdi mdi-progress-alert"></i>&ensp;En attente</a>
                                <!-- item-->
                                <a style="cursor: pointer;"
                                    wire:click="changerstatus('Encours')"
                                    class="dropdown-item"><i
                                        class="mdi mdi-progress-clock"></i>&ensp;Encours</a>
                            </div>
                        </div>
                        <!-- project title-->
                    </div>
                    @if ($this->statut_projet == 'Encours')
                        <span class="badge bg-primary-lighten text-primary">Projet: {{$this->statut_projet}}</span>
                    @elseif ($this->statut_projet == 'Pending')
                        <span class="badge bg-warning-lighten text-warning">Projet: {{$this->statut_projet}}</span>
                    @else
                        <span class="badge bg-success-lighten text-success">Projet: {{$this->statut_projet}}</span>
                    @endif

                    <h5>Project Overview:</h5>

                    <p class="text-muted mb-2">
                        With supporting text below as a natural lead-in to additional contenposuere erat
                        a ante. Voluptates, illo, iste itaque voluptas
                        corrupti ratione reprehenderit magni similique? Tempore, quos delectus
                        asperiores libero voluptas quod perferendis! Voluptate,
                        quod illo rerum? Lorem ipsum dolor sit amet.
                    </p>

                    <p class="text-muted mb-4">
                        Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni
                        similique? Tempore, quos delectus asperiores
                        libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor
                        sit amet. With supporting text below
                        as a natural lead-in to additional contenposuere erat a ante.
                    </p>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Start Date</h5>
                                <p>17 March 2018 <small class="text-muted">1:00 PM</small></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>End Date</h5>
                                <p>22 December 2018 <small class="text-muted">1:00 PM</small></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Budget</h5>
                                <p>$15,800</p>
                            </div>
                        </div>
                    </div>


                </div> <!-- end card-body-->

            </div> <!-- end card-->


        </div> <!-- end col -->

        <div class="col-lg-4 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Progress</h5>
                    <div dir="ltr">
                        <div class="mt-3 chartjs-chart" style="height: 320px;">
                            {{-- <div dir="ltr"> --}}
                            <div id="chartdepense" class="apex-charts" data-colors="#727cf5,#e3eaef">
                            </div>
                            {{-- </div> --}}
                            {{-- <canvas id="line-chart-example"></canvas> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-->


        </div>
    </div>
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
