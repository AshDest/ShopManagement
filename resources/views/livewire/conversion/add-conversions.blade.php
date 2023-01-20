<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='save'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Produit à Convertir</label>
                                    <select name="selectProdui1" id="code" wire:model='selectProdui1'
                                        class="form-select">
                                        <option value=""></option>
                                        @foreach ($produits as $produit)
                                        <option value="{{$produit->id}}">{{$produit->description}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        @error('selectProdui1')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Quantité /{{$unite}}</label>
                                <input class="form-control" wire:model='quantite' type="number" placeholder="100">
                                <div class="valid-feedback">
                                    @error('quantite')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Produit à Approvisionner</label>
                                    <select name="selectProdui2" id="code" wire:model='selectProdui2'
                                        class="form-select">
                                        <option value=""></option>
                                        @foreach ($produits as $produit)
                                        <option value="{{$produit->id}}">{{$produit->description}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        @error('selectProdui2')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Quantité à Ajouter /{{$unite2}}</label>
                                <input class="form-control" wire:model='qte_ajout' type="number" placeholder="100">
                                <div class="valid-feedback">
                                    @error('qte_ajout')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Enregistrer la Conversion</button>
                        </div>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
