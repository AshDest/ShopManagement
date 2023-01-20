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
                                <a href="/listepreveiwvente/excel" class="btn btn-success mb-2 me-2"><i
                                        class="mdi mdi-file-excel"></i>
                                    Export
                                    Excel</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table id="fixed-columns-datatable" class="table nowrap row-border order-column w-100">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Description Produit</th>
                                    <th>Quantité Stock</th>
                                    <th>Toal Achat</th>
                                    <th>Vente Prevu</th>
                                    <th>Benefice Prevu</th>
                                    <th>Dernier Changement</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($products as $product)
                                    <tr>
                                        <td>@php
                                            echo $i;
                                            $i++;
                                        @endphp</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            @if ($product->qte_stock > 14)
                                                <span class="badge bg-success">{{ $product->qte_stock }}
                                                    {{ $product->designationmesure }}</span>
                                            @elseif ($product->qte_stock < 15 && $product->qte_stock > 5)
                                                <span class="badge bg-warning">{{ $product->qte_stock }}
                                                    {{ $product->designationmesure }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $product->qte_stock }}
                                                    {{ $product->designationmesure }}</span>
                                            @endif
                                        </td>
                                        <td>@php
                                            echo number_format($product->qte_stock * $product->pu_achat) . ' CDF';
                                        @endphp</td>
                                        <td>@php
                                            echo number_format($product->qte_stock * $product->pu) . ' CDF';
                                        @endphp</td>
                                        <td>
                                            @php
                                                echo number_format($product->qte_stock * $product->pu - $product->qte_stock * $product->pu_achat) .
                                                    '
                                        CDF';
                                            @endphp
                                        </td>
                                        <td>{{ $product->updated_at }}</td>
                                    </tr>
                                @empty
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
