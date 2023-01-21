<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='save'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <form
                                        class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                        <div class="col-auto">
                                            <label for="inputPassword2" class="visually-hidden">Search</label>
                                            <input type="search" wire:model='reseach' class="form-control"
                                                id="inputPassword2" placeholder="rechercher le produit...">
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0">
                                        <tbody>
                                            @forelse ($produits as $produit)
                                            <tr>
                                                <td>
                                                    <h5 class="font-14 my-1"><a href="javascript:void(0);"
                                                            class="text-body">{{$produit->description}}</a></h5>
                                                    <span
                                                        class="text-muted font-13">{{$produit->categorie->designation}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-muted font-13">{{$produit->designationmesure}}</span>
                                                    <br />
                                                    @if ($produit->qte_stock > 10)
                                                    <span
                                                        class="badge badge-success-lighten">{{$produit->qte_stock}}</span>
                                                    @elseif ($produit->qte_stock < 10 && $produit->qte_stock > 4)
                                                        <span
                                                            class="badge badge-warning-lighten">{{$produit->qte_stock}}</span>
                                                        @else
                                                        <span
                                                            class="badge badge-danger-lighten">{{$produit->qte_stock}}</span>
                                                        @endif
                                                </td>
                                                <td>
                                                    <span class="text-primary fw-semibold">PA : @php
                                                        echo number_format($produit->pu_achat). ' CDF';
                                                        @endphp</span>
                                                    <h5 class="text-success fw-semibold">PV : @php
                                                        echo number_format($produit->pu). ' CDF';
                                                        @endphp</h5>
                                                </td>
                                                <td>
                                                    <span class="text-muted font-13">Variation de Stock</span>
                                                    <h5 class="font-14 mt-1 fw-normal">{{$produit->updated_at}}</h5>
                                                </td>
                                                @if ($produit->qte_stock > 1)
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="font-18 text-info me-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Selectionner le Produit"><i
                                                            class="uil uil-focus-add"></i></a>
                                                </td>
                                                @endif
                                            </tr>
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
                                    <br>
                                    <center>
                                        @if (count($produits))
                                        {{ $produits->links('vendor.livewire.bootstrap') }}
                                        @endif
                                    </center>
                                </div> <!-- end table-responsive-->
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
