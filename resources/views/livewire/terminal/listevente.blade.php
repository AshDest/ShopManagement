<div>
    {{-- <div class="row">
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
    {{-- </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-2">
        </div>
        <!-- end col -->
        <div class=" col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Liste de Vente</h4>
                    <p class="text-muted font-14">
                        Liste de toutes les ventes
                    </p>
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" wire:model="dt_filtre">
                                <div id="tooltip-container2">
                                    <span style="cursor: pointer;" wire:click="resets"
                                        data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Reinitialiser"
                                        class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-autorenew  font-13"></i>
                                    </span>
                                </div>
                            </div>

                            <div id="tooltip-container2">
                                <a href="intervalrapport/{{ $this->dt_filtre }}" class="btn btn-primary ms-2"
                                    data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Telecharger le rapport">
                                    <i class="mdi mdi-arrow-down-circle"></i>
                                </a>

                            </div>
                            {{-- <a href="javascript: void(0);" class="btn btn-primary ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a> --}}
                        </form>
                    </div><br>
                    <div class="row mb-2">
                        <div class="col-xl-8">
                            <div class="app-search dropdown d-none d-lg-block">
                                <div class="input-group">
                                    <input type="text" wire:model="reseach" class="form-control dropdown-toggle"
                                        placeholder="Recherche ici..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="text-xl-end mt-xl-0 mt-2">
                                <a href="/listevente/excel" class="btn btn-success mb-2 me-2"><i
                                        class="mdi mdi-file-excel"></i>
                                    Export
                                    Excel</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Liste de vente
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Numero de Vente</th>
                                    <th>Prix de vente Total</th>
                                    <th>Montant Payé</th>
                                    <th> Reste à payé</th>
                                    <th> Date de Vente</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_vente = 0;
                                    $total_payer = 0;
                                    $total_reste = 0;
                                @endphp
                                @forelse ($ventes as $vente)
                                    <tr>
                                        <td>{{ $vente->id }}</td>
                                        <td>{{ $vente->code }}</td>
                                        <td>{{ number_format($vente->total) . ' CDF' }}</td>
                                        <td>{{ number_format($vente->montant_paie) . ' CDF' }}</td>
                                        <td>{{ number_format($vente->rest_paie) . ' CDF' }}</td>
                                        <td>{{ $vente->created_at }}</td>
                                        @php
                                            $total_vente += $vente->total;
                                            $total_payer += $vente->montant_paie;
                                            $total_reste += $vente->rest_paie;
                                        @endphp
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="alert alert-danger" colspan="12">
                                            <center>... Pas de vente ...</center>
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="2"><b>Total Générale</b> </td>
                                    <td><b>@php
                                        echo number_format($total_vente);
                                    @endphp</b></td>
                                    <td><b>@php
                                        echo number_format($total_payer);
                                    @endphp</b></td>
                                    <td><b>@php
                                        echo number_format($total_reste);
                                    @endphp</b></td>
                                    <td><b>Total Générale</b> </td>
                                </tr>
                            </tbody>

                        </table>
                        <br>
                        <center>
                            @if (count($ventes))
                                {{ $ventes->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div>
        </div> <!-- end col -->
        <div class="col-lg-2">

        </div>
    </div>


</div>
