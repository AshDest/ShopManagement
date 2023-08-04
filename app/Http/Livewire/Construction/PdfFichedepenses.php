<?php

namespace App\Http\Livewire\Construction;

use Livewire\Component;

class PdfFichedepenses extends Component
{
    public $projet;
    public function render()
    {
        dd($this->project);
        return view('livewire.construction.pdf-fichedepenses');
    }
}
