<?php

namespace App\Http\Livewire\Terminal;

use App\Models\Vente;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Listevente extends Component
{
    use WithPagination;
    use LivewireAlert;
    public  $reseach, $page_active = 3;
    public function render()
    {
        if ($this->reseach) {
            return view('livewire.terminal.listevente', [
                'ventes' => Vente::where('code', 'LIKE', '%' . $this->reseach . '%')
                    ->orwhere('id', 'LIKE', '%' . $this->reseach)
                    ->paginate($this->page_active)
            ]);
        } else {
            return view('livewire.terminal.listevente', [
                'ventes' => Vente::orderBy('id', 'DESC')->paginate($this->page_active),
            ]);
        }
    }
}