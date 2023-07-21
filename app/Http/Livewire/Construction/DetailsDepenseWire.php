<?php

namespace App\Http\Livewire\Construction;

use Livewire\Component;

class DetailsDepenseWire extends Component
{
    public $projet;
    public function render()
    {
        return view('livewire.construction.details-depense-wire');
    }
}
