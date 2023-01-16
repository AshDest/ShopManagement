<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Dette;
use Livewire\Component;

class Paiements extends Component
{
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
        $this->dispatchBrowserEvent('show-consultation-modal');
    }
    public function render()
    {
        $dettes = Dette::all();
        return view('livewire.terminal.paiements', ['dettes' => $dettes]);
    }
}