<?php

namespace App\Http\Livewire\Tableudeboard;

use App\Models\Approvisionnement;
use App\Models\Client;
use App\Models\DetailVente;
use App\Models\Produit;
use App\Models\User;
use App\Models\Vente;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Dashaboard extends Component
{
    use LivewireAlert;
    public $dt_filtre, $nbr_client, $nbr_produit, $nbr_vente, $nbr_benefice;
    public $all_month, $sel_per_month = [];
    public  $ben_per_month = [];

    public $count_user, $ca, $ctaprov, $topproduct, $topdesi_prod;


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
        $data_res = array();
        foreach ($resultats as $res) {
            array_push(
                $data_res,
                $res->sum1
            );
            $this->ben_per_month = $data_res;
        }
    }
    public function topvente()
    {
        $topproduct =  DB::table('detail_ventes as d')
            ->join('produits as p', 'd.produit_id', '=', 'p.id')
            ->select(DB::raw("count(*) as nbr"), 'produit_id', 'p.description')
            ->groupBy('produit_id')
            ->limit('5')
            ->get();
        $data_top = array();
        $data_id = array();
        foreach ($topproduct as $top) {

            array_push($data_top, $top->nbr);
            array_push($data_id, $top->description);
            $this->topproduct = $data_top;
            $this->topdesi_prod = $data_id;
        }
        // $designaprod = Produit::select(DB::raw("description"))->where('id', $top->produit_id)
        //     ->get();
        // $data_designa = array();
        // foreach ($designaprod as $des) {

        //     array_push(
        //         $data_designa,
        //         $des->description
        //     );
        //     $this->topdesi_prod = $data_designa;
        // }
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
        $this->topvente();
        $this->nbr_client = Client::count();
        $this->count_user = User::count();
        $this->nbr_produit = Produit::where('qte_stock', '!=', '0')->count();
        $this->nbr_benefice = DetailVente::sum('resultat');
        $this->nbr_vente = Vente::count();
        $this->ca = Produit::sum(DB::raw("qte_stock*pu"));
        $this->ctaprov = Produit::sum(DB::raw("qte_stock*pu_achat"));

        // $columnChartModel =
        //     (new ColumnChartModel())
        //     ->setTitle('Expenses by Type')
        //     ->addColumn('Food', 100, '#f6ad55')
        //     ->addColumn('Shopping', 200, '#fc8181')
        //     ->addColumn('Travel', 300, '#90cdf4');
        return view('livewire.tableudeboard.dashaboard');
    }
}