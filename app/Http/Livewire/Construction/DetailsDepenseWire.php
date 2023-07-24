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
    public $projet;
    protected $depenses,$page_active_dep = 7;
    //  variables pour la table projet
    public $codeprojet, $designationprojet, $responsableprojet, $contactreponsable, $statut_projet, $date_state, $date_end;
    // variable pour la table depense
    public $codeprojet_dep, $designationprojet_dep, $designationdepense, $mtdepense, $depensedevise,$date_debit,$date_fin;
    public function render()
    {
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
}
