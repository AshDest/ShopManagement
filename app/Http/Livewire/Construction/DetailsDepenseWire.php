<?php

namespace App\Http\Livewire\Construction;

use App\Models\Depensecontrusction;
use App\Models\Projetcontrustion;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Carbon\Carbon;

class DetailsDepenseWire extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $projet,$results;
    protected $depenses,$page_active_dep = 7;
    //  variables pour la table projet
    public $codeprojet, $designationprojet, $responsableprojet, $contactreponsable, $statut_projet, $date_state, $date_end;
    // variable pour la table depense
    public $codeprojet_dep, $designationprojet_dep, $designationdepense, $mtdepense, $depensedevise,$date_debit,$date_fin;
    public $all_month,$dep_per_month;
    public function render()
    {
        $this->depense_mensuelle();
        $projects = Projetcontrustion::where('id', $this->projet)->first();
        $this->designationprojet = strtoupper($projects->designationprojet);
        $this->codeprojet = strtoupper($projects->codeprojet);
        $this->responsableprojet = strtoupper($projects->responsableprojet);
        $this->contactreponsable = strtoupper($projects->contactreponsable);
        $this->statut_projet = $projects->statutprojet;
        $this->date_debit = $projects->date_debit;
        $this->date_fin = $projects->updated_at;

            $this->depenses = Depensecontrusction::whereHas('projet', function ($s) {
                $s->where('projetcontrustion_id', $this->projet);
            })->paginate($this->page_active_dep);

            $this->results = DepenseContrusction::selectRaw('depensedevise, SUM(montantdepense) as total')
            ->where('projetcontrustion_id', $this->projet)
            ->whereIn('depensedevise', ['USD', 'CDF'])
            ->groupBy('depensedevise')
            ->get();
            // dd($results);
        return view('livewire.construction.details-depense-wire');
    }


    public function changerstatus($status)
    {
        $currentDate = Carbon::now();
        switch ($status) {
            case 'Encours':
                Projetcontrustion::find($this->projet)->fill([
                    'statutprojet' => $status,
                    'updated_at' => null,
                ])->save();

                break;
            case 'Pending':

                Projetcontrustion::find($this->projet)->fill([
                    'statutprojet' => $status,
                    'updated_at' => null,
                ])->save();
                break;
            case 'Cloturer':
                Projetcontrustion::find($this->projet)->fill([
                    'statutprojet' => $status,
                    'updated_at' => $currentDate,
                ])->save();
                break;

            default:
                # code...
                break;
        }
    }

    public function mount()
    {
        $mois = DepenseContrusction::groupBy('month')
            ->selectRaw('month')
            ->orderby('month','asc')
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
    public function depense_mensuelle()
    {
        $ventes = DepenseContrusction::groupBy('month')
            ->selectRaw('sum(montantdepense) as sum')
            ->where('depensedevise','USD')
            ->get();

        $data_vente = array();

        foreach ($ventes as $value) {
            array_push(
                $data_vente,
                $value->sum
            );
            $this->dep_per_month = ($data_vente);
        }
    }
}
