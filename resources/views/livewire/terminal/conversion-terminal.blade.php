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
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <input type="search" wire:model="reseach" class="form-control" id="inputPassword2"
                                        placeholder="Search...">
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4">
                            <div class="text-xl-end mt-xl-0 mt-4">
                                <a href="{{ route('addconversionterminal') }}" class="btn btn-primary mb-2 me-2"><i
                                        class="mdi mdi-archive-plus"></i>
                                    Convertir une Quantité</a>
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
                                    <th>N<sup>o</sup></th>
                                    <th>Produit Convertis</th>
                                    <th>Quantité Convertis</th>
                                    <th>Produit Approvisionné</th>
                                    <th>Quantité</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($conversions as $conversion)
                                    <tr>
                                        <td class="table-user">
                                            @php
                                                echo $i;
                                                $i++;
                                            @endphp
                                        </td>
                                        <td>{{ $conversion->produit->description }}</td>
                                        <td>{{ $conversion->quantite }} {{ $conversion->produit->designationmesure }}
                                        </td>
                                        <td>{{ $conversion->convertis->description }}</td>
                                        <td>{{ $conversion->qte_ajout }} {{ $conversion->convertis->designationmesure }}
                                        </td>
                                        <td class="table-action">
                                            <a href="{{ route('editconversion', ['conversion' => $conversion->id]) }}"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Modifier la conversion"> <i class="mdi mdi-archive-edit"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-warning" role="alert">
                                        Pas d'Approvisionnements
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        <center>
                            @if (count($conversions))
                                {{ $conversions->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
