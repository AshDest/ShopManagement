<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="date" class="form-control form-control-light" wire:model="dt_filtre">
                            <span style="cursor: pointer;" wire:click="charger()"
                                class="input-group-text bg-primary border-primary text-white">
                                <i class="mdi mdi-arrow-down-circle font-13"></i>
                            </span>
                        </div>
                        <a class="btn btn-primary ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        {{-- <a href="javascript: void(0);" class="btn btn-primary ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a> --}}
                    </form>
                </div>
                <h4 class="page-title">Tableu de port/Situation de vente pour un mois</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-6">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Ventes</h5>
                            <h3 class="mt-3 mb-3">
                                @php
                                    echo number_format($this->nbr_vente);
                                @endphp</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Total de Ventes</span>
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>@php
                                    echo date('Y');
                                @endphp
                                </span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-md-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="CA">CA</h5>
                            <h3 class="mt-3 mb-3">
                                @php
                                    echo number_format($this->ca) . ' CDF';
                                @endphp</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>
                                    @php
                                        echo date('Y');
                                    @endphp</span>
                                <span class="text-nowrap">Chiffre d'Affaire</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-md-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class=" dripicons-graph-pie widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Benefice</h5>
                            <h3 class="mt-3 mb-3">
                                @php
                                    echo number_format($this->nbr_benefice) . ' CDF';
                                @endphp</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>
                                    @php
                                        echo date('Y');
                                    @endphp</span>
                                <span class="text-nowrap">Benefice Total</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Nombre de clients">
                                Dettes</h5>
                            <h3 class="mt-3 mb-3">@php
                                echo number_format($this->sum_dette) . ' CDF';
                            @endphp</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Total de Dettes</span>
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>@php
                                    echo date('Y');
                                @endphp
                                </span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-md-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Nombre de Produits">Montant Payé</h5>
                            <h3 class="mt-3 mb-3">@php
                                echo number_format($this->sum_mtpayer) . ' CDF';
                            @endphp</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Montant deja payé</span>
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>@php
                                    echo date('Y');
                                @endphp
                                </span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-md-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Dettes payé</h5>
                            <h3 class="mt-3 mb-3">@php
                                echo number_format($this->sumpaiement) . ' CDF';
                            @endphp</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Montant dettes payés</span>
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>@php
                                    echo date('Y');
                                @endphp
                                </span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div><!-- end row -->
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="row g-2">
                <div class="card card-h-100">
                    <div class="card-body" style="margin-bottom: 55px;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class="header-title">Top 5 de produit le plus vendus pour ce mois de
                                @php
                                    $now = Carbon\Carbon::now();
                                    $month = $now->format('M');
                                    echo $month;
                                @endphp
                            </h4>
                        </div>
                        {{-- chart ici hein --}}
                        <div dir="ltr">
                            <div id="chartvente" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md-4">
                </div> <!-- end col-->
            </div><!-- end row -->
        </div> <!-- end col -->
        <div class="col-lg-12">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="header-title">Statistic Vente/benefice par moi année
                            @php
                                echo date('Y');
                            @endphp
                        </h4>
                    </div>

                    {{-- chart ici hein --}}
                    <div dir="ltr">
                        <div id="chart" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                    </div>

                </div>
            </div>

        </div> <!-- end col -->
    </div>


    <!-- end row -->
</div>
@push('js')
    <script>
        var options = {
            series: [{
                name: 'Bénefice du mois',
                data: @json($this->ben_per_month)

            }, {
                name: 'Vente du mois',
                data: @json($this->sel_per_month)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($this->all_month),
            },
            yaxis: {
                title: {
                    text: ' Franc Congolais'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return " " + val + " Fc"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush

@push('jschart')
    <script>
        var options = {
            series: @json($this->topproduct),
            chart: {
                width: 380,
                type: 'donut',
            },
            labels: @json($this->topdesi_prod),
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chartvente"), options);
        chart.render();
    </script>
@endpush
