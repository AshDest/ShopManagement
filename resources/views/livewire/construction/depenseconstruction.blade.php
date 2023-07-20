<div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Liste de projets</h4>
                    <div class="mb-3">
                        <div class="app-search dropdown d-none d-lg-block">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="input-group">
                                        <input type="text" wire:model="reseach" class="form-control dropdown-toggle"
                                            placeholder="Recherche le projet ici..." id="top-search">
                                        <span class="mdi mdi-magnify search-icon"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <a wire:click="newproject" class="btn btn-primary mb-2 me-2"><i
                                            class="mdi mdi-plus-circle-multiple-outline"></i>
                                        Projet</a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Liste de projets
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Designation</th>
                                    <th>Responsable</th>
                                    <th> Contact</th>
                                    <th> Status</th>
                                    <th colspan="4"> Action(View,Edit,Delete)</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($projets as $projet)
                                    <tr>
                                        <td>{{ $projet->codeprojet }}</td>
                                        <td>{{ $projet->designationprojet }}</td>
                                        <td>{{ $projet->responsableprojet }}
                                        </td>
                                        <td>
                                            {{ $projet->contactreponsable }}
                                        </td>
                                        <td>
                                            {{ $projet->statutprojet }}
                                        </td>
                                        <td class="table-action">
                                            <a  wire:click="viewdepense({{ $projet->id }})"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="depenses du projet"> <i class="mdi mdi-eye-refresh-outline"></i></a>
                                        </td>

                                        <td>
                                            <a  wire:click="editprojet({{ $projet->id }})"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="modifier projet"> <i class="mdi mdi-pencil"></i></a>
                                        <td>
                                            <a  wire:click="delete({{ $projet->id }})"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="suprimer projet"> <i class="mdi mdi-delete-circle"></i></a>
                                        </td>
                                        <td>
                                            <a  wire:click="adddepense({{ $projet->id }})"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="ajouter depense"> <i class="mdi mdi-link-variant-plus"></i></a>
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
                            @if (count($projets))
                                {{ $projets->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div>
        </div>


        <!-- end col -->
        <div class=" col-lg-3">
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
                        <form class="needs-validation" wire:submit.prevent="savepanier">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Numero de vente</label>
                                <input type="text" wire:model='numvente' id="example-readonly" class="form-control"
                                    readonly="" value="Readonly value">
                                <div class="valid-feedback">
                                    @error('numvente')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Description produit</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Description du produit" wire:model="description" disabled>
                                <div class="valid-feedback">
                                    <div class="valid-feedback">
                                        @error('description')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantié Vendue</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="basic-addon1">Unité</span>
                                    <input class="form-control" wire:model='qtvendu' type="number" min="1"
                                        placeholder="Quantié vendue" aria-label="Quantié vendue"
                                        aria-describedby="basic-addon1">
                                </div>
                                @error('qtvendu')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Montant total à payer</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="basic-addon1">CDF</span>
                                    <input class="form-control" wire:model='mttotal' type="number" min="1"
                                        placeholder="Montant total à payer" aria-label="Quantié vendue"
                                        aria-describedby="basic-addon1" disabled>
                                </div>
                                @error('mttotal')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Ajouter au panier</button>

                        </form>


                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div> <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Panier</h4>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Visualisation du panier
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">

                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>N<sup>o</sup></th>
                                    <th>Description</th>
                                    <th>Quantité</th>
                                    <th>Prix Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $total_general = 0;
                                @endphp
                                {{-- @forelse ($this->paniers as $panier)
                                    <tr>
                                        <?php $i = 1; ?>
                                        <td><?php echo $i;
                                        $i++; ?></td>
                                        <td>{{ $panier->produit->description }}</td>
                                        <td>{{ $panier->qte_vente }}</td>
                                        <td>{{ number_format($panier->pt_vente) . ' CDF' }}
                                        </td>
                                        <td class="table-action">
                                            <a style="cursor: pointer;"
                                                wire:click="suppannier({{ $panier->produit->id }},
                                                '{{ $panier->qte_vente }}',
                                                '{{ $panier->vente_id }}',
                                                '{{ $panier->pt_vente }}')"
                                                class="action-icon">
                                                <i class="mdi mdi-delete"></i></a>
                                        </td>
                                        @php
                                            $total_general += $panier->pt_vente;
                                        @endphp
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="alert alert-danger" colspan="12">
                                            <center>... Pas de produit dans le panier ...</center>
                                        </td>
                                    </tr>
                                @endforelse --}}
                                <tr>
                                    <td colspan="4"><b>Total Générale</b> </td>
                                    <td><b>@php
                                        echo number_format($total_general);
                                    @endphp</b></td>
                                </tr>

                            </tbody>

                        </table>
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div wire:ignore.self id="add_projet" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($this->desplayedit)
                    <h5 class="modal-title" id="staticBackdropLabel">MODIFICATION DU PROJET</h5>
                    @else
                    <h5 class="modal-title" id="staticBackdropLabel">ENREGISTREMENT DU PROJET</h5>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div> <!-- end modal header -->
                <form class="ps-3 pe-3" action="#">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Code Projet</label>
                            <input type="text" wire:model='codeprojet' id="example-readonly" class="form-control"
                                readonly="" value="Readonly value">
                            <div class="valid-feedback">
                                @error('codeprojet')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description du projet</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1" wire:ignore.self><i
                                        class="uil-money-stack"></i></span>
                                <input class="form-control" wire:model='designationprojet' type="text"
                                    placeholder="description du projet" aria-describedby="basic-addon1">
                            </div>
                            @error('designationprojet')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Noms du Responsables du projet</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon2" wire:ignore.self><i
                                        class="uil-money-stack"></i></span>
                                <input class="form-control" wire:model='responsableprojet' type="text"
                                    placeholder="noms du chef de projet" aria-describedby="basic-addon2">
                            </div>
                            @error('responsableprojet')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Numéro de téléphone</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon3" wire:ignore.self><i
                                        class="uil-money-stack"></i></span>
                                <input class="form-control" wire:model='contactreponsable' type="text"
                                    placeholder="numéro de téléphone" aria-describedby="basic-addon3">
                            </div>
                            @error('contactreponsable')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    @if ($this->desplayedit)
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button wire:click="modifierprojet" type="button" class="btn btn-primary">Modifier le
                            projet</button>
                    </div> <!-- end modal footer -->
                    @else
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button wire:click="saveprojet" type="button" class="btn btn-primary">Enregistrer le
                            projet</button>
                    </div> <!-- end modal footer -->
                    @endif

                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->


    @push('addprojet_modal')
        <script type="text/javascript">
            window.addEventListener('modal_project', event => {
                // console.log("ok");
                $('#add_projet').modal('show');
            });
            window.addEventListener('close_modal', event => {
                // console.log("ok");
                $('#add_projet').modal('hide');
            });
        </script>
    @endpush
</div>
