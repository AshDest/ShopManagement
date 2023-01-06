<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='save'>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nommination</label>
                                    <input type="text" id="simpleinput" class="form-control" wire:model='nomination' placeholder="Nom de l'entreprise">
                                    @error('nomination')
                                        <div class="valid-feedback">
                                            <span style="color: red;">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="simpleinput" class="form-label">Numero de Téléphone</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            wire:model='contact' placeholder="(+243) 000000000">
                                        @error('contact')
                                            <div class="valid-feedback">
                                                <span style="color: red;">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="simpleinput" class="form-label">Email</label>
                                        <input type="text" id="simpleinput" class="form-control" wire:model='email' placeholder="@gmail,yahoo,etc.com">
                                        @error('email')
                                            <div class="valid-feedback">
                                                <span style="color: red;">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Logo</label>
                                <input type="file" id="example-fileinput" class="form-control"
                                    wire:model='logo'>
                                @error('logo')
                                    <div class="valid-feedback">
                                        <span style="color: red;">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="mb-3 col-md-4">
                                        <label for="simpleinput" class="form-label">RCCM</label>
                                        <input type="text" id="simpleinput" class="form-control" wire:model='rccm'>
                                        @error('rccm')
                                            <div class="valid-feedback">
                                                <span style="color: red;">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="simpleinput" class="form-label">N° Impôt</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            wire:model='num_impot'>
                                        @error('num_impot')
                                            <div class="valid-feedback">
                                                <span style="color: red;">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="simpleinput" class="form-label">Identification Nationale</label>
                                        <input type="text" id="simpleinput" class="form-control"
                                            wire:model='id_national'>
                                        @error('id_national')
                                            <div class="valid-feedback">
                                                <span style="color: red;">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Adresse</label>
                                    <textarea class="form-control" id="example-textarea" wire:model='adresse' rows="5"></textarea>
                                    @error('adresse')
                                        <div class="valid-feedback">
                                            <span style="color: red;">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Enregistrer Informations</button>
                        </div>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
