<?php

namespace App\Http\Livewire\Construction;

use App\Models\Depensecontrusction;
use App\Models\Projetcontrustion;
use App\Models\Taux;
use Carbon\Carbon;
use Livewire\Component;

class PdfFichedepenses extends Component
{
    public $projet, $results;
    protected $depenses;
    //  variables pour la table projet
    public $codeprojet, $designationprojet, $responsableprojet, $contactreponsable, $statut_projet, $date_state, $date_end;
    // variable pour la table depense
    public $codeprojet_dep, $designationprojet_dep, $designationdepense, $mtdepense, $depensedevise, $date_debit, $date_fin;
    public $all_month, $dep_per_month, $taux_du_jour;

    public function render()
    {

        // $this->depense_mensuelle();
        $projects = Projetcontrustion::where('id', $this->projet)->first();
        $this->designationprojet = strtoupper($projects->designationprojet);
        $this->codeprojet = strtoupper($projects->codeprojet);
        $this->responsableprojet = strtoupper($projects->responsableprojet);
        $this->contactreponsable = strtoupper($projects->contactreponsable);
        $this->statut_projet = $projects->statutprojet;
        $this->date_debit = $projects->date_debit;
        $this->date_fin = $projects->updated_at;

        // $this->depenses = Depensecontrusction::whereHas('projet', function ($s) {
        //     $s->where('projetcontrustion_id', $this->projet);
        // })->get();

        // $this->results = DepenseContrusction::selectRaw('depensedevise, SUM(montantdepense) as total')
        //     ->where('projetcontrustion_id', $this->projet)
        //     ->whereIn('depensedevise', ['USD', 'CDF'])
        //     ->groupBy('depensedevise')
        //     ->get();
        return view('livewire.construction.pdf-fichedepenses');
    }

    public function mount()
    {
        // $mois = DepenseContrusction::where('projetcontrustion_id', $this->projet)
        //     ->groupBy('month')
        //     ->selectRaw('month')
        //     ->orderby('month', 'asc')
        //     ->get();
        // $datamonth = array();
        // foreach ($mois as $moi) {
        //     array_push(
        //         $datamonth,
        //         Carbon::create(null, $moi->month)->format('F')
        //     );
        //     $this->all_month = $datamonth;
        // }
    }
    public function depense_mensuelle()
    {
        $this->taux_du_jour =  Taux::value('taux');

        $depensemens = DepenseContrusction::where('projetcontrustion_id', $this->projet)
            ->groupBy('month')
            ->selectRaw('SUM(CASE WHEN depensedevise = "USD" THEN montantdepense ELSE 0 END) as sum_usd,
                     SUM(CASE WHEN depensedevise = "CDF" THEN montantdepense ELSE 0 END) as sum_cdf')
            ->get();
        $data_deps = array();
        foreach ($depensemens as $value) {
            $sommeUSD = $value->sum_usd;
            $sommeCDF = $value->sum_cdf;
            $montant_en_usd = $sommeUSD + ($sommeCDF / $this->taux_du_jour);
            // Faites quelque chose avec la somme totale en USD...
            array_push(
                $data_deps,
                $montant_en_usd
            );
            $this->dep_per_month = ($data_deps);
        }

        // dd($this->dep_per_month);
    }

}
