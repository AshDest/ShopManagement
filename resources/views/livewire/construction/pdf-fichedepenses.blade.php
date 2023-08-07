<div>
    <div class="row">


        <div class="container">
            <div class="header">{{ $this->designationprojet }}</div>
            <div class="project-info">
                @if ($this->statut_projet == 'Encours')
                    <span class="badge bg-primary-lighten text-primary">Projet: {{ $this->statut_projet }}</span>
                @elseif ($this->statut_projet == 'Pending')
                    <span class="badge bg-warning-lighten text-warning">Projet: {{ $this->statut_projet }}</span>
                @else
                    <span class="badge bg-success-lighten text-success">Projet: {{ $this->statut_projet }}</span>
                @endif
                <span>Code du Projet:</span> {{ $this->codeprojet }}<br>
                <span>Responsable du Projet:</span> {{ $this->responsableprojet }}<br>
                <span>Contact:</span> {{ $this->contactreponsable }}<br>
                <span>Date de début:</span> {{ $this->date_debit }}<br>
                <span>Date de fin:</span> Projet: Encours<br>
                @if ($this->statut_projet == 'Encours')
                    <span>Projet: {{ $this->statut_projet }}</span>
                @elseif ($this->statut_projet == 'Pending')
                    <span>Projet: {{ $this->statut_projet }}</span>
                @else
                    <span>Date de fin:</span> {{ $this->date_fin }}
                @endif
                <span>Budget Total:</span>
                @forelse ($results as $result)
                    {{ $result->total . ' ' . $result->depensedevise }}
                @empty
                @endforelse
                <br>
            </div>
            <table class="expense-table">
                <tr>
                    <th>No</th>
                    <th>Description de la dépense</th>
                    <th>Montant payé</th>
                    <th>Date d'ajout</th>
                  </tr>
                  <?php
                        // Compteur pour le numéro de ligne
                        $numeroLigne = 1;
                    ?>
                @forelse ($this->depenses as $depense)
                    <tr>
                        <td><?php echo $numeroLigne; ?></td>
                        <td>{{ $depense->designationdepense }}</td>
                        <td>{{ number_format($depense->montantdepense) . ' ' . $depense->depensedevise }}
                        </td>
                        <td>{{ $depense->date_debit }}</td>
                    </tr>
                    <?php
                    // Incrémenter le numéro de ligne après chaque itération
                    $numeroLigne++;
                ?>
                @empty
                    <tr>
                        <td class="alert alert-danger" colspan="12">
                            <center>... Pas de dépense enregistré pour ce projet ...</center>
                        </td>

                    </tr>
                @endforelse

            </table>
            <div class="total">Total: @forelse ($results as $result)
                    {{ $result->total . ' ' . $result->depensedevise }}
                @empty
                @endforelse
            </div>
        </div>


    </div>
    {{-- Success is as dangerous as failure. --}}

    {{-- @push('jschart_depense')
    <script>
        var options = {
            series: [{
                name: 'Dépense',
                data: @json($this->dep_per_month)
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
                formatter: function(val) {
                    return val + "$";
                },
                offsetY: -20,
                style: {
                    fontSize: '10px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: @json($this->all_month),
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
                    formatter: function(val) {
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
    @endpush --}}
</div>
