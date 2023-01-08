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
                                    <input type="text" id="simpleinput"
                                        class="form-control @error('nomination') is-invalid @enderror"
                                        wire:model='nomination' placeholder="Nom de l'entreprise">
                                    @error('nomination')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="simpleinput" class="form-label">Numero de Téléphone</label>
                                        <input type="text" id="simpleinput"
                                            class="form-control @error('contact') is-invalid @enderror"
                                            wire:model='contact' placeholder="(+243) 000000000">
                                        @error('contact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="simpleinput" class="form-label">Email</label>
                                        <input type="text" id="simpleinput"
                                            class="form-control @error('email') is-invalid @enderror" wire:model='email'
                                            placeholder="@gmail,yahoo,etc.com">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="simpleinput" class="form-label">Logo</label>
                                        <input type="file" id="example-fileinput"
                                            class="form-control @error('logos') is-invalid @enderror"
                                            wire:model='logos'>
                                        @error('logos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        @if ($logos)
                                        <img src="{{ $logos->temporaryUrl() }}" class="rounded-circle avatar-lg img-thumbnail" width="30%" height="30%">
                                        @else
                                        <img src="{{ asset('assets/images/logo/'.$old_logo.'') }}" class="rounded-circle avatar-lg img-thumbnail" width="30%" height="30%">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="mb-3 col-md-4">
                                        <label for="simpleinput" class="form-label">RCCM</label>
                                        <input type="text" id="simpleinput"
                                            class="form-control @error('rccm') is-invalid @enderror" wire:model='rccm'
                                            placeholder="rccm">
                                        @error('rccm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="simpleinput" class="form-label">N° Impôt</label>
                                        <input type="text" id="simpleinput"
                                            class="form-control @error('num_impot') is-invalid @enderror"
                                            wire:model='num_impot'>
                                        @error('num_impot')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="simpleinput" class="form-label">Identification Nationale</label>
                                        <input type="text" id="simpleinput"
                                            class="form-control @error('id_national') is-invalid @enderror"
                                            wire:model='id_national'>
                                        @error('id_national')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Adresse</label>
                                    <textarea class="form-control @error('adresse') is-invalid @enderror" id="example-textarea" wire:model='adresse'
                                        rows="5"></textarea>
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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
