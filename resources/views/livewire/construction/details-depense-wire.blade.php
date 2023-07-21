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

                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Date de debit</h5>
                                <p><i class="mdi mdi-calendar-arrow-right"></i> March 2018 <small class="text-muted">1:00 PM</small></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Date de fin</h5>
                                <p><i class="mdi mdi-calendar-check-outline"></i>22 December 2018 <small class="text-muted">1:00 PM</small></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Budget Total</h5>
                                <p>15,800USD 23000CDF</p>
                            </div>
                        </div>
                    </div>

                    <p class="text-muted mb-2">
                        <table class="table table-dark mb-0">
                            <thead>
                                <tr>
                                    <th>N<sup>o</sup></th>
                                    <th>Description</th>
                                    <th>Montant payé</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total_general_cdf = 0;
                                $total_general_usd = 0;
                            @endphp
                                 @forelse ($this->depenses as $depense)
                                 <tr>



                                     <?php $i = 1; ?>
                                     <td><?php echo $i;
                                     $i++; ?></td>
                                     <td>{{ $depense->designationdepense }}</td>
                                     <td>{{ number_format($depense->montantdepense) . ' ' . $depense->depensedevise }}
                                     </td>
                                     <td>{{ $depense->projet->designationprojet }}</td>
                                     <td>
                                         <a wire:click="editdepense({{ $depense->id }})"
                                             class="action-icon text-primary me-2" style="cursor: pointer;"
                                             data-bs-toggle="tooltip" data-bs-placement="top"
                                             title="modifier depense"> <i class="mdi mdi-pencil"></i></a>
                                     <td>
                                         <a wire:click="delete({{ $depense->id }},'depense')"
                                             class="action-icon text-primary me-2" style="cursor: pointer;"
                                             data-bs-toggle="tooltip" data-bs-placement="top"
                                             title="suprimer depense"> <i class="mdi mdi-delete-circle"></i></a>
                                     </td>
                                     @php
                                         switch ($depense->depensedevise) {
                                             case 'USD':
                                                 $total_general_usd += $depense->montantdepense;
                                                 break;
                                             case 'CDF':
                                                 $total_general_cdf += $depense->montantdepense;
                                                 break;
                                             default:
                                                 break;
                                         }

                                     @endphp
                                 </tr>
                             @empty
                                 <tr>
                                     @if ($this->idprojet)
                                         <td class="alert alert-danger" colspan="12">
                                             <center>... Pas de dépense enregistré pour ce projet ...</center>
                                         </td>
                                     @else
                                         <td class="alert alert-danger" colspan="12">
                                             <center>... veuillez selectionner le projet dans la liste de projets ...
                                             </center>
                                         </td>
                                     @endif

                                 </tr>
                             @endforelse
                             <tr>
                                 <td colspan="2" style="color: rgb(14, 10, 10); "><b>Total Générale USD</b>
                                 </td>
                                 <td style="color: rgb(14, 10, 10); "><b>@php
                                     echo number_format($total_general_usd) . '$';
                                 @endphp</b></td>

                                 <td colspan="1" style="color: rgb(14, 10, 10); "><b>Total Générale CDF</b>
                                 </td>
                                 <td style="color: rgb(14, 10, 10); "><b>@php
                                     echo number_format($total_general_cdf) . 'FC';
                                 @endphp</b></td>
                             </tr>

                            </tbody>
                        </table>
                    </p>

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
