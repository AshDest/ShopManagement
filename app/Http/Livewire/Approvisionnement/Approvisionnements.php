<?php

namespace App\Http\Livewire\Approvisionnement;
use App\Models\Approvisionnement;
use Livewire\Component;

class Approvisionnements extends Component
{
    public function render()
    {
        $approvs = Approvisionnement::all();
        return view('livewire.approvisionnement.approvisionnements', ['approvs' => $approvs]);
    }
}
