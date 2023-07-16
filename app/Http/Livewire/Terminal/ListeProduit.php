<?php

namespace App\Http\Livewire\Terminal;

use Livewire\Component;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ListeProduit extends Component
{
    use WithPagination;
    use LivewireAlert;

    public  $reseach, $page_active = 4;
    public  $categories;
    public function render()
    {
        $this->categories = Categorie::all();
        if ($this->reseach) {
            return view('livewire.terminal.liste-produit', [
                'products' => Produit::where('description', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhereHas('categorie', function ($s) {
                        $s->where('designation', 'LIKE', '%' . $this->reseach . '%');
                    })
                    ->orwhereHas('user', function ($s) {
                        $s->where('name', 'LIKE', '%' . $this->reseach . '%');
                    })->where('user_id', Auth::user()->id)
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.terminal.liste-produit', [
                'products' => Produit::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate($this->page_active)
            ]);
        }
        return view('livewire.terminal.liste-produit');
    }
}
