<?php

namespace App\Http\Livewire\Rapports;

use App\Models\Produit;
use Livewire\Component;

class SyntheticList extends Component
{
    public function mount()
    {
    }
    public function render()
    {
        $products = Produit::all();
        return view('livewire.rapports.synthetic-list', ['products' => $products]);
    }
}