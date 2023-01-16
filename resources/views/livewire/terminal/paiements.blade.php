<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-8">
                            <form
                                class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                <div class="col-auto">
                                    <label for="inputPassword2" class="visually-hidden">Recherche</label>
                                    <input type="search" wire:model="reseach" class="form-control" id="inputPassword2"
                                        placeholder="Rechercher ici...">
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4">
                            <div class="text-xl-end mt-xl-0 mt-2">
                                <a href="" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-file-pdf-box"></i>
                                    Export
                                    PDF</a>
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
                                        echo $i; $i++;
                                        @endphp
                                    </td>
                                    <td><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold">#{{
                                            $dette->client->noms }}</a> </td>
                                    <td><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold">#{{
                                            $dette->client->numero }}</a> </td>
                                    <td>
                                        {{ $dette->total_dette }} CDF
                                    </td>
                                    <td>
                                        {{ $dette->created_at }}
                                    </td>
                                    <td>
                                        <a wire:click="paiementview({{ $dette->id }})" class="action-icon"> <i
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
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    <div id="add_paie" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <a href="index.html" class="text-success">
                            <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                        </a>
                    </div>
                    <form class="ps-3 pe-3" action="#">
                        <div class="mb-3">
                            <label class="form-label">Montant Dette (CDF)</label>
                            <input data-toggle="touchspin" wire:model='montant_dette' placeholder="1000.00" init-val="1"
                                type="text" data-decimals="2" data-bts-postfix="CDF">
                            <div class="valid-feedback">
                                @error('montant_dette')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Montant Paie (CDF)</label>
                            <input data-toggle="touchspin" wire:model='montant_paie' placeholder="1000.00" init-val="1"
                                type="text" data-decimals="2" data-bts-postfix="CDF">
                            <div class="valid-feedback">
                                @error('montant_paie')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @push('scripts')
    <script type="text/javascript">
        window.addEventListener('paiementview',event =>{
                $('#add_paie').modal('show');
            });
            window.addEventListener('close-modal',event =>{
                $('#add_paie').modal('hiden');
            });
    </script>
    @endpush
</div>
