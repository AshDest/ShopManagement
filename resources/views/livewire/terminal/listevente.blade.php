<div>
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
                    <div class="mb-3">
                        <div class="app-search dropdown d-none d-lg-block">
                            <div class="input-group">
                                <input type="text" wire:model="reseach" class="form-control dropdown-toggle"
                                    placeholder="Recherche ici..." id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                            </div>
                        </div>
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
                                            <center>... Pas d'enregistement pour l'estant ...</center>
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
