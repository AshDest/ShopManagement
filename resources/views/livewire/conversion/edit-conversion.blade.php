<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='update'>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="">Produit 1</label>
                                    <input type="text" class="form-control" wire:model='selectProdui1' value=""
                                        disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ $unite }}</label>
                                    <input type="number" class="form-control" wire:model='quantite' value="">
                                    <div class="valid-feedback">
                                        @error('quantite')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="">Produit 2</label>
                                    <input type="text" class="form-control" wire:model='selectProdui2' value=""
                                        disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ $unite2 }}</label>
                                    <input type="number" class="form-control" wire:model='qte_ajout' value="">
                                    <div class="valid-feedback">
                                        @error('quantite')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Prix de vente </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" wire:model='prix_vente' value="">
                                    <div class="valid-feedback">
                                        @error('prix_vente')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Modifier la
                                Conversion</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
