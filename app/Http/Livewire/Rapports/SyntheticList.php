<?php

namespace App\Http\Livewire\Rapports;

use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SyntheticList extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $reseach, $page_active = 6;
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.rapports.synthetic-list', [
                'products' => Produit::where('code', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('id', 'LIKE', '%' . $this->reseach)
                    ->orwhere('qte_stock', 'LIKE', '%' . $this->reseach)
                    ->orwhere('description', 'LIKE', '%' . $this->reseach)
                    ->paginate($this->page_active),
            ]);
        } else {
            $products = Produit::paginate($this->page_active);
            return view('livewire.rapports.synthetic-list', ['products' => $products]);
        }
    }
}