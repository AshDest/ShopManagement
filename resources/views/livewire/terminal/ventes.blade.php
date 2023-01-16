<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Liste de produits</h4>
                    <p class="text-muted font-14">
                        Selectionner le produit dans la liste pour l'ajouter au panier ou faite une recherche de votre
                        produit
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
                                Liste de produit
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Quantité en stock et Pu</th>
                                    <th> Ajouter au panier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->qte_stock . ' ' . $product->designationmesure . ' à ' . number_format($product->pu) . ' CDF' }}
                                        </td>
                                        <td>
                                            @if ($product->qte_stock != 0)
                                                <div id="tooltip-container2">
                                                    <button type="button" class="btn btn-warning"
                                                        wire:click="editproduct({{ $product->id }})"
                                                        data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Ajouter au panier"> <i
                                                            class="mdi mdi-basket-plus"></i></button>
                                                </div>
                                            @else
                                                <div id="tooltip-container2">
                                                    <button type="button" class="btn btn-warning" disabled
                                                        wire:click="editproduct({{ $product->id }})"
                                                        data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Ajouter au panier"> <i
                                                            class="mdi mdi-basket-plus"></i></button>
                                                </div>
                                            @endif
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
                        <br>
                        <center>
                            @if (count($products))
                                {{ $products->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div>
        </div> <!-- end col -->
        <div class=" col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Terminal de vente</h4>
                    <p class="text-muted font-14">
                        Enregistrer les operations de vente journaliere
                    </p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Formulaire de vente
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <form class="needs-validation" wire:submit.prevent="saveproduit">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Code</label>
                                <input type="text" wire:model='code' id="example-readonly" class="form-control"
                                    readonly="" value="Readonly value">
                                <div class="valid-feedback">
                                    @error('qte_approv')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Description</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Description du produit" wire:model="description">
                                <div class="valid-feedback">
                                    <div class="valid-feedback">
                                        @error('description')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="inputState1" class="form-label">Mesure</label>
                                <select id="inputState1" class="form-select" wire:model="mesureselected">
                                    <option>Veuillez selection une mesure</option>
                                    {{-- @foreach ($mesures as $mesure)
                                        <option value="{{ $mesure->mesures }}">{{ $mesure->mesures }}
                                        </option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </form>


                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div> <!-- end col -->

    </div>
</div>
