<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Dette;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Paiements extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 4;

    public $montant_dette;
    public $montant_paie;
    // public function conclusionConsultation($id)
    // {
    //     $this->appointement = $id;
    //     $appointements = Appointment::whereHas('horaire', function ($q) {
    //         $q->whereHas('affectation', function ($t) {
    //             $t->where('medecin_id', Auth::user()->medecin_id);
    //         });
    //     })
    //         ->where('id', $this->appointement)
    //         ->first();
    //     $this->nomcomplepatient = $appointements->patient->nomPatient . ' ' . $appointements->patient->postnomPatient . ' ' . $appointements->patient->prenomPatient;
    //     $this->nomcomplemedecin = $appointements->horaire->affectation->medecin->nomcompletMedecin;
    //     // $this->nomcomplepatient=$appointements->patient->nomPatient.' '.$appointements->patient->prenomPatient ;

    //     $this->dispatchBrowserEvent('show-consultation-modal');
    // }

    public function paiementview($id)
    {
        $this->dispatchBrowserEvent('paiementview');
    }
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.terminal.paiements', [
                'dettes' => Dette::where('client_id', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('client', function ($s) {
                        $s->where('noms', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.terminal.paiements', [
                'dettes' => Dette::orderBy('created_at', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}