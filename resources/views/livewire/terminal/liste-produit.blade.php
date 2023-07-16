<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                                <a href="/listeproduit/excel" class="btn btn-success mb-2 me-2"><i
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
                                    <th>N<sup>o</sup></th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Quantité</th>
                                    <th>Pv.Unitaire</th>
                                    <th>Categorie</th>
                                    <th>Vendeur</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="table-user">
                                            @php
                                                echo $i;
                                                $i++;
                                            @endphp
                                        </td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->qte_stock . $product->designationmesure }}</td>
                                        <td>@php
                                            echo number_format($product->pu) . ' CDF';
                                        @endphp
                                        </td>
                                        <td>{{ $product->categorie->designation }}</td>
                                        <td>{{ $product->user->name }}</td>
                                        <td class="table-action">
                                            <a href="{{ route('termianladdapprovisionnement', ['ids' => $product->id]) }}"
                                                class="action-icon" style="cursor: pointer;"> <i
                                                    class="mdi mdi-plus-circle-multiple-outline"></i></a>
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
                            @if (count($products))
                                {{ $products->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
