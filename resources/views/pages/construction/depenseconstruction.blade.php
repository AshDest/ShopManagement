@extends('layouts.default')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
     <!-- start page title -->
     <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('depenseconstruction') }}">Mes depenses</a></li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </div>
                <h4 class="page-title">Depense sur les projets de construction</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Liste de produits</h4>
                    <p class="text-muted font-14">
                        Selectionner le produit dans la liste pour l'ajouter au panier ou faite une recherche de votre
                        produit
                    </p>
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
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Liste de produit
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Quantité en stock et Pu</th>
                                    <th> Ajouter au panier</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->qte_stock . ' ' . $product->designationmesure . ' à ' . number_format($product->pu) . ' CDF' }}
                                        </td>
                                        <td>
                                            @if ($product->qte_stock != 0)
                                                <div id="tooltip-container2">
                                                    <button type="button" class="btn btn-warning"
                                                        wire:click="formvente({{ $product->id }},
                                                        '{{ $product->code }}',
                                                        '{{ $product->description }}','{{ $product->qte_stock }}',
                                                        '{{ $product->pu }}',
                                                        '{{ $product->pu_achat }}')"
                                                        data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Ajouter au panier"> <i
                                                            class="mdi mdi-basket-plus"></i></button>
                                                </div>
                                            @else
                                                <div id="tooltip-container2">
                                                    <button type="button" class="btn btn-warning" disabled
                                                        wire:click="editproduct({{ $product->id }})"
                                                        data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Ajouter au panier"> <i
                                                            class="mdi mdi-basket-plus"></i></button>
                                                </div>
                                            @endif
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
                        <br>
                        {{-- <center>
                            @if (count($products))
                                {{ $products->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center> --}}
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div>
        </div>

        <!-- end col -->
        <div class=" col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Terminal de vente</h4>
                    <p class="text-muted font-14">
                        Enregistrer les operations de vente journaliere
                    </p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Formulaire de vente
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <form class="needs-validation" wire:submit.prevent="savepanier">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Numero de vente</label>
                                <input type="text" wire:model='numvente' id="example-readonly" class="form-control"
                                    readonly="" value="Readonly value">
                                <div class="valid-feedback">
                                    @error('numvente')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Description produit</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Description du produit" wire:model="description" disabled>
                                <div class="valid-feedback">
                                    <div class="valid-feedback">
                                        @error('description')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantié Vendue</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="basic-addon1">Unité</span>
                                    <input class="form-control" wire:model='qtvendu' type="number" min="1"
                                        placeholder="Quantié vendue" aria-label="Quantié vendue"
                                        aria-describedby="basic-addon1">
                                </div>
                                @error('qtvendu')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Montant total à payer</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="basic-addon1">CDF</span>
                                    <input class="form-control" wire:model='mttotal' type="number" min="1"
                                        placeholder="Montant total à payer" aria-label="Quantié vendue"
                                        aria-describedby="basic-addon1" disabled>
                                </div>
                                @error('mttotal')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                                <button class="btn btn-primary" type="submit">Ajouter au panier</button>

                        </form>


                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div> <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Panier</h4>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Visualisation du panier
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">

                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>N<sup>o</sup></th>
                                    <th>Description</th>
                                    <th>Quantité</th>
                                    <th>Prix Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @php
                                        $total_general = 0;
                                    @endphp
                                    {{-- @forelse ($this->paniers as $panier)
                                        <tr>
                                            <?php $i = 1; ?>
                                            <td><?php echo $i;
                                            $i++; ?></td>
                                            <td>{{ $panier->produit->description }}</td>
                                            <td>{{ $panier->qte_vente }}</td>
                                            <td>{{ number_format($panier->pt_vente) . ' CDF' }}
                                            </td>
                                            <td class="table-action">
                                                <a style="cursor: pointer;"
                                                    wire:click="suppannier({{ $panier->produit->id }},
                                                    '{{ $panier->qte_vente }}',
                                                    '{{ $panier->vente_id }}',
                                                    '{{ $panier->pt_vente }}')"
                                                    class="action-icon">
                                                    <i class="mdi mdi-delete"></i></a>
                                            </td>
                                            @php
                                                $total_general += $panier->pt_vente;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="alert alert-danger" colspan="12">
                                                <center>... Pas de produit dans le panier ...</center>
                                            </td>
                                        </tr>
                                    @endforelse --}}
                                    <tr>
                                        <td colspan="4"><b>Total Générale</b> </td>
                                        <td><b>@php
                                            echo number_format($total_general);
                                        @endphp</b></td>
                                    </tr>

                            </tbody>

                        </table>
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div>
        </div>

    </div>
</div>
@endsection
