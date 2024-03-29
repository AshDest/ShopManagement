<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
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
                                                    <h5 class="font-14 my-1"><a href=""
                                                            class="text-body">{{ $produit->description }}</a></h5>
                                                    <span
                                                        class="text-muted font-13">{{ $produit->categorie->designation }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-muted font-13">{{ $produit->designationmesure }}</span>
                                                    <br />
                                                    @if ($produit->qte_stock > 10)
                                                        <span
                                                            class="badge badge-success-lighten">{{ $produit->qte_stock }}</span>
                                                    @elseif ($produit->qte_stock < 10 && $produit->qte_stock > 4)
                                                        <span
                                                            class="badge badge-warning-lighten">{{ $produit->qte_stock }}</span>
                                                    @else
                                                        <span
                                                            class="badge badge-danger-lighten">{{ $produit->qte_stock }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-primary fw-semibold">PA :
                                                        @php
                                                            echo number_format($produit->pu_achat) . ' CDF';
                                                        @endphp</span>
                                                    <h5 class="text-success fw-semibold">PV : @php
                                                        echo number_format($produit->pu) . ' CDF';
                                                    @endphp</h5>
                                                </td>
                                                <td>
                                                    <span class="text-muted font-13">Variation de Stock</span>
                                                    <h5 class="font-14 mt-1 fw-normal">{{ $produit->updated_at }}
                                                    </h5>
                                                </td>
                                                @if ($produit->qte_stock > 1)
                                                    <td class="text-end">
                                                        <a wire:click='addproducts({{ $produit->id }})'
                                                            style="cursor: pointer;" class="font-18 text-info me-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Convertire ce Produit"><i
                                                                class="uil uil-download-alt"></i></a>
                                                    </td>
                                                @else
                                                    @if ($selectProdui1)
                                                        <td class="text-end">
                                                            <a wire:click='addproducts({{ $produit->id }})'
                                                                style="cursor: pointer;"
                                                                class="font-18 text-success me-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Approvisionner ce produit par la conversion"><i
                                                                    class="uil uil-focus-add"></i></a>
                                                        </td>
                                                    @endif
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
                        <div class="col-lg-4">
                            <form wire:submit.prevent='save'>
                                <div class="mb-3">
                                    <label for="">Produit 1 Quantité / en {{ $unite }}</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" wire:model='selectProdui1'
                                                value="" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" wire:model='quantite'
                                                value="">
                                            <div class="valid-feedback">
                                                @error('quantite')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="">Produit 2 en {{ $unite2 }}</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" wire:model='selectProdui2'
                                                value="" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" wire:model='qte_ajout'
                                                value="">
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
                                            <input type="number" class="form-control" wire:model='prix_vente'
                                                value="">
                                            <div class="valid-feedback">
                                                @error('prix_vente')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    {{-- <div class="row">
                                            <div class="col-md-6"> --}}
                                    <button class="btn btn-primary" type="submit">Enregistrer la
                                        Conversion</button>
                                </div>
                                {{-- <div class="col-md-6">
                                                <button class="btn btn-danger">Annuler</button>
                                            </div> --}}
                                {{-- </div> --}}
                                {{-- </div> --}}
                            </form>
                            {{-- <label class="form-label">Quantité /{{ $unite }}</label>
                                <input class="form-control" wire:model='quantite' type="number" placeholder="100">
                                <div class="valid-feedback">
                                    @error('quantite')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
