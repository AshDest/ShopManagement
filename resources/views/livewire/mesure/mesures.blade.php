<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                @if ($desplayeditform)
                <div class="card-body">
                    <h4 class="header-title">Modifier Mesure</h4>
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
                            <form class="needs-validation" wire:submit.prevent="edit()">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Designation Mesure</label>
                                    <input type="text" wire:model='mesures' id="example-readonly" class="form-control"
                                        placeholder="Carton, piece, etc...">
                                    <div class="valid-feedback">
                                        @error('mesures')
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
                    <h4 class="header-title">Nouveau Produit</h4>
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
                            <form class="needs-validation" wire:submit.prevent="save">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Designation Mesure</label>
                                    <input type="text" wire:model='mesures' id="example-readonly" class="form-control"
                                        placeholder="Carton, piece, etc...">
                                    <div class="valid-feedback">
                                        @error('mesures')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
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
                    <h4 class="header-title">Mesures</h4>
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
                                    <th>Mesures</th>
                                    <th colspan="3"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @forelse ($mesurs as $mesur)
                                <tr>
                                    <td class="table-user">
                                        @php
                                        echo $i; $i++;
                                        @endphp
                                    </td>
                                    <td>{{ $mesur->mesures }}</td>
                                    <td> <a wire:click="desplay({{ $mesur->id }})" class="action-icon"
                                            style="cursor: pointer;"> <i class="mdi mdi-pencil"></i></a></td>
                                    <td>
                                        <a wire:click="delete({{ $mesur->id }})" class="action-icon"
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
                        @if (count($mesurs))
                        {{ $mesurs->links('vendor.livewire.bootstrap') }}
                        @endif
                    </center>
                    <!-- end tab-content-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
</div>
