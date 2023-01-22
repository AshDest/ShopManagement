<div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="app-search dropdown d-none d-lg-block">
                                        <div class="input-group">
                                            <input type="text" wire:model="reseach"
                                                class="form-control dropdown-toggle" placeholder="Recherche ici..."
                                                id="top-search">
                                            <span class="mdi mdi-magnify search-icon"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-4">
                                    <div class="text-xl-end mt-xl-0 mt-2">
                                        <a href="" class="btn btn-success mb-2 me-2"><i
                                                class="mdi mdi-file-excel"></i>
                                            Export
                                            Excel</a>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>N°</th>
                                            <th>Noms Clients</th>
                                            <th>Num Clients</th>
                                            <th>Montant Dette</th>
                                            <th>Mise à Jour</th>
                                            <th style="width: 125px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($dettes as $dette)
                                            <tr>
                                                <td>
                                                    @php
                                                        echo $i;
                                                        $i++;
                                                    @endphp
                                                </td>
                                                <td><a href="/paiement" class="text-body fw-bold">#
                                                        {{ $dette->client->noms }}</a> </td>
                                                <td><a href="/paiement" class="text-body fw-bold">#
                                                        {{ $dette->client->numero }}</a> </td>
                                                <td>
                                                    @php
                                                        echo number_format($dette->total_dette) . ' CDF';
                                                    @endphp
                                                </td>
                                                <td>
                                                    {{ $dette->updated_at }}
                                                </td>
                                                <td>
                                                    <a wire:click="paiementview({{ $dette->id }})"
                                                        class="action-icon" style="cursor: pointer;"> <i
                                                            class="mdi mdi-account-cash-outline"></i></a>
                                                </td>
                                            </tr>

                                        @empty
                                            <div class="alert alert-warning" role="alert">
                                                Pas de dettes
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <br>
                                <center>
                                    @if (count($dettes))
                                        {{ $dettes->links('vendor.livewire.bootstrap') }}
                                    @endif
                                </center>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="app-search dropdown d-none d-lg-block">
                                        <div class="input-group">
                                            <input type="text" wire:model="reseach2"
                                                class="form-control dropdown-toggle" placeholder="Recherche ici..."
                                                id="top-search">
                                            <span class="mdi mdi-magnify search-icon"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-4">
                                    <div class="text-xl-end mt-xl-0 mt-2">
                                        <a href="" class="btn btn-success mb-2 me-2"><i
                                                class="mdi mdi-file-excel"></i>
                                            Export
                                            Excel</a>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>N°</th>
                                            <th>Noms Clients</th>
                                            <th>Num Clients</th>
                                            <th>Montant Payé</th>
                                            <th>Mise à Jour</th>
                                            {{-- <th style="width: 125px;">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($paies as $paie)
                                            <tr>
                                                <td>
                                                    @php
                                                        echo $i;
                                                        $i++;
                                                    @endphp
                                                </td>
                                                <td><a href="/paiement"
                                                        class="text-body fw-bold">#{{ $paie->dette->client->noms }}</a>
                                                </td>
                                                <td><a href="/paiement"
                                                        class="text-body fw-bold">#{{ $paie->dette->client->numero }}</a>
                                                </td>
                                                <td>
                                                    @php
                                                        echo number_format($paie->montant_paie) . ' CDF';
                                                    @endphp
                                                </td>
                                                <td>
                                                    {{ $paie->updated_at }}
                                                </td>

                                            </tr>
                                        @empty
                                            <div class="alert alert-warning" role="alert">
                                                Pas de paiement
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <br>
                                <center>
                                    @if (count($paies))
                                        {{ $paies->links('vendor.livewire.bootstrap') }}
                                    @endif
                                </center>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <!-- Modal -->
    <div wire:ignore.self id="add_paie" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un Paiement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div> <!-- end modal header -->
                <form class="ps-3 pe-3" wire:submit.prevent="savepaiement">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Montant Dette (CDF)</label>
                            <input class="form-control" wire:model='montant_dette' placeholder="1000.00" type="text"
                                readonly>
                            <div class="valid-feedback">
                                @error('montant_dette')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Montant Paie (CDF)</label>
                            <input data-toggle="touchspin" wire:model='montant_paie' placeholder="1000.00"
                                init-val="1" type="text" data-decimals="2" data-bts-postfix="CDF">
                            <div class="valid-feedback">
                                @error('montant_paie')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button class="btn btn-primary">Enregistrer</button>
                    </div> <!-- end modal footer -->
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->
    @push('scripts')
        <script type="text/javascript">
            window.addEventListener('paiementview', event => {
                $('#add_paie').modal('show');
            });
            window.addEventListener('close-modal', event => {
                $('#add_paie').modal('hiden');
            });
        </script>
    @endpush
</div>
