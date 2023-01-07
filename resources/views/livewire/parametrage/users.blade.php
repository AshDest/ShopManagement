<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                @if ($desplayeditform)
                    <div class="card-body">
                        <h4 class="header-title">Modifier user</h4>
                        <ul class="nav nav-tabs nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#custom-styles-preview" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link active">
                                    Formulaire
                                </a>
                            </li>
                        </ul> <!-- end nav-->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="custom-styles-preview">
                                <form class="needs-validation" wire:submit.prevent="editproduit()">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Code</label>
                                        <input type="text" wire:model='code' id="example-readonly"
                                            class="form-control" readonly="" value="Readonly value">
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
                                    <div class="mb-3" wire:ignore>
                                        <label class="form-label">Prix de vente unitaire</label>
                                        <input data-toggle="touchspin" wire:model='pvu' data-step="1"
                                            data-bts-max="1000000" type="text" value="0"
                                            placeholder="le prix de vente unitaire">
                                        <div class="valid-feedback">
                                            @error('pvu')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Modifier</button>
                                </form>
                            </div> <!-- end preview-->
                            <!-- end preview code-->
                        </div> <!-- end tab-content-->

                    </div>
                @else
                    <div class="card-body">
                        <h4 class="header-title">Nouvel utilisateur</h4>
                        <ul class="nav nav-tabs nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#custom-styles-preview" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link active">
                                    Formulaire
                                </a>
                            </li>
                        </ul> <!-- end nav-->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="custom-styles-preview">
                                <form class="needs-validation" wire:submit.prevent="saveuser">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Noms</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="votre nom" wire:model="nom">
                                        <div class="valid-feedback">
                                            <div class="valid-feedback">
                                                @error('nom')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Adresse mail</label>
                                        <input type="email" class="form-control" id="validationCustom01"
                                            placeholder="adresse mail" wire:model="mail">
                                        <div class="valid-feedback">
                                            <div class="valid-feedback">
                                                @error('mail')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Mot de passe</label>
                                        <input type="password" class="form-control" id="validationCustom01"
                                            placeholder="votre mot de passe" wire:model="password">
                                        <div class="valid-feedback">
                                            <div class="valid-feedback">
                                                @error('password')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Confirmer le Mot de
                                            passe</label>
                                        <input type="password" class="form-control" id="validationCustom01"
                                            placeholder="votre mot de passe" wire:model="password_confirmation">
                                        <div class="valid-feedback">
                                            <div class="valid-feedback">
                                                @error('password')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Avatar</label>
                                        <input type="file" id="example-fileinput"
                                            class="form-control @error('avatar') is-invalid @enderror"
                                            wire:model='avatar'>
                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                                </form>
                            </div> <!-- end preview-->
                            <!-- end preview code-->
                        </div> <!-- end tab-content-->

                    </div>
                @endif

                <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->


        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Utilisateur</h4>
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
                                    <th colspan="3"> Action</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="table-user">
                                            {{ $product->id }}
                                        </td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->qte_stock . $product->categorie->mesure }}</td>
                                        <td>{{ $product->pu }} CDF</td>
                                        <td>{{ $product->categorie->designation }}</td>
                                        <td><a href="{{ route('addapprovisionnement', ['ids' => $product->id]) }}"
                                                class="action-icon" style="cursor: pointer;"> <i
                                                    class="mdi mdi-plus-circle-multiple-outline"></i></a></td>
                                        <td> <a wire:click="editproduct({{ $product->id }})" class="action-icon"
                                                style="cursor: pointer;"> <i class="mdi mdi-pencil"></i></a></td>
                                        <td>
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

                            </tbody> --}}
                        </table>
                    </div><br>
                    <center>
                        {{-- @if (count($products))
                            {{ $products->links('vendor.livewire.bootstrap') }}
                        @endif --}}
                    </center>
                    <!-- end tab-content-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
</div>
