<div>
    <div class="row">


            <!-- end card-->


        </div>
        <div class="col-xxl-7 col-lg-7">
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

                        </div>
                        <!-- project title-->
                    </div>
                    {{-- @if ($this->statut_projet == 'Encours')
                        <span class="badge bg-primary-lighten text-primary">Projet: {{$this->statut_projet}}</span>
                    @elseif ($this->statut_projet == 'Pending')
                        <span class="badge bg-warning-lighten text-warning">Projet: {{$this->statut_projet}}</span>
                    @else
                        <span class="badge bg-success-lighten text-success">Projet: {{$this->statut_projet}}</span>
                    @endif --}}

                    {{-- <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Code du Projet</h5>
                                <p>{{$this->codeprojet}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Reponsable du Projet</h5>
                                <p>{{$this->responsableprojet}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Contact</h5>
                                <p>{{$this->contactreponsable}}</p>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Date de debit</h5>
                                {{-- <small class="text-muted">1:00 PM</small> --}}
                                {{-- <p><i class="mdi mdi-calendar-arrow-right"></i> {{$this->date_debit}} </p>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Date de fin</h5>
                                @if ($this->statut_projet == 'Encours')
                                    <span class="badge bg-primary-lighten text-primary">Projet: {{$this->statut_projet}}</span>
                                @elseif ($this->statut_projet == 'Pending')
                                    <span class="badge bg-warning-lighten text-warning">Projet: {{$this->statut_projet}}</span>
                                @else
                                <p><i class="mdi mdi-calendar-check-outline"></i>{{$this->date_fin}}</p>
                                @endif

                            </div>
                        </div> --}}
                        {{-- <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Budget Total</h5>
                            @forelse ($results as $result )
                            {{$result->total.' '.$result->depensedevise}}
                            @empty

                            @endforelse

                            </div>
                        </div>
                    </div>  --}}

                    {{-- <p class="text-muted mb-2">
                        <div class="table-responsive">

                            <table class="table table-dark mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>N<sup>o</sup></th>
                                        <th>Description de la dépense</th>
                                        <th>Montant payé</th>
                                        <th>Date d'ajout</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                @endphp
                                    @forelse ($this->depenses as $depense)
                                    <tr>
                                        <td> {{ $depense->id }}</td>
                                        <td>{{ $depense->designationdepense }}</td>
                                        <td>{{ number_format($depense->montantdepense) . ' ' . $depense->depensedevise }}
                                        </td>
                                        <td>{{ $depense->date_debit }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                            <td class="alert alert-danger" colspan="12">
                                                <center>... Pas de dépense enregistré pour ce projet ...</center>
                                            </td>

                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        <div>
                    </p> --}}

                </div> <!-- end card-body-->

            </div> <!-- end card-->


        </div> <!-- end col -->

    </div>
    {{-- Success is as dangerous as failure. --}}

    {{-- @push('jschart_depense')
    <script>
        var options = {
            series: [{
                name: 'Dépense',
                data: @json($this->dep_per_month)
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
                categories: @json($this->all_month),
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
    @endpush --}}
</div>
