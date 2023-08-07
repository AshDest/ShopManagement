<div>
    <div class="row">


        <div class="container">
            <div class="header">>{{$this->designationprojet}}</div>
            <div class="project-info">
                @if ($this->statut_projet == 'Encours')
                        <span class="badge bg-primary-lighten text-primary">Projet: {{$this->statut_projet}}</span>
                    @elseif ($this->statut_projet == 'Pending')
                        <span class="badge bg-warning-lighten text-warning">Projet: {{$this->statut_projet}}</span>
                    @else
                        <span class="badge bg-success-lighten text-success">Projet: {{$this->statut_projet}}</span>
                    @endif
              <span>Code du Projet:</span> {{$this->codeprojet}}<br>
              <span>Responsable du Projet:</span> SIKULY<br>
              <span>Contact:</span> 0990458598<br>
              <span>Date de début:</span> 2023-07-04<br>
              <span>Date de fin:</span> Projet: Encours<br>
              <span>Budget Total:</span> 375 USD 54000 CDF<br>
            </div>
            <table class="expense-table">
              <tr>
                <th>No</th>
                <th>Description de la dépense</th>
                <th>Montant payé</th>
                <th>Date d'ajout</th>
              </tr>
              <tr>
                <td>1</td>
                <td>achat ciments 100 sacs</td>
                <td>100 USD</td>
                <td>2023-05-24</td>
              </tr>
              <tr>
                <td>2</td>
                <td>achat eaux 20 bidons</td>
                <td>150 USD</td>
                <td>2023-05-24</td>
              </tr>
              <tr>
                <td>3</td>
                <td>achat cloux de 6</td>
                <td>4,000 CDF</td>
                <td>2023-07-24</td>
              </tr>
              <tr>
                <td>11</td>
                <td>transport</td>
                <td>5 USD</td>
                <td>2023-06-04</td>
              </tr>
              <tr>
                <td>12</td>
                <td>chakula macon</td>
                <td>10 USD</td>
                <td>2023-06-04</td>
              </tr>
              <tr>
                <td>13</td>
                <td>cadastre</td>
                <td>100 USD</td>
                <td>2023-05-04</td>
              </tr>
              <tr>
                <td>14</td>
                <td>Autre planche</td>
                <td>10 USD</td>
                <td>2023-06-29</td>
              </tr>
              <tr>
                <td>15</td>
                <td>Transport</td>
                <td>50,000 CDF</td>
                <td>2023-06-06</td>
              </tr>
            </table>
            <div class="total">Total: 375 USD 54000 CDF</div>
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
