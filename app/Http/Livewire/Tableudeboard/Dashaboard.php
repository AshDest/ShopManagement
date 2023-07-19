<?php

namespace App\Http\Livewire\Tableudeboard;

use App\Models\Approvisionnement;
use App\Models\Client;
use App\Models\DetailVente;
use App\Models\Dette;
use App\Models\Paiement;
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
    public $dt_filtre, $sum_dette, $sum_mtpayer, $nbr_vente, $nbr_benefice, $sumpaiement;
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
        $now = Carbon::now();
        $topproduct =  DB::table('detail_ventes as d')
            ->join('produits as p', 'd.produit_id', '=', 'p.id')
            ->select(DB::raw("count(*) as nbr"), 'produit_id', 'p.description')
            ->where('month', $now->month)
            ->groupBy('produit_id','p.description')
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
        // dd($this->topproduct);
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
        $mois = DetailVente::groupBy('month')
            ->selectRaw('month')
            ->get();
        $datamonth = array();
        foreach ($mois as $moi) {
            array_push(
                $datamonth,
                Carbon::create(null, $moi->month)->format('F')
            );
            $this->all_month = $datamonth;
        }
    }


    public function charger()
    {
        if ($this->dt_filtre) {
            // dd($this->dt_filtre);
        } else {
            $this->alert('warning', 'Veuillez selectionner une date svp!');
        }
    }

    public function render()
    {

        $this->vente();
        $this->beneficie();
        $this->topvente();
        $this->sum_dette = Dette::sum('total_dette');
        $this->nbr_vente = Vente::count();
        $this->sum_mtpayer = Vente::sum(DB::raw("montant_paie"));
        $this->nbr_benefice = DetailVente::sum('resultat');
        $this->sumpaiement = Paiement::sum('montant_paie');
        $this->ca = Vente::sum(DB::raw("total"));
        $this->ctaprov = Produit::sum(DB::raw("qte_stock*pu_achat"));


        return view('livewire.tableudeboard.dashaboard');
    }
}
