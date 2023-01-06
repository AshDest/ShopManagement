<div>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    @if ($desplayeditform)
                        <div class="card-body">
                            <h4 class="header-title">Modifier Categorie</h4>
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
                                    <form wire:submit.prevent="editcateg()">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Designation</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="Designation de la categorie" wire:model="designation">
                                            <div class="valid-feedback">
                                                @error('designation')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Mesure</label>
                                            <select id="inputState" class="form-select" wire:model="mesure">
                                                <option>Veuillez selection une mesure</option>
                                                <option value="g">Gramme</option> ['g', 'Pièce', 'Litre']
                                                <option value="Pièce">La pièce</option>
                                                <option value="Litre">Le Litre</option>
                                            </select>
                                        </div>
                                        {{-- <button wire:click="annuler" class="btn btn-outline-primary"
                                            type="submit">Annuler</button> --}}
                                        <button class="btn btn-outline-primary" type="submit">Modifier</button>


                                    </form>
                                </div> <!-- end preview-->
                                <!-- end preview code-->
                            </div> <!-- end tab-content-->

                        </div>
                    @else
                        <div class="card-body">
                            <h4 class="header-title">Nouvelle Categorie</h4>
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
                                    <form class="needs-validation" wire:submit.prevent="savecategorie">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Designation</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="Designation de la categorie" wire:model="designation">
                                            <div class="valid-feedback">
                                                <div class="valid-feedback">
                                                    @error('designation')
                                                        <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Mesure</label>
                                            <select id="inputState" class="form-select" wire:model="mesure">
                                                <option>Veuillez selection une mesure</option>
                                                <option value="g">Gramme</option>
                                                <option value="Pièce">La pièce</option>
                                                <option value="Litre">Le Litre</option>
                                            </select>
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


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Categorie de produits</h4>
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
                                        <th>Designation</th>
                                        <th>Mesure</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $categorie)
                                        <tr>
                                            <td class="table-user">
                                                {{ $categorie->id }}
                                            </td>
                                            <td>{{ $categorie->designation }}</td>
                                            <td>{{ $categorie->mesure }}</td>
                                            <td class="table-action">
                                                <a wire:click="editcategorie({{ $categorie->id }})"
                                                    class="action-icon" style="cursor: pointer;"> <i
                                                        class="mdi mdi-pencil"></i></a>
                                                <a wire:click="delete({{ $categorie->id }})" class="action-icon"
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
                            @if (count($categories))
                                {{ $categories->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                        <!-- end tab-content-->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
</div>
