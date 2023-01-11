<?php

namespace App\Http\Livewire\Tableudeboard;

use App\Models\Client;
use App\Models\DetailVente;
use App\Models\Produit;
use App\Models\Vente;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Carbon\Carbon;

class Dashaboard extends Component
{
    use LivewireAlert;
    public $dt_filtre, $nbr_client, $nbr_produit, $nbr_vente, $nbr_benefice;
    public $all_month, $sel_per_month = [];
    public  $ben_per_month = [];


    public function vente()
    {
        $ventes = DetailVente::groupBy('month')
            ->selectRaw('sum(pt_vente) as sum')
            ->get();

        $data_vente = array();

        foreach ($ventes as $value) {
            array_push(
                $data_vente,
                $value->sum
            );
            $this->sel_per_month = ($data_vente);
        }
    }

    public function beneficie()
    {
        $resultats = DetailVente::groupBy('month')
            ->selectRaw('sum(resultat) as sum1')
            ->get();
        $this->ben_per_month = array($resultats);
        $data_res = array();
        foreach ($resultats as $res) {
            array_push(
                $data_res,
                $res->sum1
            );
            $this->ben_per_month = $data_res;
        }
    }

    public function mount()
    {
        $month = [];

        for ($m = 1; $m <= 12; $m++) {
            $month[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
        }
        $this->all_month = $month;
    }
    public function charger()
    {
        if ($this->dt_filtre) {
            dd($this->dt_filtre);
        } else {
            $this->alert('warning', 'Veuillez selectionner une date svp!');
        }
    }
    public function render()
    {
        $this->vente();
        $this->beneficie();
        $this->nbr_client = Client::count();
        $this->nbr_produit = Produit::where('qte_stock', '!=', '0')->count();
        $this->nbr_benefice = DetailVente::sum('resultat');
        $this->nbr_vente = Vente::count();
        // $columnChartModel =
        //     (new ColumnChartModel())
        //     ->setTitle('Expenses by Type')
        //     ->addColumn('Food', 100, '#f6ad55')
        //     ->addColumn('Shopping', 200, '#fc8181')
        //     ->addColumn('Travel', 300, '#90cdf4');
        return view('livewire.tableudeboard.dashaboard');
    }
}