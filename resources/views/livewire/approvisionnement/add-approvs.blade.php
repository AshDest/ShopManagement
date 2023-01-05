<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Code</label>
                                    <input type="text" wire:model='code' id="example-readonly" class="form-control" readonly="" value="Readonly value">
                                    <div class="valid-feedback">
                                        @error('qte_approv')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Quantité</label>
                                    <input data-toggle="touchspin" wire:model='qte_approv' data-step="1" data-bts-max="1000000" type="text" value="0" placeholder="100">
                                    <div class="valid-feedback">
                                        @error('qte_approv')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Produit</label>
                                    <select class="form-control select2" data-toggle="select2" wire:model='produit_id'>
                                        @foreach ($produits as $produit)
                                        <option>Select</option>
                                        <optgroup label="Liste All Products">
                                            <option value="{{$produit->id}}">{{$produit->description}}</option>
                                        </optgroup>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        @error('designation')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Prix d'Achat (CDF)</label>
                                    <input data-toggle="touchspin" wire:model='pu_approv' placeholder="1000.00" value="0.00" type="text" data-step="100.0" data-decimals="2" data-bts-max="1000000000" data-bts-postfix="CDF">
                                    <div class="valid-feedback">
                                        @error('designation')
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