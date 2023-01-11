<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-8">
                            <form
                                class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                <div class="col-auto">
                                    <label for="inputPassword2" class="visually-hidden">Recherche</label>
                                    <input type="search" wire:model="reseach" class="form-control" id="inputPassword2"
                                        placeholder="Rechercher ici...">
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="status-select" class="me-2">Catégorie</label>
                                        <select class="form-select" id="status-select">
                                            <option selected>Choose...</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->designation}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4">
                            <div class="text-xl-end mt-xl-0 mt-2">
                                <a href="" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-file-pdf-box"></i> Export
                                    PDF</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product ID</th>
                                    <th>Nom Produit</th>
                                    <th>Quantité</th>
                                    <th>P.A Unitaire</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($approvs as $approv)
                                <tr>
                                    <td><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold">#{{
                                            $approv->code }}</a> </td>
                                    <td><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold">#{{
                                            $approv->produit->code }}</a> </td>

                                    <td>
                                        <h5> {{ $approv->produit->description }}</h5>
                                    </td>
                                    <td>
                                        {{$approv->qte_approv}} {{$approv->produit->categorie->mesure}}
                                    </td>
                                    <td>
                                        {{ $approv->pu_approv }} CDF
                                    </td>
                                    <td>
                                        <h5>{{$approv->pt_approv}} CDF</h5>
                                    </td>
                                    <td>
                                        {{$approv->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('editapprovisionnement', ['approv_id'=>$approv->id]) }}"
                                            class="action-icon">
                                            <i class="mdi mdi-pencil"></i></a>
                                        <a wire:click="delete({{ $approv->id }})" class="action-icon"> <i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-warning" role="alert">
                                    Pas d'Approvisionnements
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        <center>
                            @if (count($approvs))
                            {{ $approvs->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
