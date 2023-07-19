<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">

                    <div class="card-body">
                        <h4 class="header-title">Nouveau taux de echange</h4>
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
                                <form class="needs-validation" wire:submit.prevent="savetaux">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Taux de change Actuel</label>
                                        <input step="0.1" type="number" class="form-control" id="validationCustom01"
                                            placeholder="taux de change du marche" wire:model="taux">
                                        <div class="valid-feedback">
                                            <div class="valid-feedback">
                                                @error('taux')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                                </form>
                            </div> <!-- end preview-->
                            <!-- end preview code-->
                        </div> <!-- end tab-content-->

                    </div>

                <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->


        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Taux de change</h4>
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
                                Taux actuel
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>N<sup>o</sup></th>
                                    <th>Taux de change</th>
                                    <th colspan="3"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($users as $user)
                                    <tr>
                                        <td class="table-user">
                                            {{ $user->id }}
                                        </td>
                                        <td class="table-user">
                                            @if ($user->avatar)
                                                <img src="{{ asset('assets/images/avatar/' . $user->avatar . '') }}"
                                                    alt="table-user" class="me-2 rounded-circle" />
                                                {{ $user->noms }}
                                            @else
                                                <img src="{{ asset('assets/images/avatar/avatar.jpg') }}" alt="table-user"
                                                    class="me-2 rounded-circle" />
                                                {{ $user->noms }}
                                            @endif

                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td> <a wire:click="edituser({{ $user->id }})" class="action-icon"
                                                style="cursor: pointer;"> <i class="mdi mdi-pencil"></i></a></td>
                                        <td>
                                            <a wire:click="delete({{ $user->id }})" class="action-icon"
                                                style="cursor: pointer;"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="alert alert-danger" colspan="12">
                                            <center>... Pas d'enregistement pour l'estant ...</center>
                                        </td>
                                    </tr>
                                @endforelse --}}

                            </tbody>
                        </table>
                    </div>
                    <!-- end tab-content-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
</div>
