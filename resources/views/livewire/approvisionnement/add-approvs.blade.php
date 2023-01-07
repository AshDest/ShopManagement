<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='save'>
                        <div class="row">
                            <div class="col-lg-6">
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
                            </div>
                            <div class="col-lg-6">
                                <label for="example-select" class="form-label">Produit</label>
                                <input type="text" wire:model='description' id="example-readonly"
                                    class="form-control" readonly="" value="Readonly value">
                                <div class="valid-feedback">
                                    @error('description')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3" wire:ignore>
                                        <label class="form-label">Quantité /{{$unite}}</label>
                                        <input data-toggle="touchspin" wire:model='qte_approv' data-step="1"
                                            data-bts-max="1000000" type="text" value="0" placeholder="100">
                                        <div class="valid-feedback">
                                            @error('qte_approv')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4" wire:ignore>
                                    <label class="form-label">Prix d'Achat (CDF)</label>
                                    <input data-toggle="touchspin" wire:model='pu_approv' placeholder="1000.00"
                                        value="0.00" type="text" data-decimals="2" data-bts-max="1000000000"
                                        data-bts-postfix="CDF">
                                    <div class="valid-feedback">
                                        @error('pu_approv')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4" wire:ignore>
                                    <label class="form-label">Prix de Vente (CDF)</label>
                                    <input data-toggle="touchspin" wire:model='pu_vente' placeholder="1000.00"
                                        value="0.00" type="text" data-decimals="2" data-bts-max="1000000000"
                                        data-bts-postfix="CDF">
                                    <div class="valid-feedback">
                                        @error('pu_vente')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Enregistrer l'Approvisionnement</button>
                        </div>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
