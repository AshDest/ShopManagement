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
                            <div class="text-xl-end mt-xl-0 mt-2">
                                <a href="" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New
                                    Order</a>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table id="fixed-columns-datatable" class="table nowrap row-border order-column w-100">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Description Produit</th>
                                    <th>Total Achat</th>
                                    <th>Total Vente</th>
                                    <th>Prix Revien</th>
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
                                        echo $i; $i++
                                        @endphp</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{($product->qte_stock)*($product->pu_achat)}} CDF</td>
                                    <td>{{($product->qte_stock)*($product->pu)}} CDF</td>
                                    <td>{{(($product->qte_stock)*($product->pu))-(($product->qte_stock)*($product->pu_achat))}}
                                        CDF
                                    </td>
                                    <td>{{$product->updated_at}}</td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        {{-- <center>
                            @if (count($products))
                            {{ $products->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center> --}}
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
