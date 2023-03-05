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
                                <a wire:click="openModal()" style="cursor: pointer;"
                                    class="btn btn-success mb-2 me-2"><i class="mdi mdi-file-excel"></i>
                                    Ajouter une Dépense</a>
                                <a href="/listedette/excel" class="btn btn-primary mb-2 me-2"><i
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
                                    <th>N°</th>
                                    <th>Montant</th>
                                    <th>Libellé</th>
                                    <th>Utilisateur</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($depenses as $depense)
                                <tr>
                                    <td>
                                        @php
                                        echo $i;
                                        $i++;
                                        @endphp
                                    </td>
                                    <td>@if ($depense->montant)
                                        @php
                                        echo number_format($depense->montant) . ' CDF';
                                        @endphp
                                        @else
                                        0
                                        @endif
                                    </td>
                                    <td>{{ $depense->libelle }}</td>
                                    <td>{{ $depense->user->name }}</td>
                                    <td> <a wire:click="edit({{ $depense->id }})" class="action-icon"
                                            style="cursor: pointer;"> <i class="mdi mdi-pencil"></i></a>
                                        <a wire:click="delete({{ $depense->id }})" class="action-icon"
                                            style="cursor: pointer;"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <center>
                            @if (count($depenses))
                            {{ $depenses->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    <!-- Modal -->
    <div wire:ignore.self id="modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une Dépense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div> <!-- end modal header -->
                <form class="ps-3 pe-3" wire:submit.prevent="create">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="montant" class="form-label">Montant:</label>
                            <input type="number" class="form-control" id="montant" name="montant" wire:model="montant">
                            @error('montant') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Libellé:</label>
                            <textarea class="form-control" id="libelle" name="libelle" wire:model="libelle" cols="30"
                                rows="10"></textarea>
                            @error('libelle') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button class="btn btn-primary">Enregistrer</button>
                    </div> <!-- end modal footer -->
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

    <!-- Modal -->
    <div wire:ignore.self id="editmodal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modifier une Dépense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div> <!-- end modal header -->
                <form class="ps-3 pe-3" wire:submit.prevent="update">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="montant" class="form-label">Montant:</label>
                            <input type="number" class="form-control" id="montant" name="montant" wire:model="montant">
                            @error('montant') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Libellé:</label>
                            <textarea class="form-control" id="libelle" name="libelle" wire:model="libelle" cols="30"
                                rows="10"></textarea>
                            @error('libelle') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button class="btn btn-success">Modifier</button>
                    </div> <!-- end modal footer -->
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->
    @push('modaldepenses')
    <script type="text/javascript">
        window.addEventListener('openModal', event => {
                $('#modal').modal('show');
            });
window.addEventListener('closeModal', event => {
                    $('#modal').modal('hiden');
                    });
    </script>
    @endpush
    @push('modaleditdepenses')
    <script type="text/javascript">
        window.addEventListener('openeditModal', event => {
                            $('#editmodal').modal('show');
                            });
                    window.addEventListener('closeModal', event => {
                        $('#editmodal').modal('hiden');
                    });
    </script>
    @endpush
    @push('closeModal')
    <script type="text/javascript">
        window.addEventListener('closeModal', event => {
$('#modal').modal('hiden');
});
    </script>
    @endpush
</div>
