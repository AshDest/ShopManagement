<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Produits</h4>
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
                            <a href="#tooltips-validation-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Liste
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>N<sup>o</sup></th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Quantité</th>
                                    <th>Pv.Unitaire</th>
                                    <th>Categorie</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="table-user">
                                            {{ $product->id }}
                                        </td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->qte_stock . $product->categorie->mesure }}</td>
                                        <td>{{ $product->pu }}Fr Congolais</td>
                                        <td>{{ $product->categorie->designation }}</td>
                                        <td class="table-action">
                                            <a href="{{ route('addapprovisionnement', ['ids'=>$product->id]) }}" class="action-icon"
                                                style="cursor: pointer;"> <i class="mdi mdi-plus-circle-multiple-outline"></i></a>
                                            <a wire:click="editproduct({{ $product->id }})" class="action-icon"
                                                style="cursor: pointer;"> <i class="mdi mdi-pencil"></i></a>
                                            <a wire:click="delete({{ $product->id }})" class="action-icon"
                                                style="cursor: pointer;"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="alert alert-danger" colspan="12">
                                            <center>... Pas d'enregistement pour l'estant ...</center>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div><br>
                    <center>
                        @if (count($products))
                            {{ $products->links('vendor.livewire.bootstrap') }}
                        @endif
                    </center>
                    <!-- end tab-content-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
