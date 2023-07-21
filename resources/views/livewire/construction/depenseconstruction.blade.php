<div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Liste de projets</h4>
                    <div class="mb-3">
                        <div class="app-search dropdown d-none d-lg-block">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="input-group">
                                        <input type="text" wire:model="reseach" class="form-control dropdown-toggle"
                                            placeholder="Recherche le projet ici..." id="top-search">
                                        <span class="mdi mdi-magnify search-icon"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <a wire:click="newproject" class="btn btn-primary mb-2 me-2"><i
                                            class="mdi mdi-plus-circle-multiple-outline"></i>
                                        Projet</a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Liste de projets
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Designation</th>
                                    <th>Responsable</th>
                                    <th> Contact</th>
                                    <th> Status</th>
                                    <th colspan="4"> Actions(View,Edit,Delete)</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($projets as $projet)
                                    <tr>
                                        <td>{{ $projet->codeprojet }}</td>
                                        <td>{{ $projet->designationprojet }}</td>
                                        <td>{{ $projet->responsableprojet }}
                                        </td>
                                        <td>
                                            {{ $projet->contactreponsable }}
                                        </td>
                                        <td>
                                            @if ($projet->statutprojet=="encours")
                                            <span class="badge bg-primary-lighten text-primary">{{ $projet->statutprojet }}</span>
                                            @elseif ($projet->statutprojet=="pending")
                                            <span class="badge bg-warning-lighten text-warning">{{ $projet->statutprojet }}</span>
                                            @else
                                            <span class="badge bg-success-lighten text-success">{{ $projet->statutprojet }}</span>
                                            @endif
                                        </td>
                                        <td class="table-action">
                                            <a wire:click="viewdepense({{ $projet->id }})"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="depenses du projet"> <i
                                                    class="mdi mdi-eye-refresh-outline"></i></a>
                                        </td>

                                        <td>
                                            <a wire:click="editprojet({{ $projet->id }})"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="modifier projet"> <i class="mdi mdi-pencil"></i></a>
                                        <td>
                                            <a wire:click="delete({{ $projet->id }},'projet')"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="suprimer projet"> <i class="mdi mdi-delete-circle"></i></a>
                                        </td>
                                        <td>
                                            <a wire:click="adddepense({{ $projet->id }}),{{$projet->statutprojet}}"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="ajouter depense"> <i class="mdi mdi-link-variant-plus"></i></a>
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td class="alert alert-danger" colspan="12">
                                            <center>... Pas d'enregistement pour l'estant ...</center>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                        <br>
                        <center>
                            @if (count($projets))
                                {{ $projets->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div>
        </div>


        <!-- end col -->
        <div class=" col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Terminal de dépenses</h4>
                    <p class="text-muted font-14">
                        Enregistrer toutes les dépenses sur cet projet
                    </p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Formulaire de dépense
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <form class="needs-validation">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Code de projet</label>
                                <input type="text" wire:model='codeprojet_dep' id="example-readonly"
                                    class="form-control" readonly="" value="Readonly value"
                                    placeholder="code du projet">

                                @error('codeprojet_dep')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Description du projet</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Description du projet" wire:model="designationprojet_dep" disabled>

                                @error('designationprojet_dep')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Description de la dépense</label>
                                <input type="text" class="form-control" id="validationCustom02"
                                    placeholder="Description de la dépense" wire:model="designationdepense">

                                @error('designationdepense')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Montant dépensé</label>
                                <div class="input-group flex-nowrap">
                                    <input class="form-control" wire:model='mtdepense' type="number" min="1"
                                        placeholder="Montant total payer" aria-label=""
                                        aria-describedby="basic-addon1">
                                </div>
                                @error('mtdepense')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputState" class="form-label">Devise</label>
                                <select id="inputState" class="form-select" wire:model="depensedevise">
                                    <option value="">Veuillez la devise</option>
                                    <option value="USD">USD(Dollars)</option>
                                    <option value="CDF">CDF(Franc congolais)</option>
                                </select>
                                @error('depensedevise')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($desplayedit_form_dep)
                                <a wire:click="modifierdepense" class="btn btn-primary mb-2 me-2"><i
                                        class="mdi mdi-pencil"></i>
                                    Modifier la dépense</a>
                            @else
                                @if ($this->desplaydepense)
                                    <a wire:click="savedepense" class="btn btn-primary mb-2 me-2"><i
                                            class="mdi mdi-plus-circle-multiple-outline"></i>
                                        Enregistrer la dépense</a>
                                @else
                                    <button wire:click="savedepense" class="btn btn-primary mb-2 me-2" disabled><i
                                            class="mdi mdi-plus-circle-multiple-outline"></i>
                                        Enregistrer la dépense</button>
                                @endif
                            @endif


                        </form>


                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div> <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Dépenses</h4>
                    <div class="mb-3">
                        <div class="app-search dropdown d-none d-lg-block">
                            <div class="input-group">
                                <input type="text" wire:model="reseach_dep" class="form-control dropdown-toggle"
                                    placeholder="Recherche la dépense ici..." id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Visualisation des dépense
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>N<sup>o</sup></th>
                                    <th>Description</th>
                                    <th>Montant payé</th>
                                    <th>Projet</th>
                                    <th colspan="2">Actions(Edit,Delete)</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $total_general_cdf = 0;
                                    $total_general_usd = 0;
                                @endphp
                                @forelse ($this->depenses as $depense)
                                    <tr>



                                        <?php $i = 1; ?>
                                        <td><?php echo $i;
                                        $i++; ?></td>
                                        <td>{{ $depense->designationdepense }}</td>
                                        <td>{{ number_format($depense->montantdepense) . ' ' . $depense->depensedevise }}
                                        </td>
                                        <td>{{ $depense->projet->designationprojet }}</td>
                                        <td>
                                            <a wire:click="editdepense({{ $depense->id }})"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="modifier depense"> <i class="mdi mdi-pencil"></i></a>
                                        <td>
                                            <a wire:click="delete({{ $depense->id }},'depense')"
                                                class="action-icon text-primary me-2" style="cursor: pointer;"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="suprimer depense"> <i class="mdi mdi-delete-circle"></i></a>
                                        </td>
                                        @php
                                            switch ($depense->depensedevise) {
                                                case 'USD':
                                                    $total_general_usd += $depense->montantdepense;
                                                    break;
                                                case 'CDF':
                                                    $total_general_cdf += $depense->montantdepense;
                                                    break;
                                                default:
                                                    break;
                                            }

                                        @endphp
                                    </tr>
                                @empty
                                    <tr>
                                        @if ($this->idprojet)
                                            <td class="alert alert-danger" colspan="12">
                                                <center>... Pas de dépense enregistré pour ce projet ...</center>
                                            </td>
                                        @else
                                            <td class="alert alert-danger" colspan="12">
                                                <center>... veuillez selectionner le projet dans la liste de projets ...
                                                </center>
                                            </td>
                                        @endif

                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="2" style="color: rgb(14, 10, 10); "><b>Total Générale USD</b>
                                    </td>
                                    <td style="color: rgb(14, 10, 10); "><b>@php
                                        echo number_format($total_general_usd) . '$';
                                    @endphp</b></td>

                                    <td colspan="1" style="color: rgb(14, 10, 10); "><b>Total Générale CDF</b>
                                    </td>
                                    <td style="color: rgb(14, 10, 10); "><b>@php
                                        echo number_format($total_general_cdf) . 'FC';
                                    @endphp</b></td>
                                </tr>

                            </tbody>

                        </table>
                        <br>
                        <center>
                            @if (count($this->depenses))
                                {{ $this->depenses->links('vendor.livewire.bootstrap') }}
                            @endif
                        </center>
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div>
        </div>
    </div>


    <!-- Modal add and edit projet -->
    <div wire:ignore.self id="add_projet" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($this->desplayedit)
                        <h5 class="modal-title" id="staticBackdropLabel">MODIFICATION DU PROJET</h5>
                    @else
                        <h5 class="modal-title" id="staticBackdropLabel">ENREGISTREMENT DU PROJET</h5>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div> <!-- end modal header -->
                <form class="ps-3 pe-3" action="#">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Code Projet</label>
                            <input type="text" wire:model='codeprojet' id="example-readonly" class="form-control"
                                readonly="" value="Readonly value">
                            <div class="valid-feedback">
                                @error('codeprojet')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description du projet</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1" wire:ignore.self><i
                                        class="uil-money-stack"></i></span>
                                <input class="form-control" wire:model='designationprojet' type="text"
                                    placeholder="description du projet" aria-describedby="basic-addon1">
                            </div>
                            @error('designationprojet')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Noms du Responsables du projet</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon2" wire:ignore.self><i
                                        class="uil-money-stack"></i></span>
                                <input class="form-control" wire:model='responsableprojet' type="text"
                                    placeholder="noms du chef de projet" aria-describedby="basic-addon2">
                            </div>
                            @error('responsableprojet')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Numéro de téléphone</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon3" wire:ignore.self><i
                                        class="uil-money-stack"></i></span>
                                <input class="form-control" wire:model='contactreponsable' type="text"
                                    placeholder="numéro de téléphone" aria-describedby="basic-addon3">
                            </div>
                            @error('contactreponsable')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    @if ($this->desplayedit)
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button wire:click="modifierprojet" type="button" class="btn btn-primary">Modifier le
                                projet</button>
                        </div> <!-- end modal footer -->
                    @else
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button wire:click="saveprojet" type="button" class="btn btn-primary">Enregistrer le
                                projet</button>
                        </div> <!-- end modal footer -->
                    @endif

                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->


    <!-- Modal details depense per projet -->
<!-- Primary Header Modal -->
<div ire:ignore.self id="md_dt_depense_projet" id="centermodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">DETAIL DE DEPENSE SUR LE PROJET {{$this->design_projet}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xxl-6 col-lg-6">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="">App design and development</h3>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="dripicons-dots-3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Cloturer</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Stopper</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline me-1"></i>Encours</a>
                                        </div>
                                    </div>
                                    <!-- project title-->
                                </div>
                                <div class="badge bg-secondary text-light mb-3">Ongoing</div>

                                <h5>Project Overview:</h5>

                                <p class="text-muted mb-2">
                                    With supporting text below as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas
                                    corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate,
                                    quod illo rerum? Lorem ipsum dolor sit amet.
                                </p>

                                <p class="text-muted mb-4">
                                    Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                    libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                                    as a natural lead-in to additional contenposuere erat a ante.
                                </p>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>Start Date</h5>
                                            <p>17 March 2018 <small class="text-muted">1:00 PM</small></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>End Date</h5>
                                            <p>22 December 2018 <small class="text-muted">1:00 PM</small></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>Budget</h5>
                                            <p>$15,800</p>
                                        </div>
                                    </div>
                                </div>


                            </div> <!-- end card-body-->

                        </div> <!-- end card-->


                    </div> <!-- end col -->

                    <div class="col-lg-6 col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Progress</h5>
                                <div dir="ltr">
                                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                                        {{-- <div dir="ltr"> --}}
                                            <div id="chartdepense" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                                        {{-- </div> --}}
                                        {{-- <canvas id="line-chart-example"></canvas> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->


                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    @push('addprojet_modal')
        <script type="text/javascript">
            window.addEventListener('modal_project', event => {
                // console.log("ok");
                $('#add_projet').modal('show');
            });
            window.addEventListener('close_modal', event => {
                // console.log("ok");
                $('#add_projet').modal('hide');
            });
        </script>


        <script type="text/javascript">
            window.addEventListener('modal_dt_depense_projet', event => {
                // console.log("ok");
                $('#md_dt_depense_projet').modal('show');
            });
            window.addEventListener('close_modal_dt_depense_projet', event => {
                // console.log("ok");
                $('#md_dt_depense_projet').modal('hide');
            });
        </script>


<script>
     var options = {
          series: [{
          name: 'Inflation',
          data: [200, 4000, 2000, 1500]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + "$";
          },
          offsetY: -20,
          style: {
            fontSize: '10px',
            colors: ["#304758"]
          }
        },

        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr"],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: true
          },
          axisTicks: {
            show: true,
          },
          labels: {
            show: true,
            formatter: function (val) {
              return val + "$";
            }
          }

        },
        title: {
          text: 'Dépense mensuel',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chartdepense"), options);
        chart.render();
</script>


    @endpush


</div>
