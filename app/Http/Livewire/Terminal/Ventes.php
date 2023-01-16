<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Ventes extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 4;
    public function render()
    {

        if ($this->reseach) {
            return view('livewire.terminal.ventes', [
                'products' => Produit::where('description', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('designationmesure', 'LIKE', '%' . $this->reseach)
                    ->orwhereHas('categorie', function ($s) {
                        $s->where('designation', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.terminal.ventes', [
                'products' => Produit::orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}