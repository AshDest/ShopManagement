<?php

namespace App\Http\Livewire\Production;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ListProducts extends Component
{
    use WithPagination;
    use LivewireAlert;

    public  $reseach, $page_active = 5;
    public  $categories;

    public function render()
    {
        $this->categories = Categorie::all();
        if ($this->reseach) {
            return view('livewire.production.list-products', [
                'products' => Produit::where('description', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('categorie', function ($s) {
                        $s->where('designation', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->orwhereHas('user', function ($s) {
                        $s->where('name', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.production.list-products', [
                'products' => Produit::orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
    }
}
