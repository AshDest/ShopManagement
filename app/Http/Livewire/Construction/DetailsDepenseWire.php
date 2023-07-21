<?php

namespace App\Http\Livewire\Construction;

use App\Models\Projetcontrustion;
use Livewire\Component;

class DetailsDepenseWire extends Component
{
    public $projet;
    //  variables pour la table projet
    public $codeprojet, $designationprojet, $responsableprojet, $contactreponsable, $statut_projet, $date_state, $date_end;
    // variable pour la table depense
    public $codeprojet_dep, $designationprojet_dep, $designationdepense, $mtdepense, $depensedevise;
    public function render()
    {
        return view('livewire.construction.details-depense-wire');
    }
    public function mount()
    {
        $projects = Projetcontrustion::where('id', $this->projet)->first();
        $this->designationprojet = strtoupper($projects->designationprojet);
        $this->statut_projet = $projects->statutprojet;
    }

    public function changerstatus($status)
    {
        switch ($status) {
            case 'Encours':
                Projetcontrustion::find($this->projet)->fill([
                    'statutprojet' => $status,
                ])->save();

                break;
            case 'Pending':

                Projetcontrustion::find($this->projet)->fill([
                    'statutprojet' => $status,
                ])->save();
                break;
            case 'Cloturer':
                Projetcontrustion::find($this->projet)->fill([
                    'statutprojet' => $status,
                ])->save();
                break;

            default:
                # code...
                break;
        }
    }
}
